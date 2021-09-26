<?php
class Auth extends Core_Controller
{

  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    if (!is_null($this->session->userdata('user'))) {
      redirect('managesite/dashboard');
    } else {
      $this->login();
    }
  }


  public function login()
  {
    $this->load->view("login_v");
  }


  public function logout()
  {
    $this->sesion->sess_destroy();
    redirect('managesite/login');
  }
}
