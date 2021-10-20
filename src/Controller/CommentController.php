<?php
namespace Mika\App\Controller;
use Mika\App\Model\Classes\Controller;
use Mika\App\Model\Classes\Db;
use Mika\App\Model\CommentManager;

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

    public function addComment(int $messageId) {
        $conn = (new Db())->connect();
        $req =$conn->prepare('SELECT message FROM commentaires WHERE id = :id');
        $req->bindParam('id', $messageId);
        if($req->execute()){
            $result = new CommentManager();
            $result->addMessage('$_post["auteur"]', '$_post["message"]');
        }
    }
}