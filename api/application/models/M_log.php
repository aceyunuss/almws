<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class M_log extends CI_Model
{

  function insert_user($data)
  {
    return $this->db->insert('log_user', $data);
  }


  function insert_setting($data)
  {
    return $this->db->insert('log_setting', $data);
  }


  function insert_schedule($data)
  {
    return $this->db->insert('log_schedule', $data);
  }
}
