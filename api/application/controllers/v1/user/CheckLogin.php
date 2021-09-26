<?php

$input =  file_get_contents('php://input');

$now = date("Y-m-d H:i:s");

$response = $this->err_fail;

if (empty($input)) {

  $response = $this->err_empty;
} else {

  $jsondc = json_decode($input, true);

  $validate = ['username', 'password'];

  if (count(array_intersect_key(array_flip($validate), $jsondc)) !== count($validate)) {

    $response = $this->err_struct;
  } else {

    $sc = FALSE;

    $avail = $this->M_user->check_username($jsondc['username'])->num_rows();

    if ($avail > 0) {

      $login = $this->M_user->check_login($jsondc['username'], $jsondc['password'])->row_array();
      if ($login > 0) {
        $sc = TRUE;
      }
    }

    if ($sc === FALSE) {
      $response = [
        'code'    => REST_Controller::HTTP_NOT_FOUND,
        'status'  => REST_Controller::HTTP_FAILED,
        'message' => "User not found",
      ];
    } else {
      $response = [
        'code'    => REST_Controller::HTTP_OK,
        'status'  => REST_Controller::HTTP_SUCCESS,
        'message' => "Success get user",
        'data'    => $login
      ];
    }
  }
}

$log_api = [
  'time'        => $now,
  'status'      => $response['code'],
  'response'    => $response['message'],
  'type'        => "check_login",
  'post_data'   => $input
];

$this->M_log->insert_user($log_api);

$this->set_response($response, $response['code']);
