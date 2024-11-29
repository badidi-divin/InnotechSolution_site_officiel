<?php

  if (isset($_POST['save'])) {

  	$nom_produit=htmlspecialchars($_POST['nom_produit']);
  	$description_produit=htmlspecialchars($_POST['description_produit']);
  	$prix=htmlspecialchars($_POST['prix']);
  	$prix_avant=htmlspecialchars($_POST['prix_avant']); 
 
	$tmpName=$_FILES['image']['tmp_name'];
	$name=$_FILES['image']['name'];
	$size=$_FILES['image']['size'];
	$error=$_FILES['image']['error'];
	$type=$_FILES['image']['type'];
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
					move_uploaded_file($tmpName,'../includes/boutique/'.$fileName);

			$ps=$pdo->prepare("INSERT vente(nom_produit,description_produit,prix,prix_avant,image,user)VALUES(?,?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom_produit,$description_produit,$prix,$prix_avant,$fileName,$id);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);

		    ?>
			<script type="text/javascript">
				alert('Votre contenus a été ajouté, prière de mettre de contenus respectable et serieux,sinon le contenu sera supprimé!')
			</script>
			<script>
				window.open('publier-boutique.php','_self')
			</script>
			<?php

			exit();	

				}
				else
				{
					$erreur= "erreur nous ne pouvons pas uploader ce fichier!";
				}
				
			}
			else
			{
				$erreur= "taille trop importante Maximum 4Go";
			}		
		}
		else{
			$erreur= "Mauvaise Extension";
		} 
	
	}