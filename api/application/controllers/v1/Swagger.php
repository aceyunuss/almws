<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swagger extends CI_Controller {

	public function index(){
			$this->load->view('swagger-Ui/index');

	}

	public function swagger_json(){
		$this->load->view('swagger-Ui/EllipseIntegration');
	}

}