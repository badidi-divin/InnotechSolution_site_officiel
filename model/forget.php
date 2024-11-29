<?php 

	if (isset($_POST['save'])) {
		$email=htmlspecialchars($_POST['email']);
		$music=htmlspecialchars($_POST['music']);
		$errors=array();
		if (!empty($email) AND !empty($music)) {

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM utilisateurs WHERE email=? AND music=?");
			$requiser->execute(array($email,$music));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['id']=$userinfo['id'];

				header("Location:changepass.php");		
			}
			else
			{
				$erreur="Email ou Titre Musical(Respectez la casse et la manière dont vous l'avez écrites) non valide! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}
	}

	