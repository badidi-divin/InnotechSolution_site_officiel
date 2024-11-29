<?php
	$id=$_GET['id'];
   $requete="SELECT * FROM interesse WHERE id_proj='$id'";                  

   $ps=$pdo->query($requete);