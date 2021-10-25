<?php
namespace Mika\App\Controller;

use Mika\App\Model\Classes\Manager\ArticleManager;
use Mika\App\Model\Classes\Controller;
use Mika\App\Model\Classes\Manager\CommentManager;


class ArticleController extends Controller {

    public function displayArticle(int $articleId) {
        $manager = new ArticleManager();
        $message = new CommentManager();
        if($articleId ===-1 ){
            $articles= $manager->getArticles();
            $messages= $message->getMessage($articleId);
            $this->render('acceuil', $articles);
        }
        else {
            $article = $manager->getArticle($articleId);
            $this->render('readArticle', $article);
        }




    }

    public function addArticle($nom,$prenom,$titre,$texarea){
        if(isset($_POST['nom'],$_POST['prenom'],$_POST['titre'],$_POST['textarea'])) {
            $article = new ArticleManager();
            $article->addArticle($_POST['nom'],$_POST['prenom'],$_POST['titre'],$_POST['textarea']);

        }

    }
}




