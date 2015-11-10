<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class HomeModel extends CI_Model
{
	public function lastWallpapers(){
		

		$sql = "SELECT * from wallpaper order by id_wallpaper desc limit 10";

		$res = $this->db->query($sql);
		return $res->result();

		


	}

	public function keyWord($word){
		$sql = "SELECT nom_tag from tag WHERE nom LIKE '".$word."'%";
		$res = $this->db->query($sql);
		return $res->result();
	}

	public function someTags(){
		$sql = "SELECT nom FROM tag ORDER BY RAND()";
		$res = $this->db->query($sql);
		return $res->result();
	}

	

}