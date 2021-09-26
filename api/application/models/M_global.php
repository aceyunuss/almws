<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_global extends CI_Model {
	// Db builder 
	function get_master_spec($paramTable, $paramSelect, $condition, $paramType='select') {
		$this->db->$paramType($paramSelect);
		$this->db->from($paramTable);
		if ($condition) {
            foreach ($condition as $c) {
                $this->db->$c[2]($c[0], $c[1]);
            }
        }
        return $this->db->get();
	}

	function query($query) {
		return $this->db->query($query);
	}

	
}