<?php 
    $requser=$pdo->prepare("SELECT * FROM faq WHERE id=?");
    $requser->execute(array($_GET['id']));
    $userinfo=$requser->fetch();

    if (isset($_POST['save'])) {

         $titre=htmlspecialchars($_POST['titre']);
        $description=htmlspecialchars($_POST['description']);
            //Création de l'objet prepare et envoie de la requête
            $ps=$pdo->prepare("UPDATE faq SET titre=?,description=? WHERE id=?");
            //Pour bien recupere les données on crée un table de parametre
            $params=array($titre,$description,$_GET['id']);
            //Execution de la requête par leur paramètre en ordre 
            $ps->execute($params);
            // Pour recuperer l'id du user
            ?>
            <script type="text/javascript">
                alert('Votre FAQ a été mis à jour!')
            </script>
            <script>
                window.open('setting-faq.php','_self')
            </script>
            <?php

            exit(); 

        }

?>
                
    

       