<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('user_report')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user_report', ['id' => $id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id               = uniqid();
        $this->name             = $post['name'];
        $this->nik              = $post['nik'];
        $this->rt               = $post['rt'];
        $this->rw               = $post['rw'];
        $this->village          = $post['village'];
        $this->title            = $post['title'];
        $this->description      = $post['description'];
        $this->type             = $post['type'];
        $this->date_reported    = time();
        $this->file             = $this->_uploadFile();

        return $this->db->insert('user_report', $this);
    }

    private function _uploadFile()
    {
        $config['upload_path']      = './assets/img/report/';
        $config['allowed_types']    = 'jpg|png|jpeg|pdf|docx';
        $config['file_name']        = $this->id;
        $config['overwrite']        = true;
        $config['max_size']         = '15000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

}