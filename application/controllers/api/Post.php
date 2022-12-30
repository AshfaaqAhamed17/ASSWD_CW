<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use \Restserver\Libraries\REST_Controller;

class Post extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PostModel');
    }

    public function index_post()
    {
        $post = $this->post('image');
        $caption = $this->post('caption');
        $userID = $this->post('userID');
        $location  = $this->post('location');

        $this->PostModel->insertPost($post, $caption, $userID, $location);
        $this->response([
            'status' => TRUE,
            'message' => 'Post created successfully'
        ], REST_Controller::HTTP_OK);
    }

    public function index_get()
    {
        $id = $this->uri->segment(3);
        if ($id === null) {
            $posts = $this->PostModel->getPosts();
        } else {
            $posts = $this->PostModel->getPost($id);
        }

        if ($posts) {
            $this->response([
                'status' => TRUE,
                'data' => $posts
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No posts yet!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->uri->segment(3);
        if ($id === null) {
            $this->response([
                'status' => FALSE,
                'message' => 'Unidentified post!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->PostModel->deletePost($id) > 0) {
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'Deleted.'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
