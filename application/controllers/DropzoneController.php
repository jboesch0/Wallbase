<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class DropzoneController extends CI_Controller
{



	public function index() {
		$this->load->model('user');
        $data['logged'] = $this->user->isLoggedIn();
        $data['pseudo'] = $this->session->userdata('pseudo');
        $this->load->view('partials/header');
        $this->load->view('partials/navbar', $data);
        $this->load->view('modals/connexion_modal');
        $this->load->view('modals/inscription_modal');
        $this->load->view('dropzone', $data);
        $this->load->view('partials/footer');
	}


	public function upload() {

		if (!empty($_FILES)) {
        	$data = $this->session->userdata('id');
			$this->load->model('DropzoneModel');
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];

    		if($this->DropzoneModel->insertWallpaper($fileName, $data)){


				$targetPath = getcwd() . '/assets/wallpaper/';
				$targetFile = $targetPath . $fileName ;
				move_uploaded_file($tempFile, $targetFile);
				$config = array(
					'image_library'=>'GD2',
					'source_image'=> getcwd() . '/assets/wallpaper/'.$fileName,
					'new_image'=> './assets/wallpaper/miniatures',
					'creat_thumb'=>true,
					'thum_marker'=>'',
					'maintain_ratio'=>false,
					'width'=>200,
					'height'=>150);

				$this->load->library('image_lib',$config);
				$this->image_lib->resize();
			}

		}
	}
}
