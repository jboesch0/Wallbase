<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 30/09/15
 * Time: 12:14
 */
class UserController extends CI_Controller
{

    public function index(){
        $this->load->model('user');
        $data['logged'] = $this->user->isLoggedIn();
        $data['username'] = $this->session->userdata('username');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/navbar');
        $this->load->view('profil/profil');
        $this->load->view('partials/footer');

    }

}