<?php

defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Auth extends BD_Controller
{
  public function get_token_post()
  {
    $kunci  = $this->config->item('thekey');
    $client = $this->post('client'); //Username Posted

    $p = sha1($this->post('private_key')); //Pasword Posted //h9tH33xwjY
    $q = ['client' => $client]; //For where query condition

    //Respon if login invalid
    $invalidLogin = [
      'code'      => REST_Controller::HTTP_UNAUTHORIZED,
      'status'    => "Invalid Login"
    ];

    $val = $this->M_main->get_user($q)->row(); //Model to get single data row from database base on username

    if ($this->M_main->get_user($q)->num_rows() == 0) {
      $this->response($invalidLogin, REST_Controller::HTTP_UNAUTHORIZED);
    }

    if ($p == $val->private_key && $client == $val->client) {  //Condition if password matched
      $date = new DateTime();

      $token = [
        'id'      => $val->id,  //From here
        'client'  => $client,
        'iat'     => $date->getTimestamp(),
        'exp'     => $date->getTimestamp() + 60 * 60 * 2, //To here is to generate token, expired in 2 hour
      ];

      $output = [
        'code'          => REST_Controller::HTTP_OK,
        'status'        => "Success",
        'type'          => "Bearer",
        'token'         => JWT::encode($token, $kunci), //This is the output token
        'expired_in'    => 60 * 60 * 2, //To here is to generate token, expired in 2 hour
      ];

      $this->set_response($output, REST_Controller::HTTP_OK); //This is the respon if success
    } else {
      $this->set_response($invalidLogin, REST_Controller::HTTP_UNAUTHORIZED); //This is the respon if failed
    }
  }
}
