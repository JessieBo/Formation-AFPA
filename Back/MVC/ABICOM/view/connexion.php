<?php
$title = "Abicom";
ob_start();
?>

<body>
    <header>
        <a href="index.php"><img src="img/logo.png" alt="logo"></a>
        <h1>Bienvenue sur ABI.COM</h1>
    </header>

    <form action="index.php?action=verification" method="post" id="formulaire">
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
                <small id="resultat"><?= $message_erreur ?></small>
            </div>
            <div class="boutons">
                <button name="submit" class="btn btn-dark rounded boutons" id="seConnecter" value="Valider">Valider</button>
                <input type="reset" class="btn btn-dark rounded boutons" id="annuler" value="Annuler">
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
