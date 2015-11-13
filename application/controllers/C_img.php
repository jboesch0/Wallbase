<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class C_img extends CI_Controller
{

	public function index()
    {
        $this->load->model('user');
        $data['logged'] = $this->user->isLoggedIn();
        $data['username'] = $this->session->userdata('username');

    	$id_img = $this->input->get('img_id');
    	$this->load->model('M_img');
        $data["img_infos"] = $this->M_img->getImgInfos($id_img);
        
        $this->load->model('HomeModel');
        $data['tags']=$this->HomeModel->someTags();

        $this->load->view('partials/header');
        $this->load->view('partials/navbar', $data);
        $this->load->view('modals/connexion_modal');
        $this->load->view('modals/inscription_modal');
        $this->load->view('partials/tagbar', $data);
        $this->load->view('img_infos', $data);
        $this->load->view('partials/footer');
    }


    public function postComment(){

        $this->load->model('M_img');
        $comment = $this->input->post("comment");

        $result = $this->M_img->postComment($comment);

        if($result){
            return $result;
        }
        else{
            return false;
        }
    }
}