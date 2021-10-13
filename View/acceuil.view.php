
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Acceuil</title>
</head>
<body>
    <div id="acceuil_Div">
        <h1>Bienvenue sur le forum !!</h1>
        <?php
        require_once 'Classes/Db.php';

        $conn = (new Db())->connect();
        $req = $conn->prepare('SELECT * FROM sujets');
        if($req->execute()){
            foreach ($req->fetchAll() as $article) {
                ?>
                <a href="/index.php?ctrl=article&id=<?=$article['id']?>"><?= $article["titre"]?></a>
                <p>  sujet proposer par : <?= $article["prenom"] ." ". $article["nom"]?></p><br>
                <?php
            }
        }
        else{
            ?>
            <p>erreur</p>
            <?php
        }
        ?>
    </div>


</body>
</html>
