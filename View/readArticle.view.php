<?php

use Mika\App\Model\Classes\Manager\CommentManager;
use Mika\App\Controller\CommentController;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Article</title>
</head>
<body>
    <div>
        <div class="article">
            <span class="t1"><?= $data->getTitre()?> : </span><br>
            <p><?= $data->getMessage()?></p>
        </div>
            <span class="auteur">Proposer par : <?= $data->getPrenom() ." ". $data->getNom()?></span>

    </div>
    <div>
        <div class="comment">
            <?php
            foreach ($data as $comment){?>
                 <p><?= $comment->getMessage()?></p>
            <span class="auteur"><?= $comment->getAuteur() ?></span><?php
            }
            ?>
        </div>
        <a class="reponse" href="./index.php">Retour a l'acceuil</a> <span id="addRep">Ajoutez une reponse :<button>&#710;</button></span>

        <div id="hidden">
            <form action="CommentController.php" method="post">
                <fieldset id="divRep">
                    <label for="auteur">Votre nom :</label>
                    <input type="text" name="auteur" id="auteur"><br>
                    <label for="textarea">Votre message :</label><br>
                    <textarea name="textarea" id="textarea" cols="100" rows="10"></textarea><br><br>
                    <input type="button" value="Envoyer" id="messageSubmit">
                </fieldset>
            </form>

        </div>

    <script src="/asset/app.js"></script>
</body>
</html>





