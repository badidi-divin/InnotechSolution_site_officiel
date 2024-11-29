<?php 
	$cat=isset($_GET['id'])?$_GET['id']:"";
	$mc="";
        //Pagination titre_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM faq WHERE titre LIKE '%$mc%' ORDER BY id DESC";
      }
      else
      {
        $req="SELECT * FROM faq ORDER BY id DESC";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $faq=$data;