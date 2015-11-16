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
		

		$sql = "select * from wallpaper order by idwallpaper desc limit 10";

		$res = $this->db->query($sql);
		return $res->result();

		


	}

}