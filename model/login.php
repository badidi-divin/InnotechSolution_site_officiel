<?php 
	
	if (isset($_POST['save'])) {
		$email=htmlspecialchars($_POST['email']);
		$mdp=htmlspecialchars(md5($_POST['mdp']));
		$errors=array();

		if (!empty($email) AND !empty($mdp)) {

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM utilisateurs WHERE email=? AND password=?");
			$requiser->execute(array($email,$mdp));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {

				if (isset($_POST['rememberme'])) {
					setcookie('email',$email,time()+365*24*3600,null,null,false,true);
					setcookie('password',$mdp,time()+365*24*3600,null,null,false,true);
				} 
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
			else
			{
				$erreur="Email ou Mot de Passe Non valides! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}
	}

	