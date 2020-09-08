<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // user access
        is_logged_in();
    }

    // index view user info
    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/admin_footer');
    }

    // edit profile
    public function edit()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama lengkap', 'required', [
            'required' => 'Nama lengkap harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // upload image
            $upload_image = $_FILES['image']['name'];
            
            if ($upload_image) {
                $config['allowed_types']    = 'jpg|jpeg|png';
                $config['max_size']         = '6000';
                $config['upload_path']      = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH.'/assets/img/profile/'.$old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil berhasil diubah!</div>');
            redirect('user');
        }
        
    }

    // change password user
    public function changepassword()
    {
        $data['title'] = 'Ubah Kata Sandi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Kata sandi lama', 'required|trim', [
            'required' => 'Kata sandi lama harus di isi!'
        ]);
        $this->form_validation->set_rules('new_password1', 'Kata sandi baru', 'required|trim|min_length[5]|matches[new_password2]', [
            'required' => 'Isi kata sandi baru!',
            'min_length' => 'Kata sandi terlalu pendek!',
            'matches' => 'Kata sandi tidak sama!'
        ]);
        $this->form_validation->set_rules('new_password2', 'Konfirmasi kata sandi baru', 'required|trim|min_length[5]|matches[new_password1]', [
            'required' => 'Isi kata sandi baru!',
            'min_length' => 'Kata sandi terlalu pendek!',
            'matches' => 'Kata sandi tidak sama!' 
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Kata sandi salah!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Kata sandi baru tidak boleh sama dengan kata sandi lama!</div>');
                    redirect('user/changepassword');
                } else {
                    // password ok!
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Kata sandi berhasil diubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    // delete akun
    public function deleteuser($id)
    {
        $this->db->delete('user', ['id' => $id]);
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akun berhasil dihapus!</div>');
        redirect('auth');
    }

}