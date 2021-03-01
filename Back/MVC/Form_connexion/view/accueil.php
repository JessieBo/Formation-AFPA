<?php
$title = "Connexion MVC";
ob_start();
?>
<?php session_start(); ?>

<body>

    <header>
        <h1>Connexion MVC</h1><br>
    </header>

    <form action="index.php?action=accueil" method="post" id="formulaire">
            <h2>Bonjour <?= $_SESSION["username"]; ?> </h2><br>
            <p>Vous êtes bien connecté</p>
            <p>Votre adresse mail est : <?= $_SESSION["email"]; ?> </p>
            <p>Votre êtes : <?= $_SESSION["fonction"]; ?> </p>
            <a href="index.php" id="retour">Retour à l'accueil</a>
    </form>
</body>

</html>
<?php
$content = ob_get_clean();
ob_start();

$pied_page = '';
include "view/baselayout.php";
?>