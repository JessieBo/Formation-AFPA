<?php
require("connect.php");

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD, $option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

function connect() {

    $connexion = connect_db();

    $sql = $connexion->prepare("SELECT * FROM users WHERE loginUser = :loginUser and passUser = :passUser");
    $sql->bindValue(":loginUser", strval($_POST['username']), PDO::PARAM_STR);
    $sql->bindValue(":passUser", strval($_POST['password']), PDO::PARAM_STR);
    $sql->execute();
    $count = $sql->rowCount();


    return  $count;
}

// Création de la liste des clients
function get_all_clients()
{
    $connexion = connect_db();
    $clients = array();
    $sql = "SELECT idClient, raisonSociale, codePostalClient, villeClient, CA, telephoneClient, typeClient, natureClient FROM clients ORDER BY raisonSociale";
    $reponse = $connexion->prepare($sql);
    $reponse->execute();
    foreach ($connexion->query($sql) as $row) {
        $clients[] = $row;
    }
    return $clients;
}

function client_by_id($code) {
    $connexion = connect_db();

    $sql =  $connexion->prepare("SELECT * FROM clients WHERE idClient = :code ");
    $sql->bindValue(":code", intval($_GET["code"]), PDO::PARAM_INT);
    $sql->execute();

    return $sql->fetch();
}

function rechercher_client($recherche) {
    $connexion = connect_db();

    if ((!isset($recherche)) || empty($recherche)) {
        // Récupération des personnes dans la Table membres classées par ordre alphabétique
        $sql = "SELECT idClient, raisonSociale, codePostalClient, villeClient, CA, telephoneClient, typeClient, natureClient FROM client ORDER BY raisonSociale";
        $reponse = $connexion->prepare($sql);
        $reponse->execute(array());
    } else {
        $recherche = htmlspecialchars($recherche);
        $sql = 'SELECT idClient, raisonSociale, codePostalClient, villeClient, CA, telephoneClient, typeClient, natureClient FROM clients WHERE raisonSociale LIKE "'.$recherche.'%" ORDER BY idSect DESC';
        $reponse = $connexion->prepare($sql);
        $reponse->execute(array());
    }
    foreach ($connexion->query($sql) as $row) {
        $clients[] = $row;
    }
    return $clients;
}

function suppression_client($code) {
    $connexion = connect_db();
    $sql = $connexion->prepare ("DELETE FROM clients WHERE idClient=:code");
    $sql->bindValue(":code", intval($_GET["code"]), PDO::PARAM_INT);
    $sql->execute();
}

function insert_client()
{
    $connexion = connect_db();
    $sql = $connexion->prepare("INSERT INTO clients (idSect, raisonSociale, adresseClient, codePostalClient, villeClient, CA, effectif, telephoneClient, typeClient, natureClient, commentaireClient) VALUES (:activite, :nom, :adresse, :cp, :ville, :ca, :effectif, :tel, :type, :nature, :commentaire)");

    $sql->bindValue(":nom", strval($_POST["raison_sociale"]),PDO::PARAM_STR);
    $sql->bindValue(":type", strval($_POST["type_client"]), PDO::PARAM_STR);
    $sql->bindValue(":tel", strval($_POST["tel_client"]), PDO::PARAM_STR);
    $sql->bindValue(":adresse", strval($_POST["adresse_client"]), PDO::PARAM_STR);
    $sql->bindValue(":ville", strval($_POST["ville_client"]), PDO::PARAM_STR);
    $sql->bindValue(":cp", strval($_POST["cp_client"]),PDO::PARAM_STR);
    $sql->bindValue(":activite", strval($_POST["activite_client"]), PDO::PARAM_STR);
    $sql->bindValue(":nature", strval($_POST["nature_client"]), PDO::PARAM_STR);
    $sql->bindValue(":ca", intval($_POST["CA_client"]), PDO::PARAM_INT);
    $sql->bindValue(":effectif", intval($_POST["effectif_client"]), PDO::PARAM_STR);
    $sql->bindValue(":commentaire", strval($_POST["comm_client"]), PDO::PARAM_STR);

    $sql->execute();
}

function update_client($code)
{
    $connexion = connect_db();
    $sql = $connexion->prepare("UPDATE clients SET idSect=:activite, raisonSociale=:nom, adresseClient=:adresse, codePostalClient=:cp, villeClient=:ville, CA=:ca, effectif=:effectif, telephoneClient=:tel, typeClient=:type, natureClient=:nature, commentaireClient=:commentaire WHERE idClient = :code");

    $sql->bindValue(":code", intval($code), PDO::PARAM_INT);
    $sql->bindValue(":nom", strval($_POST["raison_sociale"]),PDO::PARAM_STR);
    $sql->bindValue(":type", strval($_POST["type_client"]), PDO::PARAM_STR);
    $sql->bindValue(":tel", strval($_POST["tel_client"]), PDO::PARAM_STR);
    $sql->bindValue(":adresse", strval($_POST["adresse_client"]), PDO::PARAM_STR);
    $sql->bindValue(":ville", strval($_POST["ville_client"]), PDO::PARAM_STR);
    $sql->bindValue(":cp", strval($_POST["cp_client"]),PDO::PARAM_STR);
    $sql->bindValue(":activite", strval($_POST["activite_client"]), PDO::PARAM_STR);
    $sql->bindValue(":nature", strval($_POST["nature_client"]), PDO::PARAM_STR);
    $sql->bindValue(":ca", intval($_POST["CA_client"]), PDO::PARAM_INT);
    $sql->bindValue(":effectif", intval($_POST["effectif_client"]), PDO::PARAM_INT);
    $sql->bindValue(":commentaire", strval($_POST["comm_client"]), PDO::PARAM_STR);

    $sql->execute();
}

function Validation() {

        $erreurs=array();

        if (filter_var($_POST["tel_client"] == "" || !(isset($_POST["tel_client"])) || !(preg_match("/^(0{1}[0-9]{1}([0-9]{2}){4})$/", $_POST["tel_client"])))) {
            $erreurs["tel_client"] = "Numéro de téléphone invalide";
        }

        if (filter_var($_POST["adresse_client"] == "" || !(isset($_POST["adresse_client"])) || !(preg_match("/(\d+)?\,?\s?(bis|ter|quater)?\,?\s?(rue|avenue|boulevard|r|av|ave|bd|bvd|square|sente|impasse|cours|bourg|allée|résidence|parc|rond-point|chemin|côte|place|cité|quai|passage|lôtissement|hameau)?\s([a-zA-Zà-ÿ0-9\s]{2,})+$/", $_POST["adresse_client"])))) {
            $erreurs["adresse_client"] = "Veuillez saisir une adresse valide";
        }

        if (filter_var($_POST["ville_client"] == "" || !(isset($_POST["ville_client"])) || !(preg_match("/^[[:alpha:]]([-' ]?[[:alpha:]])*$/", $_POST["ville_client"])))) {
            $erreurs["ville_client"] = "Veuillez saisir un nom de ville";
        }

        if (filter_var($_POST["cp_client"] == "" || !(isset($_POST["cp_client"])) || !(preg_match("/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/", $_POST["cp_client"])))) {
            $erreurs["cp_client"] = "Veuillez saisir un code postal valide";
        }

        function getValidateFilter($type)
        {
            switch($type){
            case "int":
            $filter=FILTER_VALIDATE_INT;
            break;
            default://important!!!
            $filter=false;//Si type est faux,la validation échoue.
            }
            return $filter;
        }

        if((filter_var($_POST["CA_client"], getValidateFilter("int"))===false)) {
            $erreurs["CA_client"]="Veuillez saisir un nombre";
        }

        if((filter_var($_POST["effectif_client"], FILTER_VALIDATE_INT)===false)) {
            $erreurs["effectif_client"]="Veuillez saisir un nombre";
        }

        return $erreurs;

}