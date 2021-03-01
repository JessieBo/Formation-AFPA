<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF−8" />
    <title>Abicom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <a href="index.php"><img src="img/logo.png" alt="logo"></a>
        <h1>Bienvenue sur ABI.COM</h1>
    </header>

    <form id="formulaire">
        <h3>Connexion</h3><br>
            <div class="infos">
                <div class="champs">
                    <label>Login</label>
                    <input type="text" id="login" name="username">
                </div>
                <div class="champs">
                    <label>Mot de passe</label>
                    <input type="password" id="password" name="password">
                 </div>
                <small id="resultat"></small>
            </div>
            <div class="boutons">
                <button name="submit" class="btn btn-dark rounded boutons" id="seConnecter" value="Valider">Valider</button>
                <input type="reset" class="btn btn-dark rounded boutons" id="annuler" value="Annuler">
            </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/connexion.js"></script>


</html>