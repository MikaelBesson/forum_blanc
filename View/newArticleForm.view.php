

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Nouveaux sujet</title>
</head>
<body>
    <div id="addArticle">
        <form action="/index.php?ctrl=addArticle" method="post">
            <fieldset>
                <legend>Nouveaux Sujet :</legend>
                <label for="nom">Entrez votre Nom :</label>
                <input type="text" name="nom" id="nom"><br>
                <label for="prenom">Entrez votre prenom :</label>
                <input type="text" name="prenom" id="prenom"><br>
                <label for="titre">Titre de votre sujet :</label>
                <input type="text" name="titre" id="titre"><br>
                <label for="textarea">message :</label><br>
                <textarea name="textarea" id="textarea" cols="60" rows="10" placeholder="Votre texte ici"></textarea><br>
            </fieldset>
            <a href="/index.php">Retour a l'acceuil</a>
            <input type="submit" value="Envoyer" id="submit_sujet"><br>
        </form>
    </div>
    <!--
     <div class="info">
        <?php /*if($data !== null) {
        echo $data;
    } */?>
    </div>
     -->

</body>
