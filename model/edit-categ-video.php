<?php 
	$requser=$pdo->prepare("SELECT * FROM categ_video WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();

	if (isset($_POST['save'])) {

        $designation=htmlspecialchars($_POST['designation']);

        $ps=$pdo->prepare("UPDATE categ_video SET designation=? WHERE id=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($designation,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert("Modification effectuée avec succès!")   
        </script>
        <script>
            window.open('./setting-categ.php','_self')
        </script>
            <?php
            exit(); 
            }
    

       