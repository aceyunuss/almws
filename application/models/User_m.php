<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
  }


  public function getUser($id = "")
  {
    if (!empty($id)) {
      $this->db->where('id', $id);
    }
    return $this->db->get("user");
  }


  public function checkLogin($username, $password)
  {
    return $this->db->where(['username' => $username, 'password' => sha1($password)])->get("user")->row_array();
  }
}
