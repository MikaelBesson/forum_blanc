<?php
namespace Mika\App\Controller;

use Mika\App\Model\Classes\Controller;
use Mika\App\Model\Classes\Manager\UserManager;

class ConnexionController extends Controller {
    public function displayAddUser(){
        $this->render('addUserForm');
    }

    public function addUser($nom, $prenom, $email){
        $manager = new UserManager();
        $manager->addUser($nom,$prenom,$email);
    }

    public function displayConnexion(){
        $this->render('connexion');
    }
}