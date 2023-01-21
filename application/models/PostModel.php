<?php

class PostModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPost($id)
    {
        $sql1 = "SELECT post.*, user_detail.userName FROM post JOIN user_detail ON post.userID = user_detail.userID WHERE user_detail.userID = ".$id;
        $query1 = $this->db->query($sql1);

        $sql2 = "SELECT comment.*, user_detail.userName FROM comment JOIN user_detail ON comment.userID = user_detail.userID";
        $query2 = $this->db->query($sql2);
        
        $sql3 = "SELECT hashtag.*, hashtag_post.* FROM hashtag INNER JOIN hashtag_post ON hashtag_post.hashtagID = hashtag.hashtagID ";
                // WHERE hashtag_post.postID = ".$postID;
        $query3 = $this->db->query($sql3);
        
        $result3 = $query3->result_array();

        // var_dump($result3);
        
        
        foreach ($query1->result() as $row) {
            $postID = $row->postID;
            $comments = array();
            $hashtags = array();
            foreach ($query2->result() as $row1) {
                if ($row1->postID == $postID) {
                    $comments[] = $row1;
                }
            }
            // foreach($query3->result_array() as $row3) {
            for ($i = 0; $i < count($query3->result_array()); $i++) {
                if ($result3[$i]['postID'] == $postID) {
                    $hashtags[] = '#' . $result3[$i]['hashtag'];
                }
            }

            $row->comments = $comments;
            $row->hashtags = $hashtags;
        }
        return $query1->result();
        // $this->db->select('*');
        // $this->db->from('post');
        // $this->db->where('userID ', $id);
        // $query = $this->db->get();
        // return $query->result();
    }

    public function getPosts()
    { 
        $sql1 = "SELECT post.*, user_detail.userName FROM post JOIN user_detail ON post.userID = user_detail.userID";
        $query1 = $this->db->query($sql1);

        $sql2 = "SELECT comment.*, user_detail.userName FROM comment JOIN user_detail ON comment.userID = user_detail.userID";
        $query2 = $this->db->query($sql2);
        
        $sql3 = "SELECT hashtag.*, hashtag_post.* FROM hashtag INNER JOIN hashtag_post ON hashtag_post.hashtagID = hashtag.hashtagID ";
                // WHERE hashtag_post.postID = ".$postID;
        $query3 = $this->db->query($sql3);
        
        $result3 = $query3->result_array();

        // var_dump($result3);
        
        
        foreach ($query1->result() as $row) {
            $postID = $row->postID;
            $comments = array();
            $hashtags = array();
            foreach ($query2->result() as $row1) {
                if ($row1->postID == $postID) {
                    $comments[] = $row1;
                }
            }
            // foreach($query3->result_array() as $row3) {
            for ($i = 0; $i < count($query3->result_array()); $i++) {
                if ($result3[$i]['postID'] == $postID) {
                    $hashtags[] = '#' . $result3[$i]['hashtag'];
                }
            }

            $row->comments = $comments;
            $row->hashtags = $hashtags;
        }
        return $query1->result();
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
        $sqlID = "SELECT hashtagID FROM hashtag_post WHERE postID = " . $id;
        $queryID = $this->db->query($sqlID);

        // delete post by post id
        $sql = "DELETE FROM comment WHERE postID = " . $id;
        $query = $this->db->query($sql);

        foreach ($queryID->result() as $row) {
            $sql4 = "SELECT * FROM hashtag_post WHERE postID = " . $id;
            $query4 = $this->db->query($sql4);
            // if ($query4->num_rows() == 0) {
                $sql5 = "DELETE FROM hashtag WHERE hashtagID = " . $row->hashtagID;
                $query5 = $this->db->query($sql5);
            // }
        }
        $sql1 = "DELETE FROM post WHERE postID = " . $id;
        $query1 = $this->db->query($sql1);

        return $this->db->affected_rows();
    }
}
