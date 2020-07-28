<?php 

class Overview extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('report_model');
    }

    public function index() {
        $data['totalReport'] = $this->report_model->getTotalReport();
        $this->load->view("admin/overview", $data);
    }
}