$(function() {

        var url = $(location).attr("href");
        console.log(url);
        var element = url.split("/");
        console.log(element);
        var index = element.length-1;
        console.log(index);
        var fichier = element[index];
        console.log(fichier);

        switch(fichier) {
            case "index.php" :
                $('#accueil').css({
                    color : 'red',
                    fontWeight : 'bold',
                });
                $("#html, #css, #js, #jquery").css("color", "white");
            break;
            case "html.php" :
                $('#html').css({
                    color : 'red',
                    fontWeight : 'bold',
                });
                $("#accueil, #css, #js, #jquery").css("color", "white");
            break;
            case "css.php" :
                $('#css').css({
                    color : 'red',
                    fontWeight : 'bold',
                });
                $("#accueil, #html, #js, #jquery").css("color", "white");
            break;
            case "js.php" :
                $("#js").css({
                    color : 'red',
                    fontWeight : 'bold',
                });
                $("#accueil, #html, #css, #jquery").css("color", "white");
            break;
            case "jquery.php" :
                $('#jquery').css({
                    color : 'red',
                    fontWeight : 'bold',
                });
                $("#accueil, #html, #css, #js").css("color", "white");
            break;
        }
    })



