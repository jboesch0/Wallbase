<?php

/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 29/09/15
 * Time: 11:27
 */
class User extends CI_Model
{

    function login($username, $password)
    {
<<<<<<< Updated upstream
        var_dump("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $res = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'"); 
        /*$this->db->select("*");
        $this->db->from("users");
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $row = $this->db->get();*/
        $row = $res->row();
        var_dump($row);
        return $row;
=======
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $query = $this->db->get();
        return $query->row();
>>>>>>> Stashed changes
    }

    public function isLoggedIn()
    {
        $is_logged_in = $this->session->userdata('logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            return false;
        }else {
            return true;
        }
    }


}