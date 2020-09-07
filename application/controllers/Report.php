<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
    }

    public function addReport()
    {
        $report = $this->Report_model;

        $this->form_validation->set_rules('name', 'Nama', 'required', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required', [
            'required' => 'NIK harus diisi!'
        ]);
        $this->form_validation->set_rules('rt', 'RT', 'required|numeric', [
            'required' => 'RT harus diisi!'
        ]);
        $this->form_validation->set_rules('rw', 'RW', 'required|numeric', [
            'required' => 'RW harus diisi!'
        ]);
        $this->form_validation->set_rules('village', 'Desa', 'required', [
            'required' => 'Desa harus diisi!'
        ]);
        $this->form_validation->set_rules('title', 'Judul laporan', 'required', [
            'required' => 'Judul laporan harus diisi!'
        ]);
        $this->form_validation->set_rules('description', 'Deskripsi laporan', 'required', [
            'required' => 'Deskripsi laporan harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Laporkan!';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/add_report');
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal melaporkan!</div>');
        } else {
            $report->save();
            redirect('user');
        }
    }

}