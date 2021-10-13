<?php

class CommentController extends Controller {

    public function displayComment(int $messageId) {

        if($messageId != -1){
            $conn = (new Db())->connect();
            $req = $conn->prepare('SELECT * FROM commentaires WHERE id=:id');
            $req->bindParam(':id', $messageId);
            if($req->execute()) {
                $messageData = $req->fetch();
                $this->render('readArticle', $messageData);
            }
        }
    }
}