<?php
$title = "Liste des clients";
ob_start();
?>
<body>
    <header>
        <a href="index.php?action=tableau"><img src="img/logo.png" alt="logo"></a>
        <h1>Liste des clients</h1>
    </header>

    <main>

    <form action="index.php?action=recherche" method="POST">
        <label for="raison_sociale">Raison Sociale : </label>
        <input type="text" class="search rounded" name="search" id="search" size="20" autocomplete="off" placeholder="Veuillez saisir le nom du Client" rounded />
        <button type="submit" class="btn btn-dark btn-secondary rounded">Rechercher</button>
    </form>


        <br><br>
        <a href="index.php?action=ajout" id="ref_ajout">Ajouter  un Nouveau Client</a>
        <form method="post" action="index.php?action=tableau">
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
                    foreach ($clients as $client) {
                        echo '<tr class="tableau"><td id="id_client">' . $client["idClient"] .
                        '</td><td id="raison_sociale"><a href=index.php?action=modif&code=' . $client["idClient"] .'>' . $client["raisonSociale"] . '</a></td>' .
                        '</td><td>'. $client["codePostalClient"] .
                        '</td><td>'. $client["villeClient"] .
                        '</td><td>'. $client["CA"] .
                        '</td><td>'. $client["telephoneClient"] .
                        '</td><td>'. $client["typeClient"] .
                        '</td><td>'. $client["natureClient"] .
                        '</td><td><button type="button" class="btn btn-warning" id="suppr">Supprimer</button></td></tr>';
                        // '<td><a id="suppr" href=index.php?action=suppr&code=' . $client["idClient"] . ' >Suppression de ce Client</a></td></tr>';
                    };
                ?>
                </tbody>
            </table>
        </form>
    </main>

</body>

<?php require("footer.php") ?>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>