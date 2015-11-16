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
<<<<<<< HEAD
		$sql = "select * from wallpaper order by idwallpaper desc limit 4";
=======
		

		$sql = "SELECT * from wallpaper order by id_wallpaper desc limit 10";

>>>>>>> origin/master
		$res = $this->db->query($sql);
		return $res->result();
	}

<<<<<<< HEAD
}
=======
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

<<<<<<< Updated upstream
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
=======
	

}
>>>>>>> origin/master
>>>>>>> Stashed changes
