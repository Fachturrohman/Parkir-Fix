<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();    }

    public function index() {
        $data['title'] = 'CodeIgniter';
        $data['username']= $this->session->userdata('username');
        $this->load->view('home', $data);
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

