<?php

class ArticleController extends Controller {

    public function displayArticle(int $articleId) {
        // chercher l'article en base de données si id fourni est diff de -1
        // Si l'article existe. alors récupérer toutes ses infos en base de données
        // Ensuite, afficher la bonne vue avec les données récupérées depuis la base de données/
        if($articleId != -1){
            $conn = (new Db())->connect();
            $req = $conn->prepare('SELECT * FROM forum_sujets WHERE id=:id');
            $req->bindParam(':id', $articleId);
            if($req->execute()) {
                $articleData = $req->fetch();
                $this->render('readArticle', $articleData);
            }
        }
    }
}
