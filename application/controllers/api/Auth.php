<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/ImplementJWT.php';

use \Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    // Register User & Login User
    public function index_post()
    {
        $username = $this->post('userName');
        $email = $this->post('email');
        $password = $this->post('password');
        $count = $this->AuthModel->verifyUser($username, $email);

        if ($username && $email && $password) {
            if ($count > 0) {
                echo 'This User Already Exists';
            } else {
                $this->AuthModel->registerUser($username, $email, $password);
                $this->response([
                    'status' => TRUE,
                    'message' => 'User created successfully'
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $login = $this->AuthModel->loginUser($username, $password);
            // var_dump($login);
            if ($login) {
                // console.log(" LINE 40 ", $login);
                $jwt = new JWT();
                $key = getenv('JWT_SECRET');
                $iat = time(); // current timestamp value
                $exp = $iat + 10;

                $payload = array(
                    "iss" => "Issuer of the JWT",
                    "aud" => "Audience that the JWT",
                    "sub" => "Subject of the JWT",
                    "iat" => $iat, //Time the JWT issued at
                    "exp" => $exp, // Expiration time of token
                    "username" => $login->userName,
                    "email" => $login->email,
                    "userID" => $login->userID
                );

                $token = $jwt->encode($payload, $key, 'HS256');
                // $decoded = $jwt->decode($token, $key, 'HS256');
                                
                $this->response([
                    'status' => TRUE,
                    'message' => 'User logged in successfully',
                    "token" => $token,
                    "userID" => $login->userID,
                    "username" => $login->userName,
                    "userDescription" => $login->userDescription
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Invalid username or password'
                ], REST_Controller::HTTP_UNAUTHORIZED);
            }
        }
    }
}
