<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF−8" />
    <title>Abicom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php

require("connect.php");

if ((!isset($_GET['search'])) || empty($_GET['search'])) {
    // Récupération des personnes dans la Table membres classées par ordre alphabétique
    $sql = "select idClient, raisonSociale, codePostalClient, villeClient, CA, telephoneClient, typeClient, natureClient from clients order by raisonSociale";
    $reponse = $connexion->prepare($sql);
    $reponse->execute(array());
} else {
    $search = htmlspecialchars($_GET['search']);
    $reponse = $connexion->query('SELECT idClient, raisonSociale, codePostalClient, villeClient, CA, telephoneClient, typeClient, natureClient FROM clients WHERE raisonSociale LIKE "'.$search.'%" ORDER BY idSect DESC');
    $reponse->execute(array());
};

?>

<body>
    <header>
        <a href="tableau.php"><img src="img/logo.png" alt="logo"></a>
        <h1>Liste des clients</h1>
    </header>

    <main>

    <form method="GET">
        <label for="raison_sociale">Raison Sociale : </label>
        <input type="text" class="search rounded" name="search" id="search" size="20" autocomplete="off" placeholder="Veuillez saisir le nom du Client" rounded />
        <button type="submit" class="btn btn-dark btn-secondary rounded">Rechercher</button>
    </form>


        <br><br>
        <a href=ajout.php? id="ref_ajout">Ajouter  un Nouveau Client</a>
            <table id="index_tableau" class="table table-bordered table-striped table-dark border-primary">
                <thead>
                    <tr>
                        <th>ID Client</th>
                        <th>Raison sociale</th>
                        <th>Code Postal Client</th>
                        <th>Ville Client</th>
                        <th>CA (€)</th>
                        <th>Téléphone Client</th>
                        <th>Type Client</th>
                        <th>Nature Client</th>
                        <th>Supprimer un client</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($donnees = $reponse->fetch()) {
                        echo '<tr><td>' . $donnees["idClient"] .
                        '</td><td><a href=modif.php?code=' . $donnees["idClient"] .'>' . $donnees["raisonSociale"] . '</a></td>' .
                        '</td><td>'. $donnees["codePostalClient"] .
                        '</td><td>'. $donnees["villeClient"] .
                        '</td><td>'. $donnees["CA"] .
                        '</td><td>'. $donnees["telephoneClient"] .
                        '</td><td>'. $donnees["typeClient"] .
                        '</td><td>'. $donnees["natureClient"] .
                        '<td><a href=traitement/traitement_supp.php?code=' . $donnees["idClient"] . '>Suppression de ce Client</a></td></tr>';
                    };
                ?>
                </tbody>
            </table>
    </main>

    <footer>
        <div class="site">
            <img src="img/logo.png" alt="logo"></a>
            <h3>ABI.COM</h3>
        </div>
        <div class="info">
            <h3>Qui sommes-nous ?</h3>
            <ul>
                <li><a href="#">Rejoignez-nous</a></li>
                <li><a href="#">Actualité</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>