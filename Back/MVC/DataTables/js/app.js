$(function () {

    $(".tableau").on("click", "#suppr", function () {
        $code = $(this).parent().siblings("#id_client")[0].innerText;
        $name = $(this).parent().siblings("#nom")[0].innerText;
        $message = "Voulez-vous supprimer le client " + $name + "?";
        if (confirm($message)) {
            window.location.replace("index.php?action=suppr&code=" + $code);
        }
    })

    $('#myTable').DataTable({
        "lengthMenu" : [[5, 10, 15, 25, 50, -1], [5, 10, 15, 25, 50, "Tout"]],
        "pageLength" : 5,
        "responsive" : true,
        "lenghtChange" : true,
        "language" : {
            "emptyTable" : "Aucun élément trouvé",
            "info" : "Lignes _PAGE_ sur _PAGES_",
            "infoEmpty" : "Aucune donnée disponible",
            "infoFiltered": "(filtré sur _MAX_ au total)",
            "loadingRecords" : "Chargement...",
            "processing" : "En cours...",
            "search" : "Rechercher : ",
            "lengthMenu" : "Afficher _MENU_ éléments",
            "zeroRecords" : "L'élement recherché n'existe pas",
            "paginate" : {
                "first" : "Premier",
                "last" : "Dernier",
                "next" : "Suivant",
                "previous" : "Précédent",
            }
        }
    })


})
