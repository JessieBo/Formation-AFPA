<?php
require("connect.php");
// Connexion à la BDD
$dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
try {
     $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
     $connexion = new PDO($dsn, USER, PASSWD, $option);
} catch (PDOException $e) {
     printf("Echec connexion : %s\n", $e->getMessage());
     exit();
}

if(isset($_POST["login"])&&(isset($_POST["pwd"]))){

    if(!empty($_POST["login"])&&(!empty($_POST["pwd"]))){
    
        $req = "SELECT * FROM users WHERE loginUser= :loginUser AND passUser= :pwdUser";

        $reponse = $connexion->prepare($req);

        if(isset($_COOKIE["login"])&&isset($_COOKIE["pwd"])){

            $reponse->bindValue(":loginUser", $_COOKIE["login"]);
            $reponse->bindValue(":pwdUser", $_COOKIE["pwd"]);
        
        }else{
            $reponse->bindValue(":loginUser", $_POST["login"]);
            $reponse->bindValue(":pwdUser", $_POST["pwd"]);

        }
        $reponse->execute();
        $donnees = $reponse->rowCount();

        if($donnees===0){
            $reponse = "Mauvais login et mot de passe !!!";
            echo $reponse;

        }else{
             
            $reponse ="OK";
            echo $reponse;
        }
  
    }else{
        $reponse = "Veuillez saisir un login et un mot de passe";
        echo $reponse;

    }
}

?>
