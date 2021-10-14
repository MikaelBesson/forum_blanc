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
            <span class="t1"><?= $data['article']['titre']?> :</span><br>
            <p><?= $data['article']['message']?></p>
        </div>
            <span class="auteur"><?= $data['article']['prenom'] ." ". $data['article']['nom'] . " ". $data['article']['date']?></span>

    </div>
    <div>
        <div class="comment">
            <?php
            foreach ($data['comments'] as $comment){?>
                 <p><?= $comment['message']?></p>
            <span class="auteur"><?= $comment['auteur'] ." ". $comment['date']?></span><?php
            }
            ?>
        </div>
        <a class="reponse" href="./index.php">Retour a l'acceuil</a> <span id="addRep">Ajoutez une reponse :<button>&#710;</button></span>
    </div>
    <div id="hidden">
    </div>

    <script src="/asset/app.js"></script>
</body>
</html>





