$(function () {
    $(".tableau").on("click", "#suppr", function () {
        $code = $(this).parent().siblings("#id_client")[0].innerText;
        $name = $(this).parent().siblings("#raison_sociale")[0].innerText;
        $message = "Voulez-vous supprimer le client " + $name + "?";
        if (confirm($message)) {
            window.location.replace("index.php?action=suppr&code=" + $code);
        }
    })
})
