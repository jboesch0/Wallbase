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
        $res = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
        $row = $res->row();
        return $row;
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