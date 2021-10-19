<?php

namespace Mika\App\Model\Classes\Manager;

use Mika\App\Model\Classes\Db;
use Mika\App\Model\Classes\Entity\Sujet;

class SujetManager{

    public function getSujets(){
        $conn = new Db();
        $req = $conn->connect()->prepare('SELECT * FROM sujets');
        $req->execute();
        $result = $req->fetchAll();
        $sujets = [];
        foreach ($result as $sujet){
            $sujets[] = new Sujet($sujet['id'],$sujet['nom'],$sujet['prenom'],$sujet['titre'],$sujet['message'],$sujet['date']);
        }
        return $sujets;


   }

}