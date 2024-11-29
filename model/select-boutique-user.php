<?php
	$id=$_SESSION['id'];
   $requete="SELECT * FROM boutique WHERE id_utilisateurs='$id'";                  

   $ps=$pdo->query($requete);