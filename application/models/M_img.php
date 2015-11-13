<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class M_img extends CI_Model
{

    public function getImgInfos($img_id){

        $sql = "SELECT * from wallpaper WHERE id_wallpaper =".htmlentities($img_id)."";


        $res = $this->db->query($sql);
        //var_dump($res);
        //exit();
        return $res->result();
    }


    public function postComment($comment){

        $id_user = $this->session->userData("id");

        $sql= "INSERT INTO comment (comment,id_user) VALUES('".$comment."',".$id_user.");";

        $res = $this->db->query($sql);

        return false;
    }
}