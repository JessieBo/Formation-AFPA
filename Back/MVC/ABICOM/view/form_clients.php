<?php
$title = $titre_onglet;
ob_start();
?>
<body>
<header>
        <button type="button" class="btn btn-dark btn-primary rounded" id="retour"><a href="index.php?action=tableau">Retour</a></button>
        <a href="index.php?action=tableau"><img src="img/logo.png" alt="logo"></a>
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
            <input type="hidden" name="code" id="code" autocomplete="off" value="<?=$data['idClient'] ?>">
            </p>

        <table id="tableau_modif" class="table table-bordered table-striped table-dark border-primary">
            <tbody>
                <tr>
                    <td>Raison sociale</td>
                    <td><input type="text" id="raison_sociale" name="raison_sociale" value="<?=$data['raisonSociale'] ?>"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Type Client</td>
                    <td>
                    <select name="type_client">
                    <?php
                        $sql = "select distinct typeClient from clients order by 1";
                        $reponse = $connexion->prepare($sql);
                        $reponse->execute();

                    while ($data1 = $reponse->fetch()) {

                        if($data1['typeClient'] == $data['typeClient']) {
                             echo '<option class="option" value='. $data1["typeClient"] . ' selected>' . $data1["typeClient"] . '</option>';
                        } else {
                            echo '<option class="option" value='. $data1["typeClient"] . '>' . $data1["typeClient"] . '</option>';
                        }
                    };
                    ?>
                    </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Téléphone Client</td>
                    <td><input type="tel" id="tel_client" name="tel_client" value="<?=$data['telephoneClient'] ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["tel_client"])) { echo $erreurs["tel_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Adresse Client</td>
                    <td><input type="text" id="adresse_client" name="adresse_client" value="<?=$data['adresseClient'] ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["adresse_client"])) { echo $erreurs["adresse_client"];}?></span>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Ville</td>
                    <td><input type="text" id="ville_client" name="ville_client" value="<?=$data['villeClient'] ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["ville_client"])) { echo $erreurs["ville_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Code Postal</td>
                    <td><input type="text" id="cp_client" name="cp_client" value="<?=$data['codePostalClient'] ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["cp_client"])) { echo $erreurs["cp_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Activité</td>
                    <td>
                    <select name="activite_client">
                        <?php
                            $sql = "select idSect, activite from secteuractivite";
                            $reponse = $connexion->prepare($sql);
                            $reponse->execute(array());
                            while ($data3 = $reponse->fetch()) {
                                if($data3['idSect'] == $data['idSect']) {
                                    echo '<option class="option" value='. $data3["idSect"] . ' selected>' . $data3["activite"] . '</option>';
                               } else {
                                   echo '<option class="option" value='. $data3["idSect"] . '>' . $data3["activite"] . '</option>';
                               }
                            };
                        ?>
                    </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nature</td>
                    <td>
                    <select name="nature_client">
                        <?php
                        $sql = "select distinct natureClient from clients order by 1";
                        $reponse = $connexion->prepare($sql);
                        $reponse->execute();

                    while ($data2 = $reponse->fetch()) {

                        if($data2['natureClient'] == $data['natureClient']) {
                             echo '<option class="option" value='. $data2["natureClient"] . ' selected>' . $data2["natureClient"] . '</option>';
                        } else {
                            echo '<option class="option" value='. $data2["natureClient"] . '>' . $data2["natureClient"] . '</option>';
                        }
                    };
                    ?>
                    </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>CA (€)</td>
                    <td><input type="text" id="CA_client" name="CA_client" value="<?=$data['CA'] ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["CA_client"])) { echo $erreurs["CA_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Effectif</td>
                    <td><input type="text" id="effectif_client" name="effectif_client" value="<?=$data['effectif'] ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["effectif_client"])) { echo $erreurs["effectif_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Commentaires Commerciaux</td>
                    <td><textarea id="comm_client" name="comm_client" rows="5" cols="40" value="<?=$data['commentaireClient'] ?>"></textarea></td>
                    <td></td>
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

</body>
<?php require("footer.php") ?>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>