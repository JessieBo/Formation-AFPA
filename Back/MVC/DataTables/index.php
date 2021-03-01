<?php
require_once 'controller/controller.php';

try {
    if (!isset($_GET["action"])) {
        liste_clients();
        } else if ($_GET["action"] == "suppr") { // Suppression d'un client
            supprimer_client($_GET["code"]);
        } else if ($_GET["action"] == "ajout") { // Affichage du formulaire ajout
            ajouter_client();
        } else if ($_GET["action"] == "modif") { // Affichage du formulaire modif
            modifier_client($_GET["code"]);
        } else if ($_GET["action"] == "ajout_cli") { // Ajout client
            $erreurs = Validation();
            if(empty($erreurs)) {
                insert_client();
                header("Location:index.php");
            } else {
                $code = 0;
                $action = "index.php?action=ajout_cli";
                $titre_onglet = "Ajout client";
                $titre_page = "Ajouter un client";
                validation_form($code, $erreurs, $action, $titre_onglet, $titre_page);
            }
        } else if ($_GET["action"] == "modif_cli") { // Modification client
            $erreurs = Validation();
            if(empty($erreurs)) {
                update_client($_GET["code"]);
                header("Location:index.php");
            } else {
                $code = $_GET["code"];
                $action = "index.php?action=modif_cli&code=" . $_GET["code"];
                $titre_onglet = "Modif client";
                $titre_page = "Modifier un client";
                validation_form($code, $erreurs, $action, $titre_onglet, $titre_page);
            }

    } else {
        throw new Exception("<h1>Page non trouvée !!!</h1>");
    }
} catch (Exception $e) {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Non trouvée !!!</h1></body></html>';
}
