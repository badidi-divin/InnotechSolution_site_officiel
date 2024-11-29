<?php 
    $id=$_GET['id'];
	$requser=$pdo->prepare("SELECT * FROM pdf WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();

    $categ=$userinfo['categorie'];

	if (isset($_POST['save'])) {

       $file_name=$_FILES['pdf']['name'];

       if ($file_name=='') {

        $nom=htmlspecialchars($_POST['nom']);
        $description=htmlspecialchars($_POST['description']);
        $categorie=htmlspecialchars($_POST['categorie']);

        $req=$pdo->prepare("UPDATE pdf SET nom=?,description=?,categorie=? WHERE id=?");
        $req->execute(array($nom,$description,$categorie,$id));
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert('Modification Effectuée avec Succès!')
        </script>
        <script>
            window.open('./setting-pdf.php','_self')
        </script>;
        <?php
            exit(); 
        }else{
        $file_extension=strrchr($file_name, ".");
        $file_tmp_name=$_FILES['pdf']['tmp_name'];
        $file_dest='../includes/pdf/'.$file_name;

        $extensions_autorisees=array('.pdf', '.PDF');
        $nom=htmlspecialchars($_POST['nom']);
        $description=htmlspecialchars($_POST['description']);
        $categorie=htmlspecialchars($_POST['categorie']);

        $errors=array();

            if (in_array($file_extension, $extensions_autorisees)) {
            if(move_uploaded_file($file_tmp_name, $file_dest)){
            $req=$pdo->prepare("UPDATE pdf SET nom=?,description=?,categorie=?,pdf=?,chemin=? WHERE id=?");
            $req->execute(array($nom,$description,$categorie,$file_name,$file_dest,$id));
            // Pour recuperer l'id du user
            ?>
            <script type="text/javascript">
                alert('Modifié avec Succès!')
            </script>
            
            <script>
                window.open('./setting-pdf.php','_self')</script>;
            <?php

            exit(); 

            }else{
                $errors['pdf']="Une erreur est survenue lors de l'envoie du fichier";
            }

            }else{
            $errors['pdf']= "Seuls les fichiers PDF sont autorisés";
        }
       }
        }
    
    
  
