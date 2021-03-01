
$(function() {

    var pays = [];

    $("#chercher").on('keyup', function () {
        ajaxPays(this).val();

        $.ajax({
            url: 'pays.json',
            type : 'post',
            dataType : 'json',
        })
    })

})