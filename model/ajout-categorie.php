<?php

   if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $designation=htmlspecialchars($_POST['designation']);
  		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO categorie(designation)VALUES(?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($designation);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Votre Catégorie a été ajouter!')
			</script>
			<script>
				window.open('categorie.php','_self')
			</script>
			<?php

			exit();	
				
	
	}
  
