<?php
class Auth extends Core_Controller

{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model(['Auth_m']);
  }

  public function index()
  {
    if (!is_null($this->session->userdata('user'))) {
      redirect('dashboard');
    } else {
      $this->load->view("login_v");
    }
  }

}
