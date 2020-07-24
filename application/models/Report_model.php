<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Report_model extends CI_Model {
    private $_table = "reports";

    public $report_id;
    public $report_nik;
    public $report_name;
    public $report_rt;
    public $report_rw;
    public $report_title;
    public $report_desc;
    public $report_date;
    public $report_file;

    public function rules() {
        return [
            [
                'field' => 'report_nik',
                'label' => 'Report_nik',
                'rules' => 'numeric'
            ],
            [
                'field' => 'report_name',
                'label' => 'Report_name',
                'rules' => 'required'
            ],
            [
                'field' => 'report_rt',
                'label' => 'Report_rt',
                'rules' => 'numeric'
            ],
            [
                'field' => 'report_rw',
                'label' => 'Report_rw',
                'rules' => 'numeric'
            ],
            [
                'field' => 'report_title',
                'label' => 'Report_title',
                'rules' => 'required'
            ],
            [
                'field' => 'report_desc',
                'label' => 'Report_desc',
                'rules' => 'required'
            ],
            [
                'field' => 'report_date',
                'label' => 'Report_date',
                'rules' => 'date'
            ]
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ['report_id' => $id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->report_id = uniqid();
        $this->report_nik = $post["report_nik"];
        $this->report_name = $post["report_name"];
        $this->report_rt = $post["report_rt"];
        $this->report_rw = $post["report_rw"];
        $this->report_title = $post["report_title"];
        $this->report_desc = $post["report_desc"];
        $this->report_date = $post["report_date"];
        $this->report_file = $this->_uploadFile();

        return $this->db->insert($this->_table, $this);
    }

    public function update() {
        $post = $this->input->post();
        $this->report_id = $post["report_id"];
        $this->report_nik = $post["report_nik"];
        $this->report_name = $post["report_name"];
        $this->report_rt = $post["report_rt"];
        $this->report_rw = $post["report_rw"];
        $this->report_title = $post["report_title"];
        $this->report_desc = $post["report_desc"];
        $this->report_date = $post["report_date"];

        if (!empty($_FILES['report_file']['name'])) {
            $this->report_file = $this->_uploadFile();
        } else {
            $this->report_file = $this->_oldFile();
        }

        return $this->db->update($this->_table, $this, array('report_id' => $post['report_id']));
    }

}