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
        $this->upload_path = "uploads/";
    }

    public function index_post()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio'] = TRUE;

        $this->load->library('upload', $config);

        $userID = $this->post('userID');
        $caption = $this->post('caption');
        $location  = $this->post('location');

        if (!isset($userID)) {
            $this->response([
                'status' => FALSE,
                'message' => 'UNAUTHORIZED USER'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        } else {
            if (!$this->upload->do_upload('image')) {
                var_dump($this->upload->do_upload());
                $error = array('error' => $this->upload->display_errors());
                $this->response([
                    'status' => FALSE,
                    'message' => $error
                ], REST_Controller::HTTP_BAD_REQUEST);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post = $data['upload_data']['file_name'];

                $source_img_path = $this->upload_path . $data['upload_data']['file_name'];
                $thumb_img_path = $this->upload_path . 'thumb/';
                $config['image_library'] = 'gd2';
                $config['source_image'] = $source_img_path;
                $config['new_image'] = $thumb_img_path;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 300;
                $config['height'] = 300;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $this->PostModel->insertPost($post, $caption, $userID, $location);
                $this->response([
                    'status' => TRUE,
                    'message' => 'Image uploaded successfully',
                    'data' => $data
                ], REST_Controller::HTTP_CREATED);
            }
        }
    }

    // upload post image
    public function upload_post()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        // $config['max_size'] = 10000;
        $config['maintain_ratio'] = TRUE;
        $config['max_width'] = 10240;
        $config['max_height'] = 10240;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->response([
                'status' => FALSE,
                'message' => $error
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->response([
                'status' => TRUE,
                'message' => 'Image uploaded successfully',
                'data' => $data
            ], REST_Controller::HTTP_CREATED);
        }
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
            ], REST_Controller::HTTP_NO_CONTENT);
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
