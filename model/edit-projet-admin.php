<?php
	$requser=$pdo->prepare("SELECT * FROM projet WHERE id_projet=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();

	if (isset($_POST['save'])) {

       $titre=htmlspecialchars($_POST['titre']);
        $description=htmlspecialchars($_POST['description']);
        $etat=htmlspecialchars($_POST['etat']);
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE projet SET Titre_projet=?,Description=?,affiche=? WHERE id_projet=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($titre,$description,$etat,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert("Modification effectuée avec succès!")   
        </script>
        <script>
            window.open('./setting-projet.php','_self')
        </script>
            <?php
            exit(); 
            }