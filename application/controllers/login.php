<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Login extends CI_Controller{
  function __construct()
     {
         parent::__construct();
         $this->load->model('m_login');
     }

     function index() {

      $this->load->view('v_login');
  }

  function do_login() {
   $username = $this->input->post('username',true);
   $password = $this->input->post('password',true);

   $data_login = $this->m_login->cekDetailDataLogin($username,md5($password));
   if(count($data_login)>0) {
    foreach ($data_login as $value) {
     $ses_login = array(
      'login' =>true,
      'username' => $value['username'],
      'id_user' => $value['id_user']
     );
    }

    $this->session->set_userdata($ses_login);
    echo json_encode(array('st'=>1));
   } else {
    echo json_encode(array('st'=>0));
   }
  }

  function logout() {
   $this->session->sess_destroy();
   redirect('login','refresh');
  }
 }
?>