<?php

class CommentController extends Controller {

    public function displayComment(int $commentId) {

        if($commentId != -1){
            $conn = (new Db())->connect();
            $req = $conn->prepare('SELECT * FROM forum-reponses WHERE id=:id');
            $req->bindParam(':id', $commentId);
            if($req->execute()) {
                $commentData = $req->fetch();
                $this->render('readArticle',$data, $commentData);
            }
        }
    }
}