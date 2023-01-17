<?php

class CommentModel extends CI_Model
{
    public function insertComment($comment, $postID, $userID)
    {
        $data = array(
            'comment' => $comment,
            'postID' => $postID,
            'userID' => $userID
        );
        $this->db->insert('comment', $data);
        return $this->db->insert_id();
    }

    public function getComment($id)
    {
        // $this->db->select('*');
        // $this->db->from('comment');
        // $this->db->where('postID', $id);

        $this->db->select('userName, comment.*');
        $this->db->from('user_detail');
        $this->db->where('postID', $id);
        $this->db->join('comment', 'user_detail.userID = comment.userID');

        $query = $this->db->get();
        return $query->result();
    }

    public function deleteComment($id)
    {
        $this->db->where('commentID', $id);
        $this->db->delete('comment');
        return $this->db->affected_rows();
    }
}
