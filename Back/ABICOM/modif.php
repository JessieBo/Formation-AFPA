<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF−8" />
    <title>Abicom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php

require("connect.php");

$sql = "select * from clients where idClient = :code ";
$reponse = $connexion->prepare($sql);
$reponse->execute(array(":code" => $_GET["code"]));
$data = $reponse->fetch();
// var_dump($data);


if(isset($_POST["submit"])){

    $erreurs=array();

    $tel = $_POST["tel_client"];

    function numeroTelephone($tel){

        if(preg_match("/^(0{1}[0-9]{1}([0-9]{2}){4})$/",$tel))
        {
            return $tel;
        }else{
            return false;
        }
    }

    if(filter_var($tel, FILTER_CALLBACK, array("options"=>"numeroTelephone"))===false){
        $erreurs["tel_client"]="Numéro de téléphone invalide.<br/>";
    }

   $adresse = $_POST["adresse_client"];

    function adresseValide($adresse){

        if(preg_match("/(\d+)?\,?\s?(bis|ter|quater)?\,?\s?(rue|avenue|boulevard|r|av|ave|bd|bvd|square|sente|impasse|cours|bourg|allée|résidence|parc|rond-point|chemin|côte|place|cité|quai|passage|lôtissement|hameau)?\s([a-zA-Zà-ÿ0-9\s]{2,})+$/",$adresse))
        {
            return $adresse;
        }else{
            return false;
        }
    }

    if(filter_var($adresse, FILTER_CALLBACK, array("options"=>"adresseValide"))===false){
        $erreurs["adresse_client"]="Veuillez saisir une adresse valide.<br/>";
    }

    $ville = $_POST["ville_client"];

    function villeValide($ville){

        if(preg_match("/^[[:alpha:]]([-' ]?[[:alpha:]])*$/",$ville))
        {
            return $ville;
        }else{
            return false;
        }
    }

    if(filter_var($ville, FILTER_CALLBACK, array("options"=>"villeValide"))===false){
        $erreurs["ville_client"]="Veuillez saisir un nom de ville.<br/>";
    }

    $cp = $_POST["cp_client"];

    function cpValide($cp){

        if(preg_match("/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/",$cp))
        {
            return $cp;
        }else{
            return false;
        }
    }

    if(filter_var($cp, FILTER_CALLBACK, array("options"=>"cpValide"))===false){
        $erreurs["cp_client"]="Veuillez saisir un code postal valide.<br/>";
    }

    $ca         = $_POST["CA_client"];
    $effectif   = $_POST["effectif_client"];

    function getValidateFilter($type)
    {
        switch($type){
        case "email":
        $filter=FILTER_VALIDATE_EMAIL;
        break;
        case "int":
        $filter=FILTER_VALIDATE_INT;
        break;
        case "boolean":
        $filter=FILTER_VALIDATE_BOOLEAN;
        break;
        case "ip":
        $filter=FILTER_VALIDATE_IP;
        break;
        case "url":
        $filter=FILTER_VALIDATE_URL;
        break;
        default://important!!!
        $filter=false;//Si type est faux,la validation échoue.
        }
        return $filter;
    }

    if((filter_var($ca, getValidateFilter("int"))===false)) {
        $erreurs["CA_client"]="Veuillez saisir un nombre";
    }

    if((filter_var($effectif, FILTER_VALIDATE_INT)===false)) {
        $erreurs["effectif_client"]="Veuillez saisir un nombre";
    }

    // var_dump($erreurs);
    if(empty($erreurs)) {
        $sql = "update clients set idSect=:activite, raisonSociale=:nom, adresseClient=:adresse, codePostalClient=:cp, villeClient=:ville, CA=:ca, effectif=:effectif, telephoneClient=:tel, typeClient=:type, natureClient=:nature, commentaireClient=:commentaire where idClient = :code";
        $reponse = $connexion->prepare($sql);

        $activite       = $_POST["activite_client"];
        $nom            = $_POST["raison_sociale"];
        $type           = $_POST["type_client"];
        $nature         = $_POST["nature_client"];
        $commentaire    = $_POST["comm_client"];
        $code           = $_POST["code"];

        $reponse->bindValue(":activite", $activite, PDO::PARAM_STR);
        $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":adresse", $adresse, PDO::PARAM_STR);
        $reponse->bindValue(":ville", $ville, PDO::PARAM_STR);
        $reponse->bindValue(":cp", $cp, PDO::PARAM_STR);
        $reponse->bindValue(":ca", $ca, PDO::PARAM_STR);
        $reponse->bindValue(":effectif", $ca, PDO::PARAM_STR);
        $reponse->bindValue(":tel", $tel, PDO::PARAM_STR);
        $reponse->bindValue(":type", $type, PDO::PARAM_STR);
        $reponse->bindValue(":nature", $nature, PDO::PARAM_STR);
        $reponse->bindValue(":commentaire", $commentaire, PDO::PARAM_STR);
        $reponse->bindValue(":code", $code, PDO::PARAM_STR);
        $reponse->execute();
        header("location:tableau.php");
    }

