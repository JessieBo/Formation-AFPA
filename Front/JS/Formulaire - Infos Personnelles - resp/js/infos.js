let btnEnvoyer = document.getElementById("Envoyer");
let btnAnnuler = document.getElementById("Annuler");

let ChampNom = document.getElementById("ChampNom");
let ChampPrenom = document.getElementById("ChampPrenom");
let ChampEmail = document.getElementById("ChampEmail");

let messageNom = document.getElementById("MessageNom");
let messagePrenom = document.getElementById("MessagePrenom");
let messageMail = document.getElementById("MessageMail");


ChampNom.addEventListener("keyup", function(){
  this.value = this.value.toUpperCase();
  if (ChampNom.value != "") {
    messageNom.innerText = "";
    ChampNom.style.background = "";
  }
});

ChampPrenom.addEventListener("keyup", function(){
  this.value = this.value.charAt(0).toUpperCase() + this.value.substr(1, this.value.length);
});

let regexValeurEmail = /.+@.+\..+/;

ChampEmail.addEventListener("keyup", function(){

  if (!this.value.match(regexValeurEmail)) {

    this.style.backgroundColor = "red";
    messageMail.innerHTML = "Adresse Mail invalide !!!";

  } else {
    this.style.backgroundColor = "gray";
    messageMail.innerText = "Adresse Mail correcte !!!";
  }
});

let pseudo = document.getElementById("ChampPseudo");
let messagePseudo = document.getElementById("MessagePseudo");

pseudo.addEventListener("keyup", function(){

  // le pseudo contient des lettres, des chiffres ou des tirets bas (_)
  if (!pseudo.value.match(/^([0-9a-zA-Z_]){4,8}$/)) {

    this.style.backgroundColor = "red";
    messagePseudo.innerHTML = "Le pseudo doit contenir de 4 à 8";

  } else {
    this.style.backgroundColor = "gray";
    messagePseudo.innerText = "Cool";
  }
});
// ([0-9a-zA-Z_]) : contient des lettres, des chiffres et des tirets bas (_)
// {6,20} : il mesure entre 6 et 20 caractères
// if(pseudo.match(/^([0-9a-zA-Z_]){6,20}$/));

btnAnnuler.addEventListener("click", function(){
  let messages = document.getElementsByClassName("Messages");
  let champs = document.getElementsByClassName("champ");
  for (var i = 0; i < messages.length; i++) {
     messages[i].innerText = "";
  }
  for (var i = 0; i < champs.length; i++) {
    champs[i].style.backgroundColor = "";
  }
  // où au cas par cas :
  // ChampEmail.style.backgroundColor = "";
  // messageMail.innerText = "";
  // ChampNom.style.backgroundColor = "";
  // messageNom.innerText = "";
});

btnEnvoyer.addEventListener("click", function(e){

    messageNom.innerText = "";
    // si la valeur du champ nom est non vide
    if (ChampNom.value != "") {
      messageNom.innerText = "ok";
      ChampNom.style.background = "rgb(231, 12, 140)";
      // les données sont ok, on peut envoyer le formulaire
    } else {
      e.preventDefault();// permet de bloquer l'envoi du formulaire
      // sinon on affiche un message
      messageNom.innerText ="Champ obligatoire !";
      ChampNom.style.background = "red";
      // et on indique de ne pas envoyer le formulaire
    }
});

btnEnvoyer.addEventListener("click", function(e){
    let mdp1 = document.getElementById("mdp1").value;
    let mdp2 = document.getElementById("mdp2").value;
    let message = "Mots de passe OK";

    if (mdp1 === mdp2) {
        if (mdp1.length >= 6) {
            let regexMdp = /\d+/;
            if (!regexMdp.test(mdp1)) {
              e.preventDefault();
                message = "Erreur : le mot de passe ne contient aucun chiffre";
                }
            } else {
              e.preventDefault();
                message = "Erreur : la longueur minimale du mot de passe est de 6 caractères ";
                }
        } else {
          e.preventDefault();
            message = "Erreur : les mots de passe saisis sont différents";
            }
        document.getElementById("MessageCMDP").textContent = message;
        // e.preventDefault();
});



