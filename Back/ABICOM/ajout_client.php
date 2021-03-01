<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABICOM - Ajout d'un Nouveau Client</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script>
        window.addEventListener("load", function(){
            let btnRetour = document.getElementById("btnRetour");

            btnRetour.addEventListener("click", function(){
                document.location.assign('index.php');
            });
        });
    </script> 
</head>
<body>
<?php
// **************************************************************************************************************
// Ici il faut créer la connexion à la Base de Données en utilisant l'extension PDO de PHP, en fait on doit créer une instance de l'objet PDO qui est une variable $connexion, s'il y a des erreurs à la connexion un message formaté est renvoyé.
try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connexion = new PDO('mysql:host=localhost:3308;dbname=abicom', 'root', '', $pdo_options);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

if(!empty($_POST["btnSubmit"])){

    // Fonction qui supprime les espaces en début et fin de chaîne, les antislashes, convertit les
    // caractères spéciaux en entités HTML 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function ctrlNumTelephone($tel){

        if(preg_match("#^(0{1}[0-9]{1}([0-9]{2}){4})$#", $tel)){
            return $tel; 
        }else{
            return false;
        }
    }
    
    // On déclare un tableau qui sera associatif et qui à chaque clef constituée sur le nom de l'input
    // concerné associera le message d'erreur en rapport
    $erreurs = array();
    

    $idSect =intval(test_input($_POST['activite']));
	$raisonSociale =ucfirst(test_input($_POST['rais']));
	$adresseclient =ucfirst(test_input($_POST['adrclient']));
	$codePostalClient =test_input($_POST['codep']);
	$villeClient =ucfirst(test_input($_POST['ville']));
	$CA =intval(test_input($_POST['ca']));
	$effectif =intval(test_input($_POST['effec']));
	$telephoneClient =test_input($_POST['tel']);
	$typeClient =test_input($_POST['typC']);
	$natureClient =test_input($_POST['nature']);
	$commentaireClient =ucfirst(test_input($_POST['comment']));

    if(empty($raisonSociale)){
        $erreurs["rais"] = "Vous devez saisir un Nom de Société.";
    }

    // Filtre personnalisé reposant sur la fonction ctrlNumTelephone($tel) vue ci-dessus
    if (filter_var($telephoneClient, FILTER_CALLBACK, array("options"=>"ctrlNumTelephone"))==false)
    {
         $erreurs["tel"] = "Numéro de Téléphone invalide.";
    }

    // Filtre pour vérifier une adresse postale
    if(!preg_match('#[0-9]+[ ](rue|route|ruelle|avenue|av|allée|passage|boulevard|bd|cours|impasse|chemin|faubourg|promenade) [a-z]+ [a-z]#i', $adresseclient) ){
        $erreurs["adrclient"] = 'Veuillez saisir une adresse Postale valide.';
    }

    // Filtre qui n'accepte qu'un ensemble de chaînes de caractères éventuellement séparées par des - ou des espaces
    // ou les deux
    $pattern_ville = '#^[A-Za-z- ]+$#';
    if(!preg_match($pattern_ville, $villeClient)){

		$erreurs["ville"] = "Veuillez saisir un nom de Ville."; 
    }

    // Utilisation d'une expression régulière pour valider le code postal
    $pattern_code_postal = '#^[0-9]{5}$#';
	if(!preg_match($pattern_code_postal, $codePostalClient)){

		$erreurs["codep"] = "Veuillez saisir un Code Postal sur 5 chiffres."; 
    }

    // Filtre qui n'accepte que les nombres entiers
    if (!filter_var($CA, FILTER_VALIDATE_INT))
    {
         $erreurs["ca"] = "Le CA doit être numérique.";
    }

    // Filtre qui n'accepte que les nombres entiers
    if (!filter_var($effectif, FILTER_VALIDATE_INT))
    {
         $erreurs["effec"] = "L'Effectif doit être numérique.";
    }
    
    
    // Mise en place d'un requête préparée avant injection des données dans la table Clients
    $req = $connexion->prepare('INSERT INTO clients(idSect, raisonSociale, adresseClient, codePostalClient, villeClient, CA, effectif, telephoneClient, typeClient, natureClient, commentaireClient) VALUES(:idSect, :raisonSociale, :adresseClient, :codePostalClient, :villeClient, :CA, :effectif, :telephoneClient, :typeClient, :natureClient, :commentaireClient)');

    if(empty($erreurs)){
        $req->execute(array(
            'idSect' => $idSect,
            'raisonSociale' => $raisonSociale,
            'adresseClient' => $adresseclient,
            'codePostalClient' => $codePostalClient,
            'villeClient' => $villeClient,
            'CA' => $CA,
            'effectif' => $effectif,
            'telephoneClient' => $telephoneClient,
            'typeClient' => $typeClient,
            'natureClient' => $natureClient,
            'commentaireClient' => $commentaireClient));
    
        header('Location: index.php');
    }else{ 

        $titre = "Ajout d'un Nouveau Client";
        require "vue_form_ajout.php";    
    }

}else{ 
    $titre = "Ajout d'un Nouveau Client";
    require "vue_form_ajout.php"; 
} ?>

</body>
</html>