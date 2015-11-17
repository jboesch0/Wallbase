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
        $data['pseudo'] = $this->session->userdata('pseudo');
    		$id_img = $this->input->get('img_id');
    		$this->load->model('M_img');
        $data["img_infos"] = $this->M_img->getImgInfos($id_img);
        $this->load->model('HomeModel');
        $data['tags']=$this->HomeModel->someTags();
        $this->load->model('M_img');
        $data['comments']=$this->M_img->getComments($id_img);
        /*var_dump($data["comments"]);
        exit();*/
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
        $comment = $this->input->post("Jcomment");
        $id_wallpaper = $this->input->post("Jimg");
        /*var_dump(date('Y-m-j h:i:s'));
        exit();*/

        $result = $this->M_img->postComment($comment, $id_wallpaper);
        //var_dump($result);
        if($result){
            //var_dump($result);
            $allComment['comments']=$this->M_img->getComments($id_wallpaper);
            //var_dump($allComment);
            $allComment = json_decode(json_encode($allComment), true);
            echo json_encode($allComment);
            return true;
        }
        else{
            var_dump("lol");
            return false;
        }
    }
}
