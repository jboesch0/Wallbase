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

        $sql = "SELECT * from wallpaper w, users u WHERE id_wallpaper =".htmlentities($img_id)." and w.idusers = u.idusers";

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

    public function getComments($id_img, $trie = null){
        //var_dump($trie);

        if($trie == null || $trie == "date_desc"){
            $sql = "SELECT * from comment c
            INNER JOIN users u ON u.idusers = c.id_user
            WHERE c.id_wallpaper = ".$id_img."
            ORDER BY c.date_post";
        }
        else if($trie == "date_asc"){
            $sql = "SELECT * from comment c
            INNER JOIN users u ON u.idusers = c.id_user
            WHERE c.id_wallpaper = ".$id_img."
            ORDER BY c.date_post DESC";
        }
        else{
            $sql = "SELECT * from comment c
            INNER JOIN users u ON u.idusers = c.id_user
            WHERE c.id_wallpaper = ".$id_img."
            ORDER BY c.likes DESC";
        }
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

    public function supprComment($idComment){

        $sql = "DELETE FROM comment WHERE id_comment = ".$idComment."";

        if($this->db->query($sql)){
            return true;
        }
        else{
            return false;
        }

    }

    public function modifComment($idComment, $comment){

        $sql="UPDATE comment SET comment = '".$comment."' WHERE id_comment = ".$idComment."";

        if($this->db->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function addLike($idComment, $idusers){

        $sql = "SELECT is_like FROM is_like WHERE id_comment = ".$idComment." AND id_user=".$idusers."";
        $res = $this->db->query($sql);
        $res = $res->result();
        /*var_dump($res);
        exit();*/
        if(empty($res)){
            $sql="UPDATE comment SET likes= likes+1 WHERE id_comment =".$idComment."";
            $this->db->query($sql);


            $sql2="INSERT IGNORE INTO is_like (id_user, id_comment, is_like) VALUES('".$idusers."','".$idComment."','true')";
            $this->db->query($sql2);

            $sql = "SELECT likes FROM comment WHERE id_comment = ".$idComment."";
            $res = $this->db->query($sql);
            $res = $res->result();

            $res["success"]= true;
            /*var_dump($res);
            exit();*/
            return $res;

        }
        else{
            $res["success"]= false;
            return $res;
        }

    }

    public function removeLike($idComment, $idusers){


        /*$sql="UPDATE comment AS c
        INNER JOIN is_like AS i
        ON c.id_comment = i.id_comment
        SET c.likes = c.likes-1
        WHERE i.id_comment = ".$idComment."
        AND i.id_user =".$idusers."
        AND i.is_like = 0";*/
        $sql = "SELECT is_like FROM is_like WHERE id_comment = ".$idComment." AND id_user=".$idusers."";
        $res = $this->db->query($sql);
        $res = $res->result();

        if(empty($res)){
            $sql="UPDATE comment SET likes= likes-1 WHERE id_comment =".$idComment."";
            $this->db->query($sql);


            $sql2="INSERT IGNORE INTO is_like (id_user, id_comment, is_like) VALUES('".$idusers."','".$idComment."','true')";
            $this->db->query($sql2);

            $sql = "SELECT likes FROM comment WHERE id_comment = ".$idComment."";
            $res = $this->db->query($sql);
            $res = $res->result();

            $res["success"]= true;
            /*var_dump($res);
            exit();*/
            return $res;

        }
        else{
            $res["success"]= false;
            return $res;
        }

    }


    /*function showTags($val){

        $sql = "SELECT * FROM tag WHERE nom LIKE '%".$val."%'";
        $res = $this->db->query($sql);
        $res = $res->result();
        if($res){
            return $res;
        }
        else{
            return false;
        }
    }*/
}
