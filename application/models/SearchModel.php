<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class SearchModel extends CI_Model
{
	public function recherche($recherche){
			$sql = "select * from wallpaper
			WHERE titre LIKE '%".$recherche."%'";
			$res = $this->db->query($sql);
			return $res->result();
		}

		public function searchByTag($tag){
			$sql = "SELECT titre FROM wallpaper w
			INNER JOIN a_pour a ON w.id_wallpaper = a.id_wallpaper
			INNER JOIN tag t ON a.id_tag = t.id_tag
			WHERE t.nom = '".$tag."'";
			$res = $this->db->query($sql);
			return $res->result();
		}

}
