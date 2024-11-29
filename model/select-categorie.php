<?php 
	
        //Pagination nom_produitbre d'element par page   
        
      $req="SELECT * FROM categorie";
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $categ=$data;