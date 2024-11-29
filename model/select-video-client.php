<?php 
	$cat=isset($_GET['id'])?$_GET['id']:"";
	$mc="";
        //Pagination nom_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM video WHERE nom LIKE '%$mc%' AND categorie LIKE '%$cat%' ORDER BY id DESC";
      }
      else
      {
        $req="SELECT * FROM video WHERE categorie LIKE '%$cat%' ORDER BY id DESC";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $video=$data;