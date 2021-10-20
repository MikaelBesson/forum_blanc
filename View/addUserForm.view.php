

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/style.css">
    <title>formulaire d'inscription</title>
</head>
<body>
<div>
    <form action="/index.php?ctrl=inscription" method="post">

        <div class="form">
            <h2>Formulaire d'inscription</h2>
            <fieldset class="inscription">
                <legend>Inscription</legend>
                <label for="nom">Votre nom : </label>
                <input type="text" name="nom" id="nom" placeholder="Votre nom ici" required><br><br>
                <label for="prenom">Votre prenom : </label>
                <input type="text" name="prenom" id="prenom" placeholder="Votre prenom ici" required><br><br>
                <label for="email">Votre adresse mail :</label>
                <input type="text" name="email" id="email" placeholder="Votre email ici" title="adresse valide merci"
                       required><br><br>
            </fieldset>

            <div class="subMessage">
                <div class="submit">
                    <a href="/index.php">Retour a l'acceuil</a>
                    <input id="submitRegister" type="submit" name="submit" value="validez l'inscription"
                           title="Allez viend on est bien !!">
                </div>
            </div>
        </div>
    </form>
</body>
</html>





