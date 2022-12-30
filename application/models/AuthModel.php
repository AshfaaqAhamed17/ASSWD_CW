<?php

class AuthModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verifyUser($username, $email)
    {
        $result = $this->db->query("SELECT * FROM user_detail WHERE userName = '" . $username . "' OR email =  '" . $email . "'");

        $count = $result->num_rows();
        return $count;
    }
    
    public function registerUser($username, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'userName' => $username,
            'email' => $email,
            'password' => $hashed_password
        );
        $this->db->insert('user_detail', $data);
        return $this->db->insert_id();
    }

    public function loginUser($username, $password)
    {
        $res = $this->db->get_where('user_detail', array('userName' => $username));
        if ($res->num_rows() != 1) {
            return false;
        } else {
            $row = $res->row();
            if (password_verify($password, $row->password)) {
                return $row;
            } else {
                return false;
            }
        }
    }
}
