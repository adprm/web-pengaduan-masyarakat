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
}