<?php 
	require_once('../bdd/connexion.php');
	$cat=isset($_GET['id'])?$_GET['id']:"";
	$mc="";
        //Pagination nom_boutique_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM boutique WHERE nom_boutique LIKE '%$mc%' AND affiche='1' ORDER BY id_boutique DESC";
      }
      else
      {
        $req="SELECT * FROM boutique WHERE affiche='1' ORDER BY id_boutique DESC";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $boutique=$data;