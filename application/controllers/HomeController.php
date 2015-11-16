<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jerome
 * Date: 28/09/15
 * Time: 12:52
 */
class HomeController extends CI_Controller
{

    public function index()
    {

        $this->load->model('HomeModel');
        $data['wallpapers']=$this->HomeModel->lastWallpapers();
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
        $data['tags']=$this->HomeModel->someTags();

>>>>>>> origin/master
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
        $this->load->view('partials/tagbar', $data);
        $this->load->view('home', $data);
        $this->load->view('partials/footer');


    }

    public function register(){
        $email = $this->input->post('Jemail');
        $pseudo = $this->input->post('Jpseudo');
        $nom = $this->input->post('Jnom');
        $prenom = $this->input->post('Jprenom');
        $mdp = $this->input->post('Jmdp');

        if (isset($email) && !(empty($email))
            && isset($pseudo) && !(empty($pseudo))
            && isset($nom) && !(empty($nom))
            && isset($prenom) && !(empty($prenom))
            && isset($mdp) && !(empty($mdp))){

            $this->load->model('user');
            $this->user->addUser($email, $pseudo, $nom, $prenom, $mdp);
            echo json_encode(array('pseudo' => $pseudo));
            return true;
        } else {
            echo json_encode(array('errChamps' => "Les champs n'ont pas été bien remplis"));
            return false;
        }
    }

    public function login()
    {
        $this->load->model('user');
        $username = $this->input->post('Jname');
        $password = $this->input->post('Jpassword');
        $return = $this->user->login($username, $password);

        if($return){
            $data = array(
                'return' => true,
                'id' => $return->idusers,
                'pseudo' => $return->pseudo,
                'logged_in' => true
            );
            $this->session->set_userdata($data);
            echo (json_encode($data));
            return true;
        }else {
            return false;
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
        exit;
    }

    public function keyWord(){
        $word = $this->input->post('word');
        $this->load->model('HomeModel');
        $res = $this->HomeModel->keyWord($word);
        if($res){
            //echo json_encode($res);
            $this->load->view('home', $res);
            return true;
        }
        else{
            echo "Il y a un problème";
        }
    }

    


}
