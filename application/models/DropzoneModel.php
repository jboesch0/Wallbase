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
	$sql = "INSERT INTO wallpaper (titre, extension, idusers)
	VALUES ('".htmlentities(explode('.',$fileName)[0])."','".htmlentities(explode('.',$fileName)[1])."','".htmlentities($idusers)."')";
	$res = $this->db->query($sql);
	return $res;


}
}
