<?php
	session_start();

   if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $prenom=htmlspecialchars($_POST['prenom']);
    $nom=htmlspecialchars($_POST['nom']);
    $email=htmlspecialchars($_POST['email']);
    $sexe=htmlspecialchars($_POST['sexe']);
    $pays=htmlspecialchars($_POST['pays']);
    $music=htmlspecialchars($_POST['music']);
    $adresse=htmlspecialchars($_POST['adresse']);
 
    $memo_mdp=$_POST['mdp'];

    $password=md5(htmlspecialchars($_POST['mdp'])); 
    $cpassword=md5(htmlspecialchars($_POST['cmdp'])); 
	$pseudo=$prenom.' '.$nom;
    $errors=array();
    // ***************************regex du Prénom*******************************
    if (empty($_POST['prenom']) || !preg_match('/^[a-z]+$/', $_POST['prenom'])) {
			$errors['prenom']="Votre prenom n'est pas valide(Pas d'espace, ni d'accent, En Miniscule)";
		}
	if (empty($_POST['music']) || !preg_match('/^[a-z_]+$/', $_POST['music'])) {
		$errors['music']="Votre Titre Musical n'est pas valide(Pas d'espace, ni d'accent, En Miniscule, à la place d'espace mettez un sous-trait)";
	}
		if (strlen($prenom > 5) AND strlen($prenom <20)){
			$errors['nom']="Votre Prenom doit avoir 5 à 20 caractères!";
		}

		if (empty($_POST['prenom']) || !preg_match('/^[a-zA-Z_]+$/', $_POST['prenom'])) {
			$errors['prenom']="Votre prenom n'est pas valide(Pas d'espace, ni d'accent)";
		}
	// ***************************Fin regex du Prénom*******************************
	
	// ***************************regex du nom*******************************
    if (empty($_POST['nom']) || !preg_match('/^[A-Z]+$/', $_POST['nom'])) {
			$errors['nom']="Votre Nom n'est pas valide(Pas d'espace, ni d'accent, En Majuscule)";
		}
		if (strlen($nom > 5) AND strlen($nom <20)){
			$errors['nom']="Votre Nom doit avoir 5 à 20 caractères!";
		}
	// ***************************Fin regex du nom*******************************
		if(strlen($password > 8) AND strlen($password < 10)) {
			$errors['mdp']="Votre Mot de passe doit avoir 8 à 10 caractères";
		}

		if(strlen($cpassword > 8) AND strlen($cpassword < 10)) {
			$errors['cmdp']="Votre Mot de passe doit avoir 8 à 10 caractères";
		}

		if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email']="Votre email n'est pas valide";
			}
			else
			{
				$req=$pdo->prepare('SELECT id FROM utilisateurs WHERE email=?');
				$req->execute([$_POST['email']]);
				$user=$req->fetch();
				if ($user) {
					$errors['email']='Cet email est déjà pris';
				}
			}

		// *************************Vérification des Mot de Passe***********************
		if ($password<>$cpassword) {
			$errors['password']="Les deux Mots de Passe ne sont pas identiques, nous avons corrigés cet erreur";
		}
		//************************Fin***********************************
		if (empty($errors)) {
			
			if (isset($_POST['code']) && $_POST['code']==$_SESSION['code']) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO utilisateurs(nom,prenom,sexe,email,password,pseudo,memo,pays,adresse,music)VALUES(?,?,?,?,?,?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom,$prenom,$sexe,$email,$cpassword,$pseudo,$memo_mdp,$pays,$adresse,$music);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			$_SESSION['pseudo']=$pseudo;
			$_SESSION['password']=$password;
			?>
			<script type="text/javascript">
				alert('Votre Compte a été créer avec succès!')
			</script>
			<script>
				window.open('login.php','_self')
			</script>
			<?php

			exit();	
			}
			else
			{
		   		$errors['code']= "Code CAPTCHA incorrect !";
			}
			
		}
				
	
	}
  
