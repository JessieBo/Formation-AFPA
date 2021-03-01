
let images = document.getElementById("gallery");
let liens = images.getElementsByTagName("a");
let imageClic = document.getElementById("imageClic");

for (var i = 0; i < liens.length; i++) {
    liens[i].onclick = function () {
        imageClic.src = this.href;
        return false;
    }
}

let btnFeu = document.getElementById("feu");
let btnEau = document.getElementById("eau");
let btnTerre = document.getElementById("terre");
let btnEvolution = document.getElementById("evolution");

let DivFeu = document.getElementsByClassName("F");
let DivEau = document.getElementsByClassName("E");
let DivTerre = document.getElementsByClassName("T");
let DivEvolution = document.getElementsByClassName("EV");

btnFeu.addEventListener("click", () => {
    for (i = 0; i < DivFeu.length; i++) {
        if(DivFeu[i].classList.contains("cache")){
            DivFeu[i].classList.remove("cache");
        }else{
            DivFeu[i].classList.add("cache");
        }
    }
});

btnEau.addEventListener("click", () => {
    for (i = 0; i < DivEau.length; i++) {
        if(DivEau[i].classList.contains("cache")){
            DivEau[i].classList.remove("cache");
        }else{
            DivEau[i].classList.add("cache");
        }
    }
});

btnTerre.addEventListener("click", () => {
    for (i = 0; i < DivTerre.length; i++) {
        if(DivTerre[i].classList.contains("cache")){
            DivTerre[i].classList.remove("cache");
        }else{
            DivTerre[i].classList.add("cache");
        }
    }
});

btnEvolution.addEventListener("click", () => {
    for (i = 0; i < DivEvolution.length; i++) {
        if(DivEvolution[i].classList.contains("cache")){
            DivEvolution[i].classList.remove("cache");
        }else{
            DivEvolution[i].classList.add("cache");
        }
    }
});



