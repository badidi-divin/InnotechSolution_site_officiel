<?php

   if (isset($_POST['save'])) {

    	$file_name=$_FILES['pdf']['name'];

		$file_extension=strrchr($file_name, ".");

		$file_tmp_name=$_FILES['pdf']['tmp_name'];
		$file_dest='../includes/pdf/'.$file_name;

		$extensions_autorisees=array('.pdf', '.PDF');
		$nom=htmlspecialchars($_POST['nom']);
		$description=htmlspecialchars($_POST['description']);
		$categorie=htmlspecialchars($_POST['categorie']);

		$errors=array();

			if (in_array($file_extension, $extensions_autorisees)) {
			if(move_uploaded_file($file_tmp_name, $file_dest)){
			$req=$pdo->prepare("INSERT INTO pdf SET nom=?,description=?,categorie=?,pdf=?,chemin=?");
			$req->execute(array($nom,$description,$categorie,$file_name,$file_dest));
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Enregistrement Effectuer avec Succès!')
			</script>
			
			<script>window.open('./setting-pdf.php','_self')</script>;
			<?php

			exit();	
			}else{
				$errors['pdf']="Une erreur est survenue lors de l'envoie du fichier";
			}

			}else{
			$errors['pdf']= "Seuls les fichiers PDF sont autorisés";
		}
			
		}
	
	
  
