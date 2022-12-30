<?php

class LikeModel extends CI_Model
{
    public function insertLike($postID, $userID)
    {
        if (isset($postID) && isset($userID)) {
            $data = array('liked' => TRUE);
            $res = $this->db->get_where('like_user_post', array('postID' => $postID, 'userID' => $userID));
            if ($res->num_rows() != 1) {
                var_dump("LIKE - " . $data['liked']);
                $this->db->insert('liked', $data);
                $data_new = array(
                    'postID' => $postID,
                    'userID' => $userID,
                    'likeID' => $this->db->insert_id()
                );
                $this->db->insert('like_user_post', $data_new);
                return "Liked post!";
            } else {
                $data = array('liked' => FALSE);
                var_dump("LIKE - " . $data['liked']);
                $this->db->where('likeID', $res->row()->likeID);
                $this->db->delete('like_user_post');
                $this->db->insert('liked', $data);
                return "Unliked post!";
            }
            return $this->db->affected_rows();
        } else {
            return "No data";
        }
    }
}