?>

    <header>
        <button type="button" class="btn btn-dark btn-primary rounded" id="retour"><a href="tableau.php">Retour</a></button>
        <img src="img/logo.png" alt="logo">
        <h1>Modification du Client</h1>
    </header>

    <main>

    <br>

    <form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]. "?code=" . $_GET["code"] ?>">
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
                    <td><input type="tel" id="tel_client" name="tel_client" value="<?php if(!empty($_POST["tel_client"])){ echo $_POST["tel_client"]; } ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["tel_client"])) { echo $erreurs["tel_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Adresse Client</td>
                    <td><input type="text" id="adresse_client" name="adresse_client" value="<?php if(!empty($_POST["adresse_client"])){ echo $_POST["adresse_client"]; } ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["adresse_client"])) { echo $erreurs["adresse_client"];}?></span>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Ville</td>
                    <td><input type="text" id="ville_client" name="ville_client" value="<?php if(!empty($_POST["ville_client"])){ echo $_POST["ville_client"]; } ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["ville_client"])) { echo $erreurs["ville_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Code Postal</td>
                    <td><input type="text" id="cp_client" name="cp_client" value="<?php if(!empty($_POST["cp_client"])){ echo $_POST["cp_client"]; } ?>"></td>
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
                    <td><input type="text" id="CA_client" name="CA_client" value="<?php if(!empty($_POST["CA_client"])){ echo $_POST["CA_client"]; } ?>"></td>
                    <td>
                        <span style="color:yellow"><?php if(isset($erreurs["CA_client"])) { echo $erreurs["CA_client"];}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Effectif</td>
                    <td><input type="text" id="effectif_client" name="effectif_client" value="<?php if(!empty($_POST["effectif_client"])){ echo $_POST["effectif_client"]; } ?>"></td>
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

    <footer>
        <div class="site">
            <img src="img/logo.png" alt="logo"></a>
            <h3>ABI.COM</h3>
        </div>
        <div class="info">
            <h3>Qui sommes-nous ?</h3>
            <ul>
                <li><a href="#">Rejoignez-nous</a></li>
                <li><a href="#">Actualité</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </footer>

<?php
}else{ ?>


    <header>
        <button type="button" class="btn btn-dark btn-primary rounded" id="retour"><a href="tableau.php">Retour</a></button>
        <img src="img/logo.png" alt="logo">
        <h1>Modification du Client</h1>
    </header>

    <main>

    <br>

    <form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]. "?code=" . $_GET["code"] ?>">
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
                    <td></td>
                </tr>
                <tr>
                    <td>Adresse Client</td>
                    <td><input type="text" id="adresse_client" name="adresse_client" value="<?=$data['adresseClient'] ?>"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Ville</td>
                    <td><input type="text" id="ville_client" name="ville_client" value="<?=$data['villeClient'] ?>"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Code Postal</td>
                    <td><input type="text" id="cp_client" name="cp_client" value="<?=$data['codePostalClient'] ?>"></td>
                    <td></td>
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
                    <td></td>
                </tr>
                <tr>
                    <td>Effectif</td>
                    <td><input type="text" id="effectif_client" name="effectif_client" value="<?=$data['effectif'] ?>"></td>
                    <td></td>
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

    <footer>
        <div class="site">
            <img src="img/logo.png" alt="logo"></a>
            <h3>ABI.COM</h3>
        </div>
        <div class="info">
            <h3>Qui sommes-nous ?</h3>
            <ul>
                <li><a href="#">Rejoignez-nous</a></li>
                <li><a href="#">Actualité</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </footer>

<?php } ?>

</body>


</html>