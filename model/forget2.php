<?php
	$id=$_SESSION['id'];
	
   if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $memo=htmlspecialchars($_POST['a']);
    $a=md5($_POST['a']);
    $b=md5($_POST['b']);
   
    $errors=array();
    $success=array();
    // ***************************regex du Prénom*******************************
   
		if(strlen($a > 8) AND strlen($a < 10)) {
			$errors['a']="Votre Nouveau Mot de passe doit avoir 8 à 10 caractères";
		}

		if(strlen($b > 8) AND strlen($b < 10)) {
			$errors['b']="Votre Mot de passe de confirmation doit avoir 8 à 10 caractères";
		}

		// *************************Vérification des Mot de Passe***********************
		if ($a<>$b) {
			$errors['b']="Votre Nouveau Mot de Passe doit être égal au Mots de Passe de confirmation!";
		}
		//************************Fin***********************************
		if (empty($errors)) {
		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE utilisateurs SET password=?,memo=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($b,$memo,$id);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			$success['a']="Votre Mot de Passe a été Mis à jour <a href='login.php' class='btn btn-outline-success'>Se Connecter</a>";

		}
				
	
	}
  
