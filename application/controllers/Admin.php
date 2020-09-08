<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // user access
        is_logged_in();
    }

    // function index view
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'user_role' => $this->db->get('user_role')->num_rows(),
            'user_member' => $this->db->get_where('user', ['role_id' => 2])->num_rows(),
            'menu' => $this->db->get('user_menu')->num_rows(),
            'sub_menu' => $this->db->get('user_sub_menu')->num_rows(),
            'report' => $this->db->get('user_report')->num_rows(),
        ];
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }

    // function role
    public function role()
    {
        $data['title'] = 'Wewenang Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/role');
        $this->load->view('templates/admin_footer');
    }

    // function add role
    public function addrole()
    {
        $this->form_validation->set_rules('role', 'Wewenang', 'required', [
            'required' => 'Nama wewenang tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Hak Akses';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->db->get('user_role')->result_array();
            
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/role');
            $this->load->view('templates/admin_footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Wewenang baru telah ditambahkan!</div>');
            redirect('admin/role');
        }
    }

    // function edit role
    public function editrole($id = null)
    {
        $this->form_validation->set_rules('role', 'Wewenang', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Wewenang Akses';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
            
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/edit_role');
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah nama wewenang!</div>');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'role' => $this->input->post('role')
            ];

            $this->db->update('user_role', $data, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil mengubah nama wewenang!</div>');
            redirect('admin/role');
        }
    }

    // function delete role
    public function deleterole($id = null)
    {
        $this->db->delete('user_role', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Wewenang berhasil dihapus!</div>');
        redirect('admin/role');
    }
    
    // function role access
    public function roleaccess($role_id)
    {
        $data['title'] = 'Wewenang Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/role_access');
        $this->load->view('templates/admin_footer');
    }

    // change access
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akses telah diubah!</div>');
    }

    // data member info
    public function datamember()
    {
        $data['title'] = 'Data Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_member'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/data_member', $data);
        $this->load->view('templates/admin_footer');
    }

    // info detail member
    public function detailmember($id)
    {
        $data['title'] = 'Info Data Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/detail_member', $data);
        $this->load->view('templates/admin_footer');
    }

    // delete member
    public function deletemember($id)
    {
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Pengguna berhasil dihapus!</div>');
        redirect('admin/datamember');
    }

    // edit member
    public function editmember($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Data Pengguna';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['member'] = $this->db->get_where('user', ['id' => $id])->row_array();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/edit_member', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active')
            ];
                
            $this->db->update('user', $data, ['id' => $data['id']]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data pengguna berhasil diubah!</div>');
            redirect('admin/datamember');
        }
    }

}