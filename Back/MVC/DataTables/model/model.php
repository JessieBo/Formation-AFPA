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


// Création de la liste des clients
function get_all_clients()
{
    $connexion = connect_db();
    $clients = array();
    $sql = "SELECT * FROM personne ORDER BY nom";
    $reponse = $connexion->prepare($sql);
    $reponse->execute();
    foreach ($connexion->query($sql) as $row) {
        $clients[] = $row;
    }
    return $clients;
}

function client_by_id($code) {
    $connexion = connect_db();

    $sql =  $connexion->prepare("SELECT * FROM personne WHERE id = :code ");
    $sql->bindValue(":code", intval($_GET["code"]), PDO::PARAM_INT);
    $sql->execute();

    return $sql->fetch();
}

function suppression_client($code) {
    $connexion = connect_db();
    $sql = $connexion->prepare ("DELETE FROM personne WHERE id=:code");
    $sql->bindValue(":code", intval($_GET["code"]), PDO::PARAM_INT);
    $sql->execute();
}

function insert_client()
{
    $connexion = connect_db();
    $sql = $connexion->prepare("INSERT INTO personne (nom, prenom, telephone, email) VALUES (:nom, :prenom, :telephone, :email)");

    $sql->bindValue(":nom", strval($_POST["nom"]),PDO::PARAM_STR);
    $sql->bindValue(":prenom", strval($_POST["prenom"]), PDO::PARAM_STR);
    $sql->bindValue(":telephone", strval($_POST["telephone"]), PDO::PARAM_STR);
    $sql->bindValue(":email", strval($_POST["email"]), PDO::PARAM_STR);

    $sql->execute();
}

function update_client($code)
{
    $connexion = connect_db();
    $sql = $connexion->prepare("UPDATE personne SET id=:code, nom=:nom, prenom=:prenom, telephone=:telephone, email=:email WHERE id = :code");

    $sql->bindValue(":code", intval($code), PDO::PARAM_INT);
    $sql->bindValue(":nom", strval($_POST["nom"]),PDO::PARAM_STR);
    $sql->bindValue(":prenom", strval($_POST["prenom"]), PDO::PARAM_STR);
    $sql->bindValue(":telephone", strval($_POST["telephone"]), PDO::PARAM_STR);
    $sql->bindValue(":email", strval($_POST["email"]), PDO::PARAM_STR);

    $sql->execute();
}

