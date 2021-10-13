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
        $req = $conn->connect()->prepare("SELECT * FROM forum_sujets");
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $data_article){
            $articles[] = new article($data_article['id'], $data_article['name'], $data_article['lastname'], $data_article['title'], $data_article['content'], $data_article['date']);
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
        $req = $conn->connect()->prepare("SELECT * FROM forum_sujets WHERE id = :id");
        $req->bindValue(':id', $id);
        $req->execute();
        $data = $req->fetch();
        if($data) {
            return $article = new article($data['id'], $data['name'], $data['lastname'], $data['title'], $data['content'], $data['date']);
        }
        else {
            return null;
        }
    }

    public function addArticle($name, $lastname, $title, $content, $date) {
        $conn = new Db();
        $verif = new cleanInput();

        $article = $verif->verifInput($name,$lastname,$title,$content);
        $req = $conn->connect()->prepare("INSERT INTO forum_sujets($name, $lastname, $title, $content) VALUES (:name :lastname :title :content)");
        $req->bindValue(':name', $name);
        $req->bindValue(':lastname', $lastname);
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        
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






}
