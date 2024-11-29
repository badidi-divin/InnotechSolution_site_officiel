<?php

   if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $id_user=htmlspecialchars($_POST['id_user']);
    $prix=htmlspecialchars($_POST['prix']);
  		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO reduction(id_user,prix)VALUES(?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($id_user,$prix);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Reduction accordée!')
			</script>
			<script>
				window.open('reduction-admin.php','_self')
			</script>
			<?php

			exit();	
				
	
	}
  
