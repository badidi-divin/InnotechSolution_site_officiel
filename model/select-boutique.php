<?php 
	$id=$_SESSION['id'];
	$requser=$pdo->prepare("SELECT * FROM boutique WHERE id_utilisateurs=?");
	$requser->execute(array($id));
	$userinfo=$requser->fetch();