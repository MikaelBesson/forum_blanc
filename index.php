<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Mika\App\Controller\{AddArticleController, ConnexionController, ArticleController, HomeController};


session_start();

if(isset($_GET['ctrl'])) {
    switch($_GET['ctrl']) {
        case 'article':
            $controller = new ArticleController();
            $controller->displayArticle($_GET['id'] ?? -1);
            break;

        case 'newArticleForm':
            $controller = new AddArticleController();
            $controller->displayAddArticle();
            break;

        case 'formulaire':
            $controller = new ConnexionController();
            $controller->displayAddUser();
            break;

        case 'addArticle':
            $controller = new ArticleController();
            if(isset($_POST['nom'],$_POST['prenom'],$_POST['titre'],$_POST['textarea'])){
                $controller->addArticle($_POST['nom'],$_POST['prenom'],$_POST['titre'],$_POST['textarea']);
            }
            header('Location: index.php');
            break;

        case 'inscription':
            $controller = new ConnexionController();
            if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'])){
                $controller->addUser($_POST['nom'],$_POST['prenom'],$_POST['email']);
            }
            header('Location: index.php?ctrl=formulaire');
            break;

        case 'connexionForm':
            $controller = new ConnexionController();
            $controller->displayConnexion();
            break;

        }
}
else {

    $controller = new HomeController();
    $controller->displayAcceuil();

}