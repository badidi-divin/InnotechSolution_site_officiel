<?php
  $id =$_GET['id'];
	$cat=isset($_GET['id_vente'])?$_GET['id_vente']:"";
	$mc="";
        //Pagination nom_produit_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM vente WHERE nom_produit LIKE '%$mc%' WHERE user='$id' ORDER BY id_vente DESC";
      }
      else
      {
        $req="SELECT * FROM vente WHERE user='$id' ORDER BY id_vente DESC";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $vente=$data;