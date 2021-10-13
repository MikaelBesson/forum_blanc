<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/Db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/cleanInput.php';


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
            $articles[] = new article($data_article['id'], $data_article['nom'], $data_article['prenom'], $data_article['titre'], $data_article['message'], $data_article['date']);
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

        $article = $verif->verifInput($nom);
        $article = $verif->verifInput($prenom);
        $article = $verif->verifInput($titre);
        $article = $verif->verifInput($message);
        $req = $conn->connect()->prepare("INSERT INTO sujets($nom, $prenom, $titre, $message) VALUES (:nom :prenom :titre :message)");
        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':titre', $titre);
        $req->bindValue(':content', $message);
        
        try {
            if($req->execute()){
                return "Article ajouté avec succès";
            }
            else{
                return "erreur lors de l'ajout de l'article";
            }
        }
        catch(PDOException $e){
            return "l'article est deja present";
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
