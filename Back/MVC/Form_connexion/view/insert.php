<?php
$title = "Connexion MVC";
ob_start();
?>
<body>
<header>
        <h1>Ajouter un utilisateur</h1><br>
</header>

    <form action="index.php?action=insert_user" method="post" id="formulaire">

            <div class="infos">
                <div class="champs">
                    <label>Utilisateur <span>*</span>: </label>
                    <input type="text" class="champ" id="username" name="username" value="<?= ucwords($data["username"]) ?>">
                    <span class="erreur_php"><?php if(isset($erreurs["username"])) { echo $erreurs["username"];}?></span>
                </div>
                <div class="champs">
                    <label>Email <span>*</span>: </label>
                    <input type="email" class="champ" id="email" name="email" value="<?= $data["email"] ?>">
                    <span class="erreur_php"><?php if(isset($erreurs["email"])) { echo $erreurs["email"];}?></span>
                </div>
                <div class="champs">
                    <label>Mot de passe<span>*</span> : </label>
                    <input type="text" class="champ" id="password" name="password" value="<?= $data["password"] ?>">
                    <span class="erreur_php" id="mdp"><?php if(isset($erreurs["password"])) { echo $erreurs["password"];}?></span>
                </div>
                 <div class="champs">
                    <label>Fonction <span>*</span>: </label>
                    <input type="text" class="champ" id="fonction" name="fonction" value="<?= $data["fonction"] ?>">
                    <span class="erreur_php"><?php if(isset($erreurs["fonction"])) { echo $erreurs["fonction"];}?></span>
                </div>
                <div class="erreur" name="erreur"><span>* </span>Champ obligatoire</div>
            </div>
            <div class="boutons">
                <input type="submit" name="submit" class="btn btn-dark rounded boutons" id="Enregistrer" value="Enregistrer"></input>
                <button type="reset" class="btn btn-dark rounded boutons" id="annuler" value="Annuler"><a href="index.php?action=creation_compte">Annuler</a></button>
            </div>
            <a href="index.php" id="retour">Retour à l'accueil</a>
    </form>

</body>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>