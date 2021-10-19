<?php
namespace Mika\App\Model\Classes;
use PDO;
use PDOException;

class Db {

    private string $server;
    private string $user;
    private string $password;
    private string $db;

    public function __construct(){
        $this->server ='localhost';
        $this->user = 'root';
        $this->password ='';
        $this->db = 'forum_blanc';
    }

    public function connect(){
        try{
            $db = new PDO("mysql:host =$this->server;dbname=$this->db;charset=utf8",$this->user,$this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "erreur de connexion : ".$e->getMessage();
            return null;
        }
        return $db;
    }

}