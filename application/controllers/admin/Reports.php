<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['reports'] = $this->report_model->getAll();
        $this->load->view("admin/report/list", $data);
    }

    public function edit($id = null) {
        if (!isset($id)) redirect('admin/reports');

        $report = $this->report_model;
        $validation = $this->form_validation;
        $validation->ser_rules($report->rules());

        if ($validation->run()) {
            $report->update();
            $this->session->set_flashdata('info', 'Data berhasil diperbaharui');
        }

        $data['report'] = $report->getById($id);
        if (!$data['report']) show_404();

        $this->load->view("admin/report/edit_form", $data);
    }
}