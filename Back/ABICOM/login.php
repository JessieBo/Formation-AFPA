<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur ABI.COM</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function(){

			$("#btnSubmit").on("click", function(e){
					
				if(($("#login").val().length === 0)&&($("#pwd").val().length === 0)){

					e.preventDefault();

				}else{

					$.ajax({
						url : "traitementlogin.php",
						type : "POST",
						data : $("#monform").serialize(),
						dataType : "html",
               
                		success : function(reponse){
							$("#reponse").show();
							$("#reponse").html(reponse);
							if(reponse === "OK"){
								$(location).attr('href', 'index.php');
							}
							
						}
						
					});	

					e.preventDefault();


				}
				
			});
			
			$("#btnReset").on("click", function(){

				$("#reponse").hide();

			});

		});
    </script> 
</head>
<body>
<h1><img src="img/logo.png" alt="ABICOM"/>Bienvenue sur ABI.COM</h1>
<br><br>
<div id="container">
<h3>Connexion</h3>
	<form id="monform" method="POST">
		<span id="reponse"></span>
		<br>
	<table id="tablelogin">
	<tbody>
		<tr>
			<td><label for="login">Login</label></td>
			<td><input type="text" id="login" name="login" autocomplete="off"></td>
		</tr>
		<tr>
			<td><label for="pwd">Mot de passe</label></td>
			<td><input type="password" id="pwd" name="pwd" autocomplete="off"></td>
		</tr>
		<!-- <tr>
			<td><label  for="remember">Se souvenir de moi</label></td>
			<td><input  type="checkbox" id="remember" name="remember"></td>
		</tr> -->
	</tbody>
	</table>
	<table id="tablebtn">
		<tr>
			<td><input class="btn btn-dark" id="btnSubmit" type="submit" value="Envoyer"></td>
			<td><input class="btn btn-dark" id="btnReset" type = "reset" value = "Annuler"> </td>
		</tr>
	</table>
	</form>
</div>

</body>
</html>
