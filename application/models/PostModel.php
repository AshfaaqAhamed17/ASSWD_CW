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
        // $this->db->select('*');
        // $this->db->from('post');
        // $query = $this->db->get();
        // return $query->result();
        
        $sql1 = "SELECT post.*, user_detail.userName FROM post JOIN user_detail ON post.userID = user_detail.userID";
        $query1 = $this->db->query($sql1);

        $sql2 = "SELECT comment.*, user_detail.userName FROM comment JOIN user_detail ON comment.userID = user_detail.userID";
        $query2 = $this->db->query($sql2);

        // $sql = "SELECT post.*, user_detail.username, GROUP_CONCAT(comment.comment SEPARATOR ',') as comments 
        // FROM post 
        // JOIN user_detail ON post.userID = user_detail.userID 
        // JOIN comment ON post.postID = comment.postID 
        // GROUP BY post.postID;";

        // $query = $this->db->query($sql);
        // return $query1->result();

        foreach ($query1->result() as $row) {
            $postID = $row->postID;
            $comments = array();
            foreach ($query2->result() as $row2) {
                if ($row2->postID == $postID) {
                    $comments[] = $row2;
                }
            }
            $row->comments = $comments;
        }

        
        return $query1->result();

        
        // $sql = "SELECT post.*, user_detail.userName, (SELECT GROUP_CONCAT(comment.comment SEPARATOR ',') 
        // return $query2->result();
        // FROM comment WHERE comment.postID = post.postID) as comments
        // FROM post
        // JOIN user_detail ON post.userID = user_detail.userID;";
        
        // $query = $this->db->query($sql);

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
