<?php

/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 29/09/15
 * Time: 11:27
 */
class User extends CI_Model
{

    function login($pseudo, $password)
    {
        $res = $this->db->query("SELECT * FROM users WHERE pseudo = '$pseudo' AND mdp = '$password'");
        $row = $res->row();
        return $row;
    }

    function getInfos($id){
        $res = $this->db->query("SELECT * FROM users WHERE idusers = '$id'");
        return $res->row();
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

    public function update($id, $email, $pseudo, $nom, $prenom, $mdp){
         return $this->db->query("UPDATE users SET pseudo = '$pseudo', nom = '$nom', prenom = '$prenom', email ='$email', mdp= '$mdp' WHERE idusers = '$id'");
    }

    public function setAvatar($id, $avatar){
      return $this->db->query("UPDATE users SET avatar = '$avatar' WHERE idusers = '$id'");
    }

    public function addUser($email, $pseudo, $nom, $prenom, $mdp)
    {
        $data = array(
            'idusers' => null,
            'pseudo' => $pseudo,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mdp' => $mdp
        );
       return $this->db->insert('users', $data);
    }

    public function getAvatar($id){
      $res = $this->db->query("SELECT avatar FROM users WHERE idusers = '$id'");
      return $res->row();
    }

    public function getImgsByUser($id){
      $res = $this->db->query("SELECT * FROM wallpaper WHERE idusers = '$id'");
      return $res->result();
    }

}
