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


    public function postComment($comment, $id_wallpaper){
        //var_dump($comment);
        $id_user = $this->session->userdata("id");

        $sql= "INSERT INTO comment (comment, date_post, id_user, id_wallpaper) VALUES('".$comment."','".date('Y-m-j h:i:s')."', ".$id_user.",".$id_wallpaper.");";

        $res = $this->db->query($sql);
        //var_dump($res);
        if($res){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function getComments($id_img){

        $sql = "SELECT * from comment c 
        INNER JOIN users u ON u.idusers = c.id_user 
        WHERE c.id_wallpaper = ".$id_img." 
        ORDER BY c.date_post";
        $res = $this->db->query($sql);
        /*var_dump($res->result());
        exit();*/
        $res = $res->result();
        /*var_dump($res->result()[0]->date);
        exit();*/
        foreach($res as $i=>$a_res){
            $res[$i]->date_post = explode("-",explode(" ",$a_res->date_post)[0])[2]."/".explode("-",$a_res->date_post)[1]." à ".explode(" ",$a_res->date_post)[1];

        }
        return $res;
    }
}