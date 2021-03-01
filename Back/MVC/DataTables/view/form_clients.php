<?php
$title = $titre_onglet;
ob_start();
?>
<body>
<header>

        <h1><?= $titre_page ?></h1>
    </header>

    <main>

<br>

<main>

<br>
<?php
$connexion = connect_db();
?>

<form method="post" action="<?= $action ?>" >
<p>
            <input type="hidden" name="code" id="code" autocomplete="off" value="<?=$data['id'] ?>">
            </p>

        <table id="tableau_formulaire" class="table table-bordered table-striped table-dark border-primary">
            <tbody>
                <tr>
                    <td class="intitule">Nom</td>
                    <td><input type="text" id="nom" name="nom" value="<?=$data['nom'] ?>"></td>
                    <td class="erreur"></td>
                </tr>
                <tr>
                    <td class="intitule">Prénom</td>
                    <td><input type="text" id="prenom" name="prenom" value="<?=$data['prenom'] ?>"></td>
                    <td class="erreur"></td>
                </tr>
                <tr>
                    <td class="intitule">Telephone</td>
                    <td><input type="tel" id="telephone" name="telephone" value="<?=$data['telephone'] ?>"></td>
                    <td class="erreur">
                        <span style="color:yellow"><?php if(isset($erreurs["telephone"])) { echo $erreurs["telephone"];}?></span>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td class="intitule">Email</td>
                    <td><input type="text" id="email" name="email" value="<?=$data['email'] ?>"></td>
                    <td class="erreur">
                        <span style="color:yellow"><?php if(isset($erreurs["email"])) { echo $erreurs["email"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" class="btn btn-primary rounded boutons" id="valider" value="Valider"></td>
                    <td><input type="reset" class="btn btn-primary rounded boutons" id="annuler" value="Annuler"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </form>
</main>
<button type="button" id="retour"><a href="index.php">Retour à l'accueil</a></button>

</body>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>