<?php

   if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $titre=htmlspecialchars($_POST['titre']);
    $description=htmlspecialchars($_POST['description']);
  		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO faq(titre,description)VALUES(?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($titre,$description);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Votre FAQ a été ajouter!')
			</script>
			<script>
				window.open('setting-faq.php','_self')
			</script>
			<?php

			exit();	
				
	
	}
  
