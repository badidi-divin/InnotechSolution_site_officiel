<?php 
	$cat=isset($_GET['id'])?$_GET['id']:"";
	$mc="";
        //Pagination titre_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM projet WHERE Titre_projet LIKE '%$mc%' AND affiche='1' ORDER BY id_projet DESC";
      }
      else
      {
        $req="SELECT * FROM projet WHERE  affiche=1 ORDER BY id_projet DESC";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $projet=$data;