$(document).ready(function(){

    $('#Enregistrer').click(function(e) {

        if($('#username').val() == "") {
            e.preventDefault();
            // $('.erreur').css('display', 'block');
            $('#username').css({
                borderColor : 'red',
            });

        }else{
            return true;
        }

        if($('#email').val() == "") {
            e.preventDefault();
            // $('.erreur').css('display', 'block');
            $('#email').css({
                borderColor : 'red',
            });

        }else{
            return true;
        }

        if($('#password').val() == "") {
            e.preventDefault();
            // $('.erreur').css('display', 'block');
            $('#password').css({
                borderColor : 'red',
            });

        }else{
            return true;
        }

        if($('#fonction').val() == "") {
            e.preventDefault();
            // $('.erreur').css('display', 'block');
            $('#fonction').css({
                borderColor : 'red',
            });

        }else{
            return true;
        }

        // if(){
        //     $message = "Etes vous sûre de vouloir valider ?";
        //     if (confirm($message)) {
        //         window.location.replace("index.php");
        //     } else {
        //         return false;
        //     }
        // } return true;

    });

        $('#username').keyup(function() {
            $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().substring(1).toLowerCase());
        });

        $("#username, #email, #password, #fonction").keyup(function() {
            $('.champ').css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                backgroundColor : 'white',
                borderColor : '#ccc',
                color : '#555'
            });
            // $('.erreur').css('display', 'none');
        });

        $("#annuler").click(function() {
            $('.champ').css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                backgroundColor : 'white',
                borderColor : '#ccc',
                color : '#555'
            });
            // $('.erreur').css('display', 'none');
        });
    });
