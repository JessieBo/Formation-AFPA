// document.body.style.background = "url(img/cicruitlong.png) no-repeat fixed"
$(function(){
    $(".image").css({
        background : "url(img/cicruitlong.png) no-repeat fixed",
        position : "relative",
    })

    class Voiture {
            constructor(x, y, img, id, distance) {
            this.x = x;
            this.y = y;
            this.img = img;
            this.id = id;
            this.dessiner(img);
            this.deplacerAgauche(distance);
        };
    };

    // Voiture.prototype.dessiner = function(img) {
    //     var voitureHTML = "<img src= "+ img +" width='300px'>";
    //     this.voitureElement = $(voitureHTML);
    //     this.voitureElement.css ({
    //         position: "absolute",
    //         left: this.x,
    //         top: this.y
    //     });
    //     $('body').append(this.voitureElement);
    // };

    Voiture.prototype.dessiner = function (img) {

        let image = document.createElement("img");
        image.src = this.img;
        image.style.position = "absolute";
        image.style.left = this.x + "px";
        image.style.top = this.y + "px";
        image.id = this.id;
        image.style.width = "auto";
        image.style.height = "220px";

        $("#voiture").append(image);
    };

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

Voiture.prototype.deplacerAgauche = function () {
    dist = getRandomInt(15);
    this.x = this.x - dist;
    dist2 = this.x + 'px';
    id = "#" + this.id
    $(id).animate({ left: dist2 }, 0.1);
};

    car1 = new Voiture(1150, 100, "img/car1.png", "v1", 0);
    car2 = new Voiture(1150, 320, "img/car2.png", "v2", 0);

    function se_deplacer() {

        if (car1.x <= 0 || car2.x <= 0) {
            clearInterval(myVar);

            if (car1.x <= 0) {
                $("#voiture").append("<p id=v1gagne>La voiture 1 a gagné !!!</p>");
            }
            else {
                $("#voiture").append("<p id=v2gagne>La voiture 2 a gagné !!!</p>");
            }
        }

        car1.deplacerAgauche();
        car2.deplacerAgauche();

        $(document).keydown(function (e) {
            if (e.which == 37) { // vers la gauche
                dist = getRandomInt(15);
                car2.deplacerAgauche(dist);
            };
            if (e.which == 83) { // touche S {
                dist = getRandomInt(15);
                car1.deplacerAgauche(dist);
            };
        });
}

    $("#GO").on('click' , function() {
        myVar = setInterval(se_deplacer, 25);
        $(this).attr("disabled","disabled");
    });

    $("#STOP").click(function() {
        clearInterval(myVar);
        $("#v1").stop(true);
        $("#v2").stop(true);
        $("#GO").removeAttr("disabled");
    });

    $("#Reset").click(function () {
        clearInterval(myVar);
        $("#voiture").children().remove();

        car1 = new Voiture(1500, 100, "img/car1.png", "v1", 0);
        car2 = new Voiture(1500, 320, "img/car2.png", "v2", 0);

        $("#GO").removeAttr("disabled");
    });

      function CompteARebours() {

        if(count == -1) {
            $('#compte_a_rebours').html(""); //enlève le 0
            $("#compte_a_rebours").append("GO !");
            count--;

        } else if (count < -1) {
          clearInterval(timer);
          $("#compte_a_rebours").css({"visibility": "hidden"});
          myVar = setInterval(se_deplacer, 25);

        } else {
        $('#compte_a_rebours').html(count);
          count--;
        }
      }
      var count = 3;
      var timer = setInterval(function() {
          CompteARebours(count);
        } , 1000);

});


