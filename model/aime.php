<?php
	require_once('../bdd/connexion.php');
	$user=$_GET['id_user'];
	$blog=$_GET['id_blog'];


	$requiser=$pdo->prepare("SELECT * FROM aime WHERE id_user=? AND id_blog=?");
	$requiser->execute(array($user,$blog));
	// rowCount permet de compter le nombre saisie par le user
	$userexist=$requiser->rowCount();

	if ($userexist==1) {
		$ps=$pdo->prepare("DELETE FROM aime WHERE id_user=? AND id_blog=?");
		$params=array($user,$blog);
		$ps->execute($params);
		header("location:../view/detailblog.php?id=".$blog);
		
	}else{
		$ps=$pdo->prepare("INSERT INTO aime(id_blog,id_user)VALUES(?,?)");
		 //Pour bien recupere les données on crée un table de parametre
		$params=array($blog,$user);
		 //Execution de la requête par leur paramètre en ordre 
		 $ps->execute($params);
		header("location:../view/detailblog.php?id=".$blog);
	}
	
	