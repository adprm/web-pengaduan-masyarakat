<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

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

}