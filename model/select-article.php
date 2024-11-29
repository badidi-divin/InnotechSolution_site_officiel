<?php
	$mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	$size=isset($_GET['size'])? $_GET['size']:10;
	$page=isset($_GET['page'])? $_GET['page']:1; 
	$offset=($page-1)*$size;

	$requete="SELECT * FROM blog WHERE nom LIKE '%$mot1%' LIMIT $size offset $offset";	
	$requeteCount="SELECT COUNT(*) countF FROM blog WHERE nom LIKE '%$mot1%'";
	
	
	$resultat=$pdo->query($requete);
	$resultatCount=$pdo->query($requeteCount);
	$tabCount=$resultatCount->fetch();
	$nbreFiliere=$tabCount['countF'];
	$reste=$nbreFiliere % $size;

	if($reste===0)
		$nbrePage=$nbreFiliere/$size;
	else
		$nbrePage=floor($nbreFiliere/$size)+1;