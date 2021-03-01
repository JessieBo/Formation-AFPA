<?php
$title = "Liste des clients";
ob_start();
?>
<body>
    <header>
        <h1>DataTable et Pagination</h1>
    </header>

    <main>

        <form method="post" action="">
            <table id="myTable" class="table table-bordered table-hover table-striped table-dark border-primary">
                <thead>
                    <tr>
                        <th visibility: hidden>ID Client</th>
                        <th>Nom salarié</th>
                        <th>Prénom salarié</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($clients as $client) {
                        echo '<tr class="tableau table-sm"><td id="id_client" visibility: hidden>' . $client["id"] .
                        '</td><td id="nom"><a href=index.php?action=modif&code=' . $client["id"] .'>' . $client["nom"] . '</a></td>' .
                        '</td><td>'. $client["prenom"] .
                        '</td><td>'. $client["telephone"] .
                        '</td><td>'. $client["email"] .
                        '</td><td><button type="button" class="btn" id="suppr">Supprimer</button></td></tr>';
                        // '<td><a id="suppr" href=index.php?action=suppr&code=' . $client["idClient"] . ' >Suppression de ce Client</a></td></tr>';
                    };
                ?>
                </tbody>
            </table>
        </form>
        <a href="index.php?action=ajout" id="btn_ajout">Ajouter  un Nouveau Client</a>
    </main>

</body>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>