
$(function() {

    // $('#button').on('click', function(){

    //     $('#zone').load('message.txt');

    // });

        $.ajax({
               type: "GET",
               url: "message.txt",
               error:function(msg){
                    // message en cas d'erreur :
                    alert( "Error !: " + msg );
                },
               success: function(data){

                    setTimeout(function() {
                    // affiche le contenu du fichier dans le conteneur dédié :
                    $('#zone').text(data);
                    }, 4000);
                },
        });

});
