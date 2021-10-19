
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Acceuil</title>
</head>
<body>
    <div id="header">
        <ul class="head">
            <li><a href="/index.php?ctrl=connexionForm">Connection</a></li>
            <li><a href="/index.php?ctrl=formulaire">Inscription</a></li>
            <li><a href="/index.php?ctrl=newArticleForm">Ajoutez un sujet</a></li>
        </ul>
    </div>

    <div id="acceuil_Div">
        <h1>Bienvenue sur le forum !!</h1>
        <?php
        foreach ($data as $sujet){ ?>
            <a href="/index.php?ctrl=article&id=<?= $sujet->getId() ?>"><span class="t1"><?= $sujet->getTitre()?> : </span></a><br>
            <span class="auteur">Proposer par : <?= $sujet->getNom()." ". $sujet->getPrenom()?></span><br><br>
        <?php }
        ?>
    </div>
</body>
</html>
