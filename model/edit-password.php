<?php
	$id=$_SESSION['id'];

   if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $memo=htmlspecialchars($_POST['b']);
    $a=md5($_POST['a']);
    $b=md5($_POST['b']);
    $c=md5($_POST['c']);
   
    $errors=array();
    $success=array();
    // ***************************regex du Prénom*******************************
   
		if(strlen($b > 8) AND strlen($b < 10)) {
			$errors['b']="Votre Nouveau Mot de passe doit avoir 8 à 10 caractères";
		}

		if(strlen($c > 8) AND strlen($c < 10)) {
			$errors['c']="Votre Mot de passe de confirmation doit avoir 8 à 10 caractères";
		}

		// *************************Vérification des Mot de Passe***********************
		if ($b<>$c) {
			$errors['c']="Votre Nouveau Mot de Passe doit être égal au Mots de Passe de confirmation!";
		}
		$requiser=$pdo->prepare("SELECT * FROM utilisateurs WHERE password=? AND id=?");
		$requiser->execute(array($a,$_SESSION['id']));
		// rowCount permet de compter le nombre saisie par le user
		$userexist=$requiser->rowCount();
		if ($userexist!=1) {
			$errors['c']="Votre Ancien Mot de Passe est incorrect!";
		}
		//************************Fin***********************************
		if (empty($errors)) {
		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE utilisateurs SET password=?,memo=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($c,$memo,$id);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			$_SESSION['password']=$c;
			$success['']="Votre Mot de Passe a été Mis à jour";

			
			
			
		}
				
	
	}
  
