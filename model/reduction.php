<?php 
	$requser=$pdo->prepare("SELECT * FROM reduction WHERE id=?");
	$requser->execute(array($_SESSION['id']));
	$userinfo=$requser->fetch();