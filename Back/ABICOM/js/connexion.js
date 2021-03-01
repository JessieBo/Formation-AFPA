$(document).ready(function() {
    $("#seConnecter").on("click", function()  {
        $.ajax({
            type: "post",
            url:  "connexion.php",
            data:
                // {'username' : $("#login").val(),
                // 'password' : $("#password").val()
                $('#formulaire').serialize(),
                //},
            success: function(data){
                if(data == "Success"){
                // Le membre est connecté. Ajoutons lui un message dans la page HTML.
                // $("#resultat").css("color", "green").html('Vous avez été connecté avec succès !');
                window.location.replace("tableau.php");
                }else{
                // Le membre n'a pas été connecté. (data vaut ici "failed")
                $("#resultat").css("color", "red").html(data);
                }
            }
        });
        return false;
    });
});