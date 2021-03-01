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
        $sql = "insert into clients (idSect, raisonSociale, adresseClient, codePostalClient, villeClient, CA, effectif, telephoneClient, typeClient, natureClient, commentaireClient) values (:activite, :nom, :adresse, :cp, :ville, :ca, :effectif, :tel, :type, :nature, :commentaire)";

        $reponse = $connexion->prepare($sql);

        $activite       = $_POST["activite_client"];
        $nom            = $_POST["raison_sociale"];
        $type           = $_POST["type_client"];
        $nature         = $_POST["nature_client"];
        $commentaire    = $_POST["comm_client"];

        $reponse->bindValue(":activite", $activite, PDO::PARAM_STR);
        $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":cp", $cp, PDO::PARAM_STR);
        $reponse->bindValue(":adresse", $adresse, PDO::PARAM_STR);
        $reponse->bindValue(":ville", $ville, PDO::PARAM_STR);
        $reponse->bindValue(":ca", $ca, PDO::PARAM_STR);
        $reponse->bindValue(":effectif", $ca, PDO::PARAM_STR);
        $reponse->bindValue(":tel", $tel, PDO::PARAM_STR);
        $reponse->bindValue(":type", $type, PDO::PARAM_STR);
        $reponse->bindValue(":nature", $nature, PDO::PARAM_STR);
        $reponse->bindValue(":commentaire", $commentaire, PDO::PARAM_STR);
        $reponse->execute();
        header("location:tableau.php");
    }

?>
    <header>
    <button type="button" class="btn btn-dark btn-primary rounded" id="retour"><a href="tableau.php">Retour</a></button>
    <img src="img/logo.png" alt="logo">
    <h1>Ajout d'un Nouveau Client</h1>
</header>

<main>

    <br><br>

    <form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"] ?>">
        <table id="tableau_ajout" class="table table-bordered table-striped table-dark border-primary">
            <tbody>
                <tr>
                    <td>Raison sociale</td>
                    <td><input type="text" id="raison_sociale" name="raison_sociale"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Type Client</td>
                    <td>
                    <select name="type_client">
                        <option>Public</option>
                        <option>Privé</option>
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
                            while ($donnees = $reponse->fetch()) {
                                echo '<option class="option" value='. $donnees["idSect"] . '>' . $donnees["activite"] . '</option>';
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
                        <option>Principale</option>
                        <option>Secondaire</option>
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
                    <td><textarea id="comm_client" name="comm_client" rows="5" cols="40"></textarea></td>
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
        <h1>Ajout d'un Nouveau Client</h1>
    </header>

    <main>

        <br><br>

        <form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"] ?>">
            <table id="tableau_ajout" class="table table-bordered table-striped table-dark border-primary">
                <tbody>
                    <tr>
                        <td>Raison sociale</td>
                        <td><input type="text" id="raison_sociale" name="raison_sociale"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Type Client</td>
                        <td>
                        <select name="type_client">
                            <option>Public</option>
                            <option>Privé</option>
                        </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Téléphone Client</td>
                        <td><input type="tel" id="tel_client" name="tel_client"></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>Adresse Client</td>
                        <td><input type="text" id="adresse_client" name="adresse_client"></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>Ville</td>
                        <td><input type="text" id="ville_client" name="ville_client"></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>Code Postal</td>
                        <td><input type="text" id="cp_client" name="cp_client"></td>
                        <td>
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
                                while ($donnees = $reponse->fetch()) {
                                    echo '<option class="option" value='. $donnees["idSect"] . '>' . $donnees["activite"] . '</option>';
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
                            <option>Principale</option>
                            <option>Secondaire</option>
                        </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>CA (€)</td>
                        <td><input type="text" id="CA_client" name="CA_client"></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>Effectif</td>
                        <td><input type="text" id="effectif_client" name="effectif_client"></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>Commentaires Commerciaux</td>
                        <td><textarea id="comm_client" name="comm_client" rows="5" cols="40"></textarea></td>
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