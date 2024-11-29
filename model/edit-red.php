<?php 
    $id=$_GET['id'];

	$requser=$pdo->prepare("SELECT * FROM reduction WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();
    $categ=$userinfo['id_user'];

	if (isset($_POST['save'])) {
       $id_user=htmlspecialchars($_POST['id_user']);
       $prix=htmlspecialchars($_POST['prix']);
            //Création de l'objet prepare et envoie de la requête
            $ps=$pdo->prepare("UPDATE reduction SET id_user=?,prix=? WHERE id=?");
            //Pour bien recupere les données on crée un table de parametre
            $params=array($id_user,$prix,$id);
            //Execution de la requête par leur paramètre en ordre 
            $ps->execute($params);
            // Pour recuperer l'id du user
            ?>
            <script type="text/javascript">
                alert('Reduction Modifiée!')
            </script>
            <script>
                window.open('reduction-admin.php','_self')
            </script>
            <?php

            exit(); 
                
    
    }
  
    

       