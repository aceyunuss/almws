<?php
class Managesite extends Core_Controller
{

  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    if (!is_null($this->session->userdata('user_ses'))) {
      $this->dashboard();
    } else {
      redirect('auth');
    }
  }


  public function dashboard()
  {
  }
}
