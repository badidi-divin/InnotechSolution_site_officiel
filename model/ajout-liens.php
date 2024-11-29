<?php

   if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $titre=htmlspecialchars($_POST['titre']);
    $description=htmlspecialchars($_POST['description']);
    $liens=htmlspecialchars($_POST['liens']);
    $categorie=htmlspecialchars($_POST['categorie']);
  	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("INSERT INTO liens(titre,description,liens,categorie)VALUES(?,?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($titre,$description,$liens,$categorie);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
	<script type="text/javascript">
		alert('Votre liens a été ajouter!')
	</script>
	<script>
		window.open('setting-liens.php','_self')
	</script>
	<?php
	exit();	
	}
  
