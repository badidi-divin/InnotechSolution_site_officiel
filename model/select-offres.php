<?php 
  session_start();

  require_once('../bdd/connexion.php');

   // Déconnection
  $user=$_SESSION['pseudo'];

   $mc="";

        //Pagination nom_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM emploi WHERE domaine LIKE '%$mc%' ORDER BY id DESC";
      }
      else
      {
        $req="SELECT * FROM emploi";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $emploie=$data;
