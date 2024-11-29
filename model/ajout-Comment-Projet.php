<?php
    $id=$_GET['id'];
	if (isset($_POST['save'])) {

       $message=htmlspecialchars($_POST['message']);
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("INSERT INTO interesse(message,id_proj)VALUES(?,?)");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($message,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert("Enregistrement effectuée avec succès!")   
        </script>
        <script>
            window.open('./setting-projet.php','_self')
        </script>
            <?php
            exit(); 
            }