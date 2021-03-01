<?php
require_once 'model/model.php';

function verif_connexion()
{
    $retour = connect();

    if ($retour > 0) {
        header('Location:index.php?action=accueil');
    } else {
        $data = [
            "username" => $_POST["username"],
            "email" =>  $_POST["email"],
            "password" => $_POST["password"],
            ];
        $message_erreur = "Login introuvable ou mot de passe erroné !";
        require "view/connexion.php";
    }
}
function page_connexion() {
    $data = [
        "username" => "",
        "email" =>  "",
        "password" => "",
        ];
    $message_erreur = "";
    require "view/connexion.php";
}

function page_accueil() {
    require "view/accueil.php";
}


function page_ajout_vide() {
    $data = [
        "username" => "",
        "email" =>  "",
        "password" => "",
        "fonction" =>  "",
        ];
    require "view/insert.php";
}

function validation_form($erreurs) {
    $data = [
    "username" => $_POST["username"],
    "email" =>  $_POST["email"],
    "password" => $_POST["password"],
    "fonction" =>  $_POST["fonction"],
    ];
    require "view/insert.php";
}

function Validation() {

    $erreurs=array();

    if (filter_var(!(isset($_POST["username"])) || !(preg_match("/^([a-z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿA-Z_]){3,30}$/", $_POST["username"])))) {
        $erreurs["username"] = "Invalide : entre 3 et 30 caractères";
    }

    if (filter_var(!(isset($_POST["email"])) || !(preg_match("/\S+@\S+.\S{2,}/", $_POST["email"])))) {
        $erreurs["email"] = "Adresse mail invalide";
    } else {
        $texte = controle_doublon();
        if(isset($texte) AND $texte!="") {
             $erreurs['email'] = $texte;
        }
    }

    if (filter_var(!(isset($_POST["password"])) || !(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $_POST["password"])))) {
        $erreurs["password"] = "<em>". "Mot de passe invalide :" . "</em>" . "</br>" . "Doit contenir 1 lettre majuscule, 1 caractère spécial"  . "</br>" . "et avoir entre 3 et 30 caractères";
    }

    if (filter_var(!(isset($_POST["fonction"])) || !(preg_match("/^([a-z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿA-Z_]){3,30}$/", $_POST["fonction"])))) {
        $erreurs["fonction"] = "Invalide : entre 3 et 30 caractères";
    }

    return $erreurs;
}

function validation_insert()
{
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["fonction"]) && $_POST["username"] != ""  && $_POST["email"] != ""  && $_POST["password"] != ""  && $_POST["fonction"] != "" ) { // si le champ est rempli et qu'il est non vide
        insert_user();
    }
}

