<?php

namespace Mika\App\Model\Classes\Manager;

use Mika\App\Model\Classes\{Db, cleanInput};
use Mika\App\Model\Classes\Entity\article;



class ArticleManager {

    /**
     * return all articles
     * @return array
     */
    public function getArticles(){
        $conn = new Db();
        $articles = [];
        $req = $conn->connect()->prepare("SELECT * FROM sujets");
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $data_article){
            $articles[] = new article($data_article['id'], $data_article['nom'], $data_article['prenom'], $data_article['titre'], $data_article['message']);
        }
        return $articles;
    }

    /**
     * return an article
     * @param int $id
     * @return article|null
     */
    public function getArticle(int $id){
        $conn = new Db();
        $req = $conn->connect()->prepare("SELECT * FROM sujets WHERE id = :id");
        $req->bindValue(':id', $id);
        $req->execute();
        $data = $req->fetch();
        if($data) {
            return $article = new article($data['id'], $data['nom'], $data['prenom'], $data['titre'], $data['message'], $data['date']);
        }
        else {
            return null;
        }
    }


    /**
     * Add an article
     * @param $nom
     * @param $prenom
     * @param $titre
     * @param $message
     * @param $date
     * @return string
     */
    public function addArticle($nom, $prenom, $titre, $message) {
        $conn = new Db();
        $verif = new cleanInput();

        $nom = $verif->verifInput($nom);
        $prenom= $verif->verifInput($prenom);
        $titre = $verif->verifInput($titre);
        $message = $verif->verifInput($message);


        $req = $conn->connect()->prepare("INSERT INTO sujets('nom', 'prenom', 'titre', 'message') VALUES (:nom, :prenom, :titre, :message)");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':titre', $titre);
        $req->bindParam(':message', $message);

        if($req->execute()){
            return "Article ajouté avec succès";
        }
        else{
            return "erreur lors de l'ajout de l'article";
        }
    }


    /**
     * edit an article
     * @param article $article
     */
    public function editArticle(article $article){
        $conn =new Db();
        $req = $conn->connect()->prepare('UPDATE sujets SET titre = :titre WHERE id =:id');
        $req->bindValue(':titre', $article->getArticle());
        $req->bindValue('id', $article->getId());
        if($req->execute()){
            echo 'article modifié avec succès !!';
        }
        else{
            echo 'erreur pendant la modification';
        }
    }

    public function deleteArticle($articleId){
        $conn = new Db();
        $req = $conn->connect()->prepare('SELECT titre FROM sujets WHERE id =:id');
        $req->bindValue(':id' , $articleId);
        if($req->execute()){
            $req = $conn->connect()->prepare('DELETE FROM sujets WHERE id = :id');
            return 'Article supprimer avec succès';
        }
       else{
           return 'erreur pendant la suppression';
       }
    }
}
