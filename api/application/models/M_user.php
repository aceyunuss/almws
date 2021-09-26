<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class M_user extends CI_Model
{

  function check_username($username)
  {
    return $this->db->get_where('user', ['username' => $username]);
  }

  function check_login($username, $password)
  {
    return $this->db->select("username, fullname, role")->get_where('user', ['username' => $username, 'password' => sha1($password)]);
  }
}
