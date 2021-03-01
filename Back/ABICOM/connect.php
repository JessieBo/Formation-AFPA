<?php
define("BASE","abicom");
define("SERVER","localhost");
define("USER","root");
define("PASSWD","");

// Ouverture d'une connexion sur la Base magasin du SGBD MySQL
$dsn = "mysql:dbname=" . BASE . "; host=" . SERVER;
try {
    $option = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    $connexion = new PDO($dsn, USER, PASSWD, $option);
} catch (PDOException $e) {
    printf("Echec connexion : %s\n", $e->getMessage());
}
?>