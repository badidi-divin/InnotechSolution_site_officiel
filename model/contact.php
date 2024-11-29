<?php
	
	if (isset($_POST['save'])) {
		$nom=$_SESSION['pseudo'];
		$mail=$_SESSION['email'];
		$sujet=htmlspecialchars($_POST['sujet']);
		$message=htmlspecialchars($_POST['message']);

		$errors=array();
		$success=array();

		if (empty($_POST['sujet'])) {
			$errors['sujet']="Le sujet doit être completé";
			}
		if (empty($_POST['message'])) {
			$errors['message']="Le Message doit être completé";
			}

			if (empty($errors)) {			
					 //Création de l'objet prepare et envoie de la requête
				    $ps=$pdo->prepare("INSERT INTO contact(nom,email,sujet,message)VALUES(?,?,?,?)");
				    //Pour bien recupere les données on crée un table de parametre
				    $params=array($nom,$mail,$sujet,$message);
				    //Execution de la requête par leur paramètre en ordre 
				    $ps->execute($params);
					// Pour recuperer l'id du user
					$success['message']="Message envoyé !; on vous relance au plus vite sur whatsapp ou par e-mail.";
				}
	}
