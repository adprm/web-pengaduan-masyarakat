<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function addMenu()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu baru ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function editMenu($id = null)
    {   
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Menu Manajemen';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah menu!</div>');
        } else {
            $post = $this->input->post();
            $this->id = $post['id'];
            $this->menu = $post['menu'];
            $this->db->update('user_menu', $this, ['id' => $post['id']]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil mengubah menu!</div>');
            redirect('menu');
        }
    }

    public function deleteMenu($id = null)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil dihapus!</div>');
        redirect('menu');
    }

}