<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class SearchController extends CI_Controller
{

    public function index($search = null)
    {

        $this->load->model('user');
        $data['logged'] = $this->user->isLoggedIn();
        $data['username'] = $this->session->userdata('username');
        /*$data['wallpaper'] = $search;
        var_dump($data['wallpaper']);
            exit;*/
        $this->load->view('partials/header');
        $this->load->view('partials/navbar', $data);
        $this->load->view('modals/connexion_modal');
        $this->load->view('modals/inscription_modal');
        $this->load->view('search', $data);
        $this->load->view('partials/footer');


    }

    public function recherche(){
        $recherche = $this->input->post('recherche');
        $this->load->model('SearchModel');
        $res = $this->SearchModel->recherche($recherche);
        if($res){
            $data["wallpapers"] = $res;
            $data["recherche"] = $recherche;

            $this->load->model('HomeModel');
            $data['tags']=$this->HomeModel->someTags();
            /*var_dump($data);
            exit;*/
            $this->load->model('user');
            $data['logged'] = $this->user->isLoggedIn();
            if ($data['logged']) {
              $id = $this->session->userdata('id');
              $infosUser = $this->user->getInfos($id);
              $data['pseudo'] = $infosUser->pseudo;
            }
            $data['logged'] = $this->user->isLoggedIn();
            $data['username'] = $this->session->userdata('username');
            $this->load->view('partials/header');
            $this->load->view('partials/navbar', $data);
            $this->load->view('modals/connexion_modal');
            $this->load->view('modals/inscription_modal');
            $this->load->view('partials/tagbar', $data);
            $this->load->view('search', $data);
            $this->load->view('partials/footer');
        }
        else{
            show_404();
        }

    }

    function searchByTag(){
        $tag = $this->input->get('tag');
        /*var_dump($tag);
        exit();*/
        $this->load->model('SearchModel');
        $res = $this->SearchModel->searchByTag($tag);

        if($res){
            $data["wallpapers"] = $res;
            $data["recherche"] = $tag;

            $this->load->model('HomeModel');
            $data['tags']=$this->HomeModel->someTags();

            $this->load->model('user');
            $data['logged'] = $this->user->isLoggedIn();
            if ($data['logged']) {
              $id = $this->session->userdata('id');
              $infosUser = $this->user->getInfos($id);
              $data['pseudo'] = $infosUser->pseudo;
            }
            $data['logged'] = $this->user->isLoggedIn();
            $data['username'] = $this->session->userdata('username');
            $this->load->view('partials/header');
            $this->load->view('partials/navbar', $data);
            $this->load->view('modals/connexion_modal');
            $this->load->view('modals/inscription_modal');
            $this->load->view('partials/tagbar', $data);
            $this->load->view('search', $data);
            $this->load->view('partials/footer');



        }
        else{
            show_404();
        }

    }

    function allTags(){

        $this->load->model('SearchModel');

        $res = $this->SearchModel->allTags();

        if($res){

            $data["tags"] = $res;

            $this->load->model('user');
            $data['logged'] = $this->user->isLoggedIn();
            if ($data['logged']) {
              $id = $this->session->userdata('id');
              $infosUser = $this->user->getInfos($id);
              $data['pseudo'] = $infosUser->pseudo;
            }
            $this->load->view('partials/header');
            $this->load->view('partials/navbar', $data);
            $this->load->view('modals/connexion_modal');
            $this->load->view('modals/inscription_modal');
            //$this->load->view('partials/tagbar', $data);
            $this->load->view('tags', $data);
            $this->load->view('partials/footer');
        }
        else{
            show_404();
        }

    }

}
