<?php
	$id=$_SESSION['id'];
   $requete="SELECT * FROM projet WHERE user='$id'";                  

   $ps=$pdo->query($requete);