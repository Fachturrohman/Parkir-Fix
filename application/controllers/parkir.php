<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parkir extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_parkir');
        $this->load->helper('form','url');
    }

    public function index() {
        $data['title'] = 'Data Member';
        $data['username']= $this->session->userdata('username');
        $data['qmember'] = $this->m_parkir->get_allmember();
        $this->load->view('parkir_out', $data);
    }
}
