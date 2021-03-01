function valider_recherche()
{
	if ( document.formRech.NomClient.value == "" )
    {
		document.formRech.NomClient.style.background="pink";
		document.formRech.NomClient.focus();
		return false;
	}else{
		document.formRech.NomClient.style.background="#E0FFFF";
    }	
}

function valider( )
{
	if ( document.formSaisie.rais.value == "" )
    {
		document.formSaisie.rais.style.background="pink";
		document.formSaisie.rais.focus();
		return false;
	}else{
		document.formSaisie.rais.style.background="#E0FFFF";
    }
	
}

function mettre_a_blanc(){
	document.formSaisie.reset();	
}
function surligne(champ, erreur){
	
   if(erreur)
      { 
		 champ.style.backgroundColor = "pink";
		 champ.placeholder="veuillez saisir un"+" "+champ.name+" "+"valide";
		}
   else
      	champ.style.backgroundColor = "";
}
function verifCodep(champ){
	
   var regex = /^[0-9]{5}$/;/*expression régulière pour controler le code postale*/
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
function verifNumrue(champ){
	
   var regex = /^([0-9]{1,2})(bis)?$/;/*expression régulière pour controler le numéro de de la rue*/
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
function verifTel(champ){
	
   var regex = /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/;/*expression régulière pour controler le numéro de téléphone*/
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}