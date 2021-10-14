<?php


class ArticleController extends Controller {

    public function displayArticle(int $articleId, $messageData) {

        if ($articleId != -1) {
            $conn = (new Db())->connect();
            $req = $conn->prepare('SELECT * FROM sujets WHERE id=:id');
            $req->bindParam(':id', $articleId);
            if ($req->execute()) {
                $articleData = $req->fetch();
                $articleData['id'] = $messageData;
                $reqComment = $conn->prepare('SELECT * FROM commentaires WHERE sujets_fk = :id');
                $reqComment->bindValue(':id', $articleId);
                $reqComment->execute();
                $result = $reqComment->fetchAll();


                $this->render('readArticle', [
                    'article' => $articleData,
                    'comments' => $result,
                ]);
            }
        }
    }
}


