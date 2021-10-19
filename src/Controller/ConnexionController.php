<?php
namespace Mika\App\Controller;

use Mika\App\Model\Classes\Controller;
use Mika\App\Model\Classes\Manager\UserManager;

class ConnexionController extends Controller {
    public function displayAddUser(){
        if(isset($_SESSION['info'])){
            $var = $_SESSION['info'];

        }
        else{
            $var = null;
        }
        $this->render('addUserForm',$var);
    }

    public function addUser($nom, $prenom, $email){
        $manager = new UserManager();
        return $manager->addUser($nom,$prenom,$email,);
    }

    public function displayConnexion(){
        $this->render('connexion');
    }
}