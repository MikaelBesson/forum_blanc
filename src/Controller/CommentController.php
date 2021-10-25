<?php
namespace Mika\App\Controller;
use Mika\App\Model\Classes\Controller;
use Mika\App\Model\Classes\Db;
use Mika\App\Model\Classes\Entity\Comment;
use Mika\App\Model\Classes\Manager\CommentManager;

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

    public function addComment(Comment $comment) {
        $conn = (new Db())->connect();
        $req =$conn->prepare('INSERT INTO commentaires (message, sujets_fk) VALUES (:message, :sujets_fk)');
        $req->bindValue(':message', $comment->getMessage());
        $req->bindValue(':sujets_fk', $comment->getId());
        if($req->execute()) {
            echo 'Commentaire ajouté';
        }
    }
}