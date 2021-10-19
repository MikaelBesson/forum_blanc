<?php

namespace Mika\App\Model;


use Mika\App\Classes\cleanInput;
use Mika\App\Classes\Db;
use Mika\App\Model\Entity\Comment;
use PDOException;

class CommentManager {

    /**
     * return all comments
     * @return array
     */
    public function getMessages(){
        $conn = new Db();
        $messages = [];
        $req = $conn->connect()->prepare('SELECT * FROM commentaires');
        $req->execute();
        $info = $req->fetchAll();
        foreach ($info as $data_message){

            $messages[] = new comment($data_message['id'], $data_message['auteur'], $data_message['message'], $data_message['date']);
        }
        return $messages;
    }

    /**
     * return one comment
     * @param int $id
     * @return comment|null
     */
    public function getMessage(int $id){
        $conn = new Db();
        $message = [];
        $req = $conn->connect()->prepare("SELECT * FROM commentaires WHERE id = :id");
        $req->bindValue(':id', $id);
        $req->execute();
        $data = $req->fetch();
        if($data) {
            return $message = new comment($data['id'], $data['auteur'], $data['message'], $data['date']);
        }
        else{
            return null;
        }
    }


    /**
     * add a commentaire
     * @param $auteur
     * @param $message
     * @return string
     */
    public function addMessage($auteur, $message){
        $conn =new Db();
        $verif = new cleanInput();

        $message =$verif->verifInput($auteur);
        $message =$verif->verifInput($message);
        $req = $conn->connect()->prepare('INSERT INTO commentaires($auteur, $message) VALUES(:auteur, :message)');
        $req->bindValue(':auteur', $auteur);
        $req->bindValue(':message', $message);

        try{
            if($req->execute()){
                return 'Commentaire ajouté avec succès';
            }
            else{
                return "erreur lors de l'ajout du commentaire";
            }
        }
        catch(PDOException $e){
            return 'le commentaire existe deja';
        }
    }

    /**
     * edit a comment
     * @param comment $comment
     */
    public function editMessage(message $message){
        $conn = new Db();
        $req = $conn->connect()->prepare('UPDATE commentaires SET auteur = :auteur WHERE id =:id');
        $req->bindValue(':auteur', $auteur->getAuteur());
        $req->bindValue('id', $auteur->getId());
        if($req->execute()){
            echo 'commentaire modifié avec succès';
        }
        else{
            echo 'erreur pendant la modification';
        }
    }

    public function deleteMessage($messageId){
        $conn = new Db();
        $req = $conn->connect()->prepare('SELECT message FROM commentaires WHERE id=:id');
        $req->bindValue('id', $messageId);
        if($req->execute()){
            $req = $conn->connect()->prepare('DELETE FROM commentaires WHERE id =:id');
            return 'Commentaire supprimer avec succès';
        }
        else{
            return 'erreur pendant la supression';
        }
    }













}