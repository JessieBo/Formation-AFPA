<?php
require_once 'model/model.php';


function liste_clients()
{
    $clients = get_all_clients();
    require "view/tableau_clients.php";
}

function supprimer_client($code)
{
    suppression_client($code);
    $clients = get_all_clients();
    require "view/tableau_clients.php";
}

function ajouter_client() {
    $action = "index.php?action=ajout_cli";
    $titre_onglet = "Ajout client";
    $titre_page = "Ajouter un client";
    $data = [
        "id" => 0,
        "nom" => "",
        "prenom" => "",
        "telephone" => "",
        "email" => "",
    ];
    require "view/form_clients.php";
}

function modifier_client($code) {
    $action = "index.php?action=modif_cli&code=$code";
    $titre_onglet = "Modif client";
    $titre_page = "Modifier un client";
    $data = client_by_id($code);
    require "view/form_clients.php";
}


function validation_form($code, $erreurs, $action, $titre_onglet, $titre_page) {
    $data = [
        "id" => $code,
        "nom" => $_POST["nom"],
        "prenom" =>  $_POST["prenom"],
        "telephone" => $_POST["telephone"],
        "email" =>  $_POST["email"]
    ];
    require "view/form_clients.php";
}

function Validation() {

    $erreurs=array();

    if (filter_var($_POST["telephone"] == "" || !(isset($_POST["telephone"])) || !(preg_match("/^(0{1}[0-9]{1}([0-9]{2}){4})$/", $_POST["telephone"])))) {
        $erreurs["telephone"] = "Numéro de téléphone invalide";
    }

    if (filter_var(!(isset($_POST["email"])) || !(isset($_POST["email"])) || !(preg_match("/\S+@\S+.\S{2,}/", $_POST["email"])))) {
        $erreurs["email"] = "Adresse mail invalide";
    }

    return $erreurs;

}



