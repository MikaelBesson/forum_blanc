<?php
namespace Mika\App\Controller;
use Mika\App\Model\Classes\Controller;
use Mika\App\Model\Classes\Manager\SujetManager;

class HomeController extends Controller {

    public function displayAcceuil() {
       $manager = new SujetManager();
       $sujets = $manager->getSujets();
       $this->render('acceuil', $sujets) ;
    }
}