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
            $allComment["id_user"] = $this->session->userdata("id");
            echo json_encode($allComment);
            return true;
        }
        else{
            return false;
        }
    }


    public function supprComment(){
        $idComment = $this->input->post("JidComment");

        $this->load->model("M_img");

        if($this->M_img->supprComment($idComment)){
            json_encode(true);
        }
        else{
            json_encode(false);
        }
    }

    public function modifComment(){
        $idComment = $this->input->post("JidComment");
        $comment = $this->input->post("Jcomment");
        $id_wallpaper = $this->input->post("Jid_wallpaper");
        /*var_dump($id_wallpaper);
        exit();*/

        $this->load->model("M_img");
        $result = $this->M_img->modifComment($idComment, $comment);

        if($result){
            $allComment['comments']=$this->M_img->getComments($id_wallpaper);

            $allComment = json_decode(json_encode($allComment), true);
            $allComment["id_user"] = $this->session->userdata("id");
            echo json_encode($allComment);
            return true;
        }
        else{
            return false;
        }
    }

    public function addLike(){
        $idComment = $this->input->post("JidComment");
        $this->load->model("M_img");
        if($this->session->userdata("id") != null){
            $result = $this->M_img->addLike($idComment, $this->session->userdata("id"));
        }
        if($result["success"]){
            

            $result = json_decode(json_encode($result), true);
            $result["id_user"] = $this->session->userdata("id");
            $result["is_like"] = true;
            /*var_dump($result["id_user"]);
            exit();*/
            echo json_encode($result);
            return true;
        }
        else{
            return false;
        }

    }

    public function removeLike(){
        $idComment = $this->input->post("JidComment");
        $this->load->model("M_img");
        if($this->session->userdata("id") != null){
            $result = $this->M_img->removeLike($idComment, $this->session->userdata("id"));
        }

        if($result["success"]){
            

            $result = json_decode(json_encode($result), true);
            $result["id_user"] = $this->session->userdata("id");
            $result["is_like"] = true;
            /*var_dump($result);
            exit();*/
            echo json_encode($result);
            return true;
        }
        else{
            return false;
        }

    }


    function trierCommentaires(){
        $select = $this->input->post("Jselect");
        $id_wallpaper = $this->input->post("Jid_wallpaper");
        /*var_dump($id_wallpaper);
        exit();*/

        $this->load->model("M_img");
        //$result = $this->M_img->modifComment($idComment, $comment);
        $allComment['comments']=$this->M_img->getComments($id_wallpaper, $select);
        if($allComment){
            

            $allComment = json_decode(json_encode($allComment), true);
            $allComment["id_user"] = $this->session->userdata("id");
            echo json_encode($allComment);
            return true;
        }
        else{
            return false;
        }
    }
}
