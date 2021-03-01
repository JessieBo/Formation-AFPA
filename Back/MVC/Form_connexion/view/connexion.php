<?php
$title = "Connexion MVC";
ob_start();
?>

<body>

    <header>
        <h1>Connexion MVC</h1><br>
    </header>

    <form action="index.php?action=verification" method="post" id="formulaire">
        <a href="index.php?action=creation_compte" id="creation">Créer un compte</a>
            <div class="infos">
                <div class="champs">
                    <label>Utilisateur : </label>
                    <input type="text" id="login" name="username" value="<?= ucwords($data["username"]) ?>">
                    <span style="color:red"></span>
                </div>
                <div class="champs">
                    <label>Email : </label>
                    <input type="text" id="email" name="email" value="<?= $data["email"] ?>">
                    <span style="color:red"></span>
                </div>
                <div class="champs">
                    <label>Mot de passe : </label>
                    <input type="text" id="password" name="password" value="<?= $data["password"] ?>">
                    <span style="color:red"></span>
                 </div>
            </div>
            <small id="resultat" style="color:red"><?= $message_erreur ?></small>
            </br></br>
            <div class="boutons">
                <button name="submit" class="btn btn-dark rounded boutons" id="seConnecter" value="Valider">Valider</button>
                <button type="reset" class="btn btn-dark rounded boutons" id="annuler" value="Annuler"><a href="index.php">Annuler</a></button>
            </div>
    </form>
</body>

</html>
<?php
$content = ob_get_clean();
ob_start();

$pied_page = '';
include "view/baselayout.php";
?>
