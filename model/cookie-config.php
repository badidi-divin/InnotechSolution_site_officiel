<?php 
	require_once('../bdd/connexion.php');


	if (!isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])) {

		$requiser=$pdo->prepare("SELECT * FROM utilisateurs WHERE email=? AND password=?");
		$requiser->execute(array($_COOKIE['email'],$_COOKIE['password']));
		// rowCount permet de compter le nombre saisie par le user
		$userexist=$requiser->rowCount();
		
		if ($userexist==1) {

				$userinfo=$requiser->fetch();
				$_SESSION['id']=$userinfo['id'];
				$_SESSION['email']=$userinfo['email'];
				$_SESSION['pseudo']=$userinfo['pseudo'];
				$_SESSION['password']=$userinfo['password'];
				$_SESSION['photo']=$userinfo['photo'];
				$_SESSION['pays']=$userinfo['pays'];
				$_SESSION['adresse']=$userinfo['adresse'];
				$_SESSION['numero']=$userinfo['numero'];
				$_SESSION['prenom']=$userinfo['prenom'];
				$_SESSION['nom']=$userinfo['nom'];
				$_SESSION['sexe']=$userinfo['sexe'];
				$_SESSION['pays']=$userinfo['pays'];
				$_SESSION['adresse']=$userinfo['adresse'];
				$_SESSION['numero']=$userinfo['numero'];
				$_SESSION['music']=$userinfo['music'];
	
				header("Location:loading.php");		
			}
	}
	

	