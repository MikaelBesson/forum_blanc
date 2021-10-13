<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Article</title>
</head>
<body>
    <div>
        <div class="article">
            <span class="t1"><?= $data['titre']?> :</span><br>
            <p><?= $data['message']?></p>
            <span class="auteur"><?= $data['prenom'] ." ". $data['nom']?></span>
        </div>
    </div>
    <div>
        <div class="comment">
            <p><?= $info['message']?></p>
            <span class="auteur"><?= $info['auteur'] ." ". $info['date_reponse']?></span>
        </div>
    </div>
</body>
</html>





