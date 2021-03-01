    // Lire le fichier json en cliquant sur le bouton
    // $('#button').on('click', function(){
    //     $('#Nom').load('pays.json');
    //     $(this).css("display", "none")
    // });

$(function() {

    var url = 'https://restcountries.eu/rest/v2/alpha/';
    var listePays = $('#content');


    $('#NomPays').on('keyup', function() {
        $('#liste').show();
        ajaxPays($(this).val());
    });

    function ajaxPays(mot) {

        var fluxHTML="";

        $.getJSON('pays.json', function(data) {
            data.forEach(element => {
                var position = element.nom_fr_fr.substring(0, mot.length).toUpperCase().search(mot.toUpperCase());
                if (position !== -1) {
                    fluxHTML += "<li class='li' id='" + element.alpha2 + "'>" + element.nom_fr_fr + "<br></li>";
                }
            });
            $("#liste").empty();
            $("#liste").append(fluxHTML)
        });
    };

    $('#liste').on('mousedown', 'li', function() {
        // $(this) désigne l'élément li
        $('#NomPays').val($(this).text());
        // créer un 'value'
        $('#NomPays').attr("value", $(this).attr("id"));
        // supprime la liste
        $('#liste').hide();
    });

    $("#NomPays").on("focusout", function() {
        recupCode = $('#NomPays').attr("value")
        // console.log(recupCode);
        $('#content').show();
        $('#carte').show();
    });

    // Afficher les pays en cliquant sur le bouton rechercher un pays.
    $("#rechercher").on("click", function() {

        listePays.empty();

        $.getJSON(url + recupCode, function (objet) {
            // console.log(objet)
            listePays.append(
                 '<img src=' + objet.flag + ' width="180px" height="120px"/>'
                + "<p id= 'Code'>" + "Code Pays : " + objet.alpha2Code + "</p>"
                + "<p id='nomPays'>" + "Nom du Pays : " + objet.name + "</p>"
                + "<div id='infos'" + "style='display:none'>"
                + '<p>Capitale du pays : '+ objet.capital +'</p>'
                + '<p>Surface du pays : '+ objet.area + ' km²' + '</p>'
                + '<p>Population du Pays : '+ objet.population + ' habitants' + '</p>'
                + '<p>Code du pays : '+ objet.numericCode + '</p>'
                + '<p>Région du pays : '+ objet.region + '</p>'
                + '<p>Monnaie du pays : '+ objet.currencies[0].name + '</p>'
                + '<p>Symbole de la monnaie : '+ objet.currencies[0].symbol + '</p>'
                + "</div>"
                + "<button id='button'>" + "Infos supplémentaires" + "</button>"
                + "<hr class='hr'>");

                var lattitude = objet.latlng[0];
                console.log(lattitude);
                var longitude = objet.latlng[1];
                console.log(longitude);


            // avant d'initialiser la carte, vérifie si elle est active -> rafraichit la page à la nouvelle recherche
            var container = L.DomUtil.get('carte');
                if(container != null) {
                    container._leaflet_id = null;
                }

            var map = L.map('carte').setView([lattitude, longitude], 4);//lattitude, longitude, niveau de zoom
            console.log(map);

            // création du calques images
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
            }).addTo(map);

            // création d'un marqueur
            var marker = L.marker([lattitude, longitude]).addTo(map);
            var popup = marker.bindPopup('<b>Vous êtes ici</b><br />');
        });
    });

// Afficher les infos complémentaires en cliquant sur le bouton infos supp et remplacer par un bouton masquer infos
    $("#content").on('click', '[id=button]',function() {
        $('#infos').toggle("slow");
        $("#button").replaceWith("<button id='MasqueInfos'>Masquer les infos</button>");
    });

// Cacher les infos complémentaires en cliquant sur le bouton masquer et remettre le bouton infos supplémentaires
    $("#content").on('click', '[id=MasqueInfos]',function() {
        $("#MasqueInfos").replaceWith("<button id='button'>Infos supplémentaires</button>");
        $("#infos").toggle("slow");
    });

});


//  Permet l'autocompletion automatique dans le champ nom du pays
        // var options  =  {
        //     url: "pays.json",
        //     getValue: "alpha2",
        //     getValue: "nom_fr_fr",
        //     theme: 'plate-dark',
        //     template: {
        //         type: "description",
        //         fields: {
        //             description: "alpha2",
        //         },
        //     },
        //     list: {
        //         match: {
        //             enabled: true
        //         },
        //         showAnimation: {
        //             type: "fade", //normal|slide|fade
        //             time: 400,
        //         },
        //         hideAnimation: {
        //             type: "slide", //normal|slide|fade
        //             time: 400,
        //         }
        //     }
        // }
        // $('#NomPays').easyAutocomplete(options);
// })



   // Afficher les pays du fichier json en cliquant sur le bouton rechercher un pays.
    // $("#rechercher").click(recherchePays);

    // function recherchePays() {
    //     var nomPays = $('#NomPays').val();
    //     if(!nomPays.length) nomPays ='France';

    //     $.ajax({
    //         type: "GET",
    //         url : json,
    //         success: montrerListePays
    //     });
    // }

    // function montrerListePays(objet) {
    //     listePays.empty();
    //     objet.forEach(function(element) {
    //         listePays.append(
    //             "<img alt='photo drapeau' src='flags/" + element.alpha2 +".png' width='160px' height='120px'>"
    //            + "<p id= 'Code'>" + "Code Pays : " + element.alpha2 + "</p>"
    //            + "<p id='nomPays'>" + "Nom du Pays : " + element.nom_fr_fr + "</p>"
    //            + "<div id='infos'>" + "</div>"
    //            + "<button id='button'>" + "Infos supplémentaires" + "</button>"
    //            + "<hr>"
    //            );
    //     });
    // }
