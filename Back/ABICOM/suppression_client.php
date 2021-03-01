<?php
$connexion = new PDO('mysql:host=localhost:3308;dbname=abicom', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$idClient = $_GET['idClient'];

// On recupere l'enregistrement du Client dans la table Clients
$req = "DELETE FROM clients  WHERE idClient=:idClient";

$reponse = $connexion->prepare($req);
$reponse->bindParam(":idClient", $idClient, PDO::PARAM_INT);
$reponse->execute();


header('Location:index.php');
exit();
 
?>
