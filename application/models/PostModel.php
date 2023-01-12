<?php

class PostModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPost($id)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('userID ', $id);
        // to get users posts --> $this->db->where('userID', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getPosts()
    {
        $this->db->select('*');
        $this->db->from('post');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertPost($post, $caption, $userID, $location)
    {
        $data = array(
            'image' => $post,
            'caption' => $caption,
            'userID' => $userID,
            'location' => $location
        );
        $this->db->insert('post', $data);
        return $this->db->insert_id();
    }

    public function updatePost($id, $post, $caption)
    {
        $data = array(
            'post' => $post,
            'caption' => $caption
        );
        $this->db->where('postID', $id);
        $this->db->update('post', $data);
    }

    public function deletePost($id)
    {
        $this->db->where('postID', $id);
        $this->db->delete('post');
        return $this->db->affected_rows();
    }
}
