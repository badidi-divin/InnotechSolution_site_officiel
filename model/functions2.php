<?php 
	// **********************Service***************************************
	/*********************Emploie**********************************************/
    function getservice(){
    	require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM service ORDER BY id DESC');
		$req->execute();
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
    }
 //************** Fonction qui recupère ************************
	function getservices($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM service WHERE id=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		
			$req->closeCursor();
	}
// ********************Commentaire blog ********************************
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_service($Id_article, $auteur, $comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_service(id_article,auteur,comment, dates) VALUES (?,?,?,NOW())');
		$req->execute(array($Id_article, $auteur, $comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_service($id)
	{
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_service WHERE id_article=? ORDER BY id DESC');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}