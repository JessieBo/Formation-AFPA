<?php
require_once 'model/model.php';

function verif_connexion()
{
    $retour = connect();

    if ($retour > 0) {
        header('location:index.php?action=tableau');
    } else {
        $message_erreur = "Login introuvable ou mot de passe erroné !";
        require "view/connexion.php";
    }
}

function connexion() {
    $message_erreur = "";
    require "view/connexion.php";
}

function liste_clients()
{
    $clients = get_all_clients();
    require "view/tableau_clients.php";
}

function recherche_client($recherche)
{
    $clients = rechercher_client($recherche);
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
        "idClient" => 0,
        "raisonSociale" => "",
        "typeClient" => "",
        "telephoneClient" => "",
        "adresseClient" => "",
        "villeClient" => "",
        "codePostalClient" => "",
        "idSect" => 0,
        "natureClient" => "",
        "CA" => "",
        "effectif" => "",
        "commentaireClient" => ""
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
        "idClient" => $code,
        "raisonSociale" => $_POST["raison_sociale"],
        "typeClient" =>  $_POST["type_client"],
        "telephoneClient" => $_POST["tel_client"],
        "adresseClient" =>  $_POST["adresse_client"],
        "villeClient" =>  $_POST["ville_client"],
        "codePostalClient" =>  $_POST["cp_client"],
        "idSect" =>  $_POST["activite_client"],
        "natureClient" =>  $_POST["nature_client"],
        "CA" =>  $_POST["CA_client"],
        "effectif" =>  $_POST["effectif_client"],
        "commentaireClient" =>  $_POST["comm_client"]
    ];
    require "view/form_clients.php";
}



