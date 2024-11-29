<?php
	$id=$_SESSION['id'];
   $requete="SELECT * FROM boutique";                  

   $ps=$pdo->query($requete);