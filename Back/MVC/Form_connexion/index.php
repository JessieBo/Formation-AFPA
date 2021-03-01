<?php
require_once 'controller/controller.php';

try {
    if (!isset($_GET["action"])) {
       page_connexion();
        } else if ($_GET["action"] == "verification") { // Vérifier si le login et mdp sont dans la bdd
                verif_connexion();
            } else if ($_GET["action"] == "accueil") {
                page_accueil();
            } else if ($_GET["action"] == "creation_compte") {
                page_ajout_vide();
                } else if  ($_GET["action"] == "insert_user") {
                    $erreurs = Validation();
                    if(empty($erreurs)) {
                        validation_insert();
                        header("Location:index.php");
                    } else {
                        validation_form($erreurs); // récupère les données déjà saisies
                    }
    } else {
        throw new Exception("<h1>Page non trouvée !!!</h1>");
    }
} catch (Exception $e) {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Non trouvée !!!</h1></body></html>';
}
