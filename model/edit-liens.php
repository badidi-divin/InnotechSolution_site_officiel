<?php 
	$requser=$pdo->prepare("SELECT * FROM liens WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();

    $categ=$userinfo['categorie'];

	if (isset($_POST['save'])) {

        $titre=htmlspecialchars($_POST['titre']);
        $description=htmlspecialchars($_POST['description']);
        $liens=htmlspecialchars($_POST['liens']);
        $categorie=htmlspecialchars($_POST['categorie']);

        $ps=$pdo->prepare("UPDATE liens SET titre=?,description=?,liens=?,categorie=? WHERE id=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($titre,$description,$liens,$categorie,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert("Modification effectuée avec succès!")   
        </script>
        <script>
            window.open('./setting-liens.php','_self')
        </script>
            <?php
            exit(); 
            }
    

       