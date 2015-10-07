<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class DropzoneModel extends CI_Model
{
	
public function insertWallpaper($fileName, $idusers){

	$sql = "INSERT INTO wallpaper (titre, idusers)
	VALUES ('".htmlentities($fileName)."','".htmlentities($idusers)."')";

	$res = $this->db->query($sql);

	return $res;
	
	
}

}