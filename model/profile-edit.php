<?php 
if (isset($_POST['photosave'])) {

	$tmpName=$_FILES['photo']['tmp_name'];
	$name=$_FILES['photo']['name'];
	$size=$_FILES['photo']['size'];
	$error=$_FILES['photo']['error'];
	$type=$_FILES['photo']['type'];
	$errors=array();
	$success=array();

	// Voir l'extension du fichiers
	$tabExtension=explode('.', $name);
	$extension=strtolower(end($tabExtension));
	// Extension Autorisé
	$extensionAutorise=['jpg','jpeg','gif','png'];
	$tailleMax=2097152;

	if (in_array($extension, $extensionAutorise)) {

		if ($size<=$tailleMax) {
				if ($error==0) {
					$uniqueNom=uniqid('',true);
					$fileName=$uniqueNom.'.'.$extension;
					move_uploaded_file($tmpName,'../includes/Avatar_compte/'.$fileName);

					$ps=$pdo->prepare("UPDATE utilisateurs SET photo=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($fileName,$_SESSION['id']);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);

		    $_SESSION['photo']=$fileName;
		    $success['photo']= "Avatar du compte Mis à jour!";
			// Pour recuperer l'id du user
				}
				else
				{
					$errors['photo']= "erreur nous ne pouvons pas uploader cette image!";
				}
				
			}
			else
			{
				$errors['photo']= "taille trop importante Maximum 2Mo";
			}		
		}
		else{
			$errors['photo']= "Mauvaise Extension";
		} 
	
	}
  $sexe=$_SESSION['sexe'];

if (isset($_POST['save'])) {

	$requtilisateurs=$pdo->prepare("SELECT * FROM utilisateurs WHERE id=?");
	$requtilisateurs->execute(array($_SESSION['id']));
	$utilisateurs=$requtilisateurs->fetch();
	$pseudo=$_POST['prenom']." ".$_POST['nom'];
	$errors=array();
	$success=array();

	 if (empty($_POST['prenom']) || !preg_match('/^[a-z]+$/', $_POST['prenom'])) {
			$errors['prenom']="Votre prenom n'est pas valide(Pas d'espace, ni d'accent, En Miniscule)";
		}
		if (strlen($_POST['prenom'] > 5) AND strlen($_POST['prenom'] <20)){
			$errors['nom']="Votre Prenom doit avoir 5 à 20 caractères!";
		}

		if (strlen($_POST['numero'] > 14) AND strlen($_POST['numero'] <15)){
			$errors['numero']="votre numéro whatsapp n'est pas valide!";
		}

		if (empty($_POST['prenom']) || !preg_match('/^[a-zA-Z_]+$/', $_POST['prenom'])) {
			$errors['prenom']="Votre prenom n'est pas valide(Pas d'espace, ni d'accent)";
		}
	if (empty($_POST['music']) || !preg_match('/^[a-z_]+$/', $_POST['music'])) {
		$errors['music']="Votre Titre Musical n'est pas valide(Pas d'espace, ni d'accent, En Miniscule, à la place d'espace mettez un sous-trait)";
	}
	// ***************************Fin regex du Prénom*******************************
	
	// ***************************regex du nom*******************************
    if (empty($_POST['nom']) || !preg_match('/^[A-Z]+$/', $_POST['nom'])) {
			$errors['nom']="Votre Nom n'est pas valide(Pas d'espace, ni d'accent, En Majuscule)";
		}
	if (empty($_POST['numero']) || !preg_match('/^[0-9]+$/', $_POST['numero'])) {
			$errors['numero']="Votre Numéro de téléphone n'est pas valide";
		}
		if (strlen($_POST['nom'] > 5) AND strlen($_POST['nom'] <20)){
			$errors['nom']="Votre Nom doit avoir 5 à 20 caractères!";
		}
	// ***************************Fin regex du nom*******************************

		if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email']="Votre email n'est pas valide";
			}
	if (empty($errors)) {
		if ($pseudo!=$utilisateurs['pseudo']) {
		$insertpseudo=$pdo->prepare('UPDATE utilisateurs SET pseudo=? WHERE id=?');
		$insertpseudo->execute(array($pseudo,$_SESSION['id']));
		$success['pseudo']="Votre Pseudo a été mis à jour";
		$_SESSION['pseudo']=$pseudo;
	}
	if (isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] !=$utilisateurs['prenom']) {
		$prenom=htmlspecialchars($_POST['prenom']);
		$insertpseudo=$pdo->prepare('UPDATE utilisateurs SET prenom=? WHERE id=?');
		$insertpseudo->execute(array($prenom,$_SESSION['id']));
		$success['prenom']="Votre Prénom a été mis à jour";
		$_SESSION['prenom']=$prenom;
	}
	if (isset($_POST['music']) AND !empty($_POST['music']) AND $_POST['music'] !=$utilisateurs['music']) {
		$music=htmlspecialchars($_POST['music']);
		$insertpseudo=$pdo->prepare('UPDATE utilisateurs SET music=? WHERE id=?');
		$insertpseudo->execute(array($music,$_SESSION['id']));
		$success['music']="Votre titre musical a été mis à jour";
		$_SESSION['music']=$music;
	}
	if (isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] !=$utilisateurs['nom']) {
		$nom=$_POST['nom'];
		$insertpseudo=$pdo->prepare('UPDATE utilisateurs SET nom=? WHERE id=?');
		$insertpseudo->execute(array($nom,$_SESSION['id']));
		$success['nom']="Votre Nom a été mis à jour";
		$_SESSION['nom']=$nom;
	}
	if (isset($_POST['sexe']) AND !empty($_POST['sexe']) AND $_POST['sexe'] !=$utilisateurs['sexe']) {
		$sexe=$_POST['sexe'];
		$insertpseudo=$pdo->prepare('UPDATE utilisateurs SET sexe=? WHERE id=?');
		$insertpseudo->execute(array($sexe,$_SESSION['id']));
		$success['sexe']="Votre Sexe a été mis à jour";
		$_SESSION['sexe']=$sexe;
	}
	if (isset($_POST['email']) AND !empty($_POST['email']) AND $_POST['email'] !=$utilisateurs['email']) {
		$email=htmlspecialchars($_POST['email']);
		$insertnom=$pdo->prepare('UPDATE utilisateurs SET email=? WHERE id=?');
		$insertnom->execute(array($email,$_SESSION['id']));
		$success['email']="Votre Email a été mis à jour";
		$_SESSION['email']=$email;
	}
	if (isset($_POST['numero']) AND !empty($_POST['numero']) AND $_POST['numero'] !=$utilisateurs['numero']) {
		$numero=htmlspecialchars($_POST['numero']);
		$insertnom=$pdo->prepare('UPDATE utilisateurs SET numero=? WHERE id=?');
		$insertnom->execute(array($numero,$_SESSION['id']));
		$success['numero']="Votre Numéro a été mis à jour";
		$_SESSION['numero']=$numero;
		
	}
	if (isset($_POST['adresse']) AND !empty($_POST['adresse']) AND $_POST['adresse'] !=$utilisateurs['adresse']) {
		$adresse=htmlspecialchars($_POST['adresse']);
		$insertphone=$pdo->prepare('UPDATE utilisateurs SET adresse=? WHERE id=?');
		$insertphone->execute(array($adresse,$_SESSION['id']));
		$success['adresse']="Votre Adresse a été mis à jour";
		$_SESSION['adresse']=$adresse;
	}
	if (isset($_POST['pays']) AND !empty($_POST['pays']) AND $_POST['pays'] !=$utilisateurs['pays']) {
		$pays=htmlspecialchars($_POST['pays']);
		$pays=filter_var($pays);
		$insertemail=$pdo->prepare('UPDATE utilisateurs SET pays=? WHERE id=?');
		$insertemail->execute(array($pays,$_SESSION['id']));
		$success['pays']="Votre Pays a été mis à jour";
		$_SESSION['pays']=$pays;
	}

	}

	
}

