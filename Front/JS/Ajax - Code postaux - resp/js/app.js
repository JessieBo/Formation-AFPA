$(function() {
    const apiUrl = "https://geo.api.gouv.fr/communes?codePostal=";
    const format = '&format=json';

    let codePostal = $("#CP");
    let ville = $("#ville");
    let messageErreur = $("#message-erreur");


    // saisie du CP dans le champ + valider
    $(codePostal).on('blur', function() {
        let code = $(this).val();
        // console.log(code);
        let url = apiUrl + code + format;
        // console.log(url);

        // envoie la requête vers l'API
        fetch(url, {
            method: 'get'
        }).then(response => response.json()).then(results => {
            // console.log(results);
            $(ville).find('option').remove(); // évite que les données s'accumulent
            // Si il y a résultat avec l'API
            if(results.length) {
                $(messageErreur).text('').hide(); // efface le message d'erreur
                // on fait une boucle sur les résultats
                $.each(results, function(key, value) {
                    // console.log(value);
                    // console.warn(value.nom);
                // proposer à l'utilisateur un choix de communes
                    $(ville).append('<option value="'+ value.nom +'">'+ value.nom +'</option>');
                })
            } else {
                if($(codePostal).val()) {
                    console.log('Erreur de code postal');
                    $(messageErreur).text('Aucune commune avec ce CP.').show();
                } else {
                    $(messageErreur).text('').hide();
                }
            }
        }).catch(err => {
            console.log(err);
            $(ville).find('option').remove();
        })
    })

});