<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends BD_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('M_user');
  }


  function index_post()
  {
    $response = $this->err_index;
    $this->set_response($response, $response['code']);
  }


  function checkLogin_post()
  {
    include('user/CheckLogin.php');
  }
}
