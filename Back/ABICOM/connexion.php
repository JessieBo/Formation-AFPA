<?php

require("connect.php");

		$loginUser="";
		$passUser="";
	if(isset($_POST['username']) && isset($_POST['password']) ){
		$loginUser= $_POST['username'];
		$passUser= $_POST['password'];
     	$response = $connexion->prepare("SELECT count(*)
    		FROM users
			WHERE loginUser = :loginUser and passUser = :passUser ");
			$response->execute(array(
			'loginUser' => $loginUser,
			'passUser' => $passUser
			));
			if ($ligne = $response->fetch()) {
				if ($ligne[0] == '1'){
				echo 'Success';
				exit();
				} else {
				echo 'Login introuvable ou mot de passe erroné !';
				exit();
				}
            }
    }
?>
