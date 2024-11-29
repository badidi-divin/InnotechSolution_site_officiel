<?php

  if (isset($_POST['save'])) {

  	$nom=htmlspecialchars($_POST['nom']);
  	$description=htmlspecialchars($_POST['description']);
  	$categorie=htmlspecialchars($_POST['categorie']);

	$tmpName=$_FILES['photo']['tmp_name'];
	$name=$_FILES['photo']['name'];
	$size=$_FILES['photo']['size'];
	$error=$_FILES['photo']['error'];
	$type=$_FILES['photo']['type'];
	$errors=array();

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
					move_uploaded_file($tmpName,'../includes/images/'.$fileName);

			$ps=$pdo->prepare("INSERT service(nom,description,categorie,image)VALUES(?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom,$description,$categorie,$fileName);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);

		    ?>
			<script type="text/javascript">
				alert('Votre Service a été ajouter!')
			</script>
			<script>
				window.open('setting-service.php','_self')
			</script>
			<?php

			exit();	

				}
				else
				{
					$errors['photo']= "erreur nous ne pouvons pas uploader ce fichier!";
				}
				
			}
			else
			{
				$errors['photo']= "taille trop importante Maximum 4Go";
			}		
		}
		else{
			$errors['photo']= "Mauvaise Extension";
		} 
	
	}