<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // login
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email tidak valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Masuk';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    // valid login sukses
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika user ada
        if ($user) {
            // jika user nya aktif
            if ($user['is_active'] == 1) {
                // cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // cek role
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                }else{
                    // jika gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!</div>');
                    redirect('auth');
                }
            } else {
                // tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email ini belum teraktivasi!</div>');
                redirect('auth');
            }   
        } else {
            // tidak ada user dengan email itu
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    // registrasi
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email tidak valid!',
            'is_unique' => 'Email sudah teregistrasi!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Password tidak boleh kosong!',
            'matches' => 'Kata sandi tidak sama!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun!';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Anda berhasil di buat. Silahkan cek email Anda untuk aktivasi akun Anda!</div>');
            redirect('auth');
        }
    }

    // _sendEmail
    private function _sendEmail($token, $type)
    {
        $config = array();
        $config['protocol']  = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_user'] = 'izyadper00@gmail.com';
        $config['smtp_pass'] = 'nasigoreng05';
        $config['smtp_port'] = 465;
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';

        $this->load->initialize($config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('izyadper00@gmail.com', 'Web Pengaduan Masyarakat');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik alamat ini untuk verifikasi akun : <a href="' . base_url() .'auth/verify?email=' . $this->input->post('email') . '&token=' . $token .'">Aktifkan</a>');
        }

        if ($this->email->send()) {
            return true; 
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    // verify
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // jika email benar
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                // jika token benar

                if (time() - $user_token['date_created'] < (60*60*24)) {
                    // token belum expired
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    '. $email .' Telah teraktivasi! Silahkan login.</div>');
                    redirect('auth');
                } else {
                    // token expired
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal aktivasi akun! Token kedaluwarsa.</div>');
                    redirect('auth');
                }

            } else {
                // token salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal aktivasi akun! Token tidak valid.</div>');
                redirect('auth');
            }

        } else {
            // email salah
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal aktivasi akun! Email tidak ada.</div>');
            redirect('auth');
        }
    }

    // logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda berhasil keluar!</div>');
        redirect('auth');
    }

    // blocked
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}