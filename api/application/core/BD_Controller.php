<?php defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/BeforeValidException.php';
require_once APPPATH . '/libraries/ExpiredException.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';

use \Firebase\JWT\JWT;

class BD_Controller extends REST_Controller
{
  private $user_credential;
  public function auth()
  {
    // Configure limits on our controller methods
    // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
    $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
    $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
    $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    //JWT Auth middleware
    $headers = $this->input->get_request_header('Authorization');
    $kunci = $this->config->item('thekey'); //secret key for encode and decode
    $token = "token";
    if (!empty($headers)) {
      if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
        $token = $matches[1];
      }
    }
    try {
      $decoded = JWT::decode($token, $kunci, array('HS256'));
      $this->user_data = $decoded;
    } catch (Exception $e) {
      $invalid = ['status' => 0, 'response' => $e->getMessage()]; //Respon if credential invalid
      $this->response($invalid, 401); //401
    }
  }


  public $err_fail = [
    'code'    => REST_Controller::HTTP_INTERNAL_SERVER_ERROR,
    'status'  => REST_Controller::HTTP_FAILED,
    'message' => "Transaction failed",
  ];


  public $err_empty = [
    'code'    => REST_Controller::HTTP_BAD_REQUEST,
    'status'  => REST_Controller::HTTP_FAILED,
    'message' => "JSON can't be empty"
  ];


  public $err_struct = [
    'code'    => REST_Controller::HTTP_BAD_REQUEST,
    'status'  => REST_Controller::HTTP_FAILED,
    'message' => "Data structure doesn't match",
  ];


  public $err_index = [
    'code'    => REST_Controller::HTTP_NOT_FOUND,
    'status'  => REST_Controller::HTTP_FAILED,
    'message' => "Required 1 more endpoint",
  ];
  
}
