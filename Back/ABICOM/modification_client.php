<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABICOM - Modification d'un Client</title>
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

    // On récupère l'id du client passé en Get avec un href sur la raison sociale dans une variable $idClient
    if(isset($_GET['idClient'])){
        
        $idClient = $_GET['idClient'];

        // On recupere l'enregistrement du Client dans la table Clients
        $req = "SELECT * FROM clients WHERE idClient= :idClient";

        $reponse = $connexion->prepare($req);
        $reponse->bindValue(":idClient", $idClient, PDO::PARAM_INT);
        $reponse->execute();
        $donnees = $reponse->fetch();

    }else{

        if(isset($_POST['idClient'])){
            $idClient = $_POST['idClient'];

            // On recupere l'enregistrement du Client dans la table Clients
            $req = "SELECT * FROM clients WHERE idClient= :idClient";

            $reponse = $connexion->prepare($req);
            $reponse->bindValue(":idClient", $idClient, PDO::PARAM_INT);
            $reponse->execute();
            $donnees = $reponse->fetch();
        }
    }
    

if(!empty($_POST["btnSubmit"])){

    // On récupère l'id du client passé en POST après soumission du formulaire
    if(isset($_POST['idClient'])){
        $idClient = $_POST['idClient'];
  
    }else{
        if(isset($_GET['idClient'])){
            $idClient = $_GET['idClient'];
        }
        
    }

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
    $adresseClient =ucfirst(test_input($_POST['adrclient']));
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
    if(!preg_match('#[0-9]+[ ](rue|route|ruelle|avenue|av|allée|passage|boulevard|bd|cours|impasse|chemin|faubourg|promenade) [a-z]+ [a-z]#i', $adresseClient) ){
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

    if(empty($erreurs)){

        $req = "UPDATE clients SET idSect = :idSect, 
        raisonSociale= :raisonSociale, 
        adresseClient=:adresseClient, 
        codePostalClient=:codePostalClient, 
        villeClient=:villeClient, 
        CA=:CA, 
        effectif=:effectif, 
        telephoneClient=:telephoneClient, 
        typeClient=:typeClient, 
        natureClient=:natureClient, 
        commentaireClient=:commentaireClient 
        WHERE idClient=:idClient";
    
        $reponse = $connexion->prepare($req);
	
        $reponse->bindParam(":idSect", $idSect, PDO::PARAM_INT);
        $reponse->bindParam(":raisonSociale", $raisonSociale, PDO::PARAM_STR);
        $reponse->bindParam(":adresseClient", $adresseClient, PDO::PARAM_STR);
        $reponse->bindParam(":codePostalClient", $codePostalClient, PDO::PARAM_STR);
        $reponse->bindParam(":villeClient", $villeClient, PDO::PARAM_STR);
        $reponse->bindParam(":CA", $CA, PDO::PARAM_INT);
        $reponse->bindParam(":effectif", $effectif, PDO::PARAM_INT);
        $reponse->bindParam(":telephoneClient", $telephoneClient, PDO::PARAM_STR);
        $reponse->bindParam(":typeClient", $typeClient, PDO::PARAM_STR);
        $reponse->bindParam(":natureClient", $natureClient, PDO::PARAM_STR);
        $reponse->bindParam(":commentaireClient", $commentaireClient, PDO::PARAM_STR);
        $reponse->bindParam(":idClient", $idClient, PDO::PARAM_INT);
        $reponse->execute();

	    header('Location: index.php');
    
    }else{ 

        $titre = "Modification du Client";
        require "vue_form_ajout.php";    
    }

}else{ 
    require "vue_form_modif.php"; 
} ?>

</body>
</html>