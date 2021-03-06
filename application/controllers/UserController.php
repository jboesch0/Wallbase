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
          $data['follows'] = $return = $this->user->getFollow($id);
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
        $retour = array(
            'success' =>  true,
            'pseudo' => $pseudo
        );
        echo json_encode($retour);
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

    public function photosFromUser(){
        $this->load->model('user');
        $data['logged'] = $this->user->isLoggedIn();
        if ($data['logged']) {
            $id = $this->session->userdata('id');
            $idd = $this->input->get('id');
            $data['infos'] = $this->user->getInfos($id);
            $data['pseudo'] = $data['infos']->pseudo;
            $data['UserImgs'] = $this->user->getImgsByUser($idd);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/navbar');
            $this->load->view('profil/mesphotos', $data);
            $this->load->view('partials/footer');
        }else {
            redirect('HomeController');
        }
    }

    public function follow(){
      $id = $this->input->post('Jid');
      $idCurrent = $this->session->userdata('id');
      $return = $this->user->follow($idCurrent, $id);

      if($return){
          $data = array(
              'return' => true,
              'followed' => true
          );
          echo (json_encode($data));
          return true;
      }else {
          return false;
      }
    }


}
