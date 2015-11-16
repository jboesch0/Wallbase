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
        if ($data['logged']) {
          $id = $this->session->userdata('id');
          $data['infos'] = $this->user->getInfos($id);
          $data['pseudo'] = $data['infos']->pseudo;
          $data['avatar'] = $this->user->getAvatar($id)->avatar;
          $data['UserImgs'] = $this->user->getImgsByUser($id);
          $this->load->view('partials/header', $data);
          $this->load->view('partials/navbar');
          $this->load->view('profil/profil', $data);
          $this->load->view('partials/footer');
        }else {
          redirect('HomeController');
        }
    }

    public function update(){
        $this->load->model('user');
        $data['logged'] = $this->user->isLoggedIn();
        $id = $this->session->userdata('id');
        $email = $this->input->post('Jemail');
        $pseudo = $this->input->post('Jpseudo');
        $nom = $this->input->post('Jnom');
        $prenom = $this->input->post('Jprenom');
        $mdp = $this->input->post('Jmdp');
        $avatar = $this->input->post('Javatar');
        $this->user->update($id, $email, $pseudo, $nom, $prenom, $mdp);
    }

    public function setAvatar(){
      $this->load->model('user');
      $data['logged'] = $this->user->isLoggedIn();
      $id = $this->session->userdata('id');
      $data['infos'] = $this->user->getInfos($id);
      $data['pseudo'] = $data['infos']->pseudo;
      $this->load->view('partials/header', $data);
      $this->load->view('partials/navbar');
      $this->load->view('profil/profil', $data);
      $this->load->view('partials/footer');

      if (!empty($_FILES) && isset($_FILES)) {
        $tempFile = $_FILES['avatar']['tmp_name'];
  			$fileName = $_FILES['avatar']['name'];

        $this->user->setAvatar($id, $fileName);

        $targetPath = getcwd() . '/assets/avatar/';
        $targetFile = $targetPath . $fileName ;
        move_uploaded_file($tempFile, $targetFile);
        redirect('UserController');
      }
    }

    public function mesPhotos(){
      $this->load->model('user');


      $data['logged'] = $this->user->isLoggedIn();
      if ($data['logged']) {
        $id = $this->session->userdata('id');
        $data['infos'] = $this->user->getInfos($id);
        $data['pseudo'] = $data['infos']->pseudo;
        $data['UserImgs'] = $this->user->getImgsByUser($id);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/navbar');
        $this->load->view('profil/mesphotos', $data);
        $this->load->view('partials/footer');
      }else {
        redirect('HomeController');
      }

    }

}
