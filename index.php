<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/Db.php';

require $_SERVER['DOCUMENT_ROOT'] . '/Classes/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Controller/HomeController.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Controller/ArticleController.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Controller/CommentController.php';



if(isset($_GET['ctrl'])) {
    switch($_GET['ctrl']) {
        case 'article':
            $controller = new ArticleController();
            $controller->displayArticle($_GET['id'] ?? -1);
            $controller1 =new CommentController();
            $controller1->displayComment($_GET['id'] ?? -1);
        break;
    }
}
else {

    $controller = new HomeController();
    $controller->displayAcceuil();

}