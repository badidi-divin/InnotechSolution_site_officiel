 <?php

/*********************Emploie**********************************************/
    function getblog(){
    	require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM blog ORDER BY id DESC');
		$req->execute();
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
    }
 //************** Fonction qui recupère ************************
	function getblogs($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM blog WHERE id=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		
			$req->closeCursor();
	}
// ********************Commentaire blog ********************************
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_blog($Id_article, $auteur, $comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_blog(id_article,auteur,comment, dates) VALUES (?,?,?,NOW())');
		$req->execute(array($Id_article, $auteur, $comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_blog($id)
	{
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_blog WHERE id_article=? ORDER BY id DESC');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}
// ******************************Fonction pour la rubrique Membres******
	//************** Fonction qui recupère ************************
	function getmembres($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM utilisateurs WHERE id=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		else
			header('location:membres.php');
			$req->closeCursor();
	}
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_membres($id_users, $auteur, $comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_membres(id_users,auteur,comment, dates) VALUES (?,?,?,NOW())');
		$req->execute(array($id_users, $auteur, $comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_membres($id)
	{
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_membres WHERE id_users=?');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}
// ********************************Fonction pour Financer un projet*********
	//************** Fonction qui recupère ************************
	function getprojet($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM projet WHERE id_projet=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		else
			header('location:Financer_projet.php');
			$req->closeCursor();
	}
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_projet($id_projet, $auteur, $comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_projet(id_projet,auteur,comment,dates) VALUES (?,?,?,NOW())');
		$req->execute(array($id_projet,$auteur,$comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_projet($id)
	{
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_projet WHERE id_projet=?');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}

/************************Entreprise***********************************/

	function getentreprise($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM entreprise WHERE id_entreprise=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		else
			header('location:entreprise.php');
			$req->closeCursor();
	}
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_entreprise($id_entreprise, $auteur, $comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_entreprise(id_entreprise,auteur,comment,dates) VALUES (?,?,?,NOW())');
		$req->execute(array($id_entreprise,$auteur,$comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_entreprise($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_entreprise WHERE id_entreprise=?');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}
// ****************************Vente****************************************************
		function getvente($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM vente WHERE id_vente=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		else
			header('location:vente.php');
			$req->closeCursor();
	}
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_vente($id_produit,$nom,$pays,$adresse,$reseau,$email,$numero,$montant,$comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_produit(id_produit,nom,pays,adresse,reseau,email,numero,montant,comment,dates) VALUES (?,?,?,?,?,?,?,?,?,NOW())');
		$req->execute(array($id_produit,$nom,$pays,$adresse,$reseau,$email,$numero,$montant,$comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_vente($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_produit WHERE id_produit=?');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}
// *********************************Offre d'emploie**********************
		function getemploie($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM emploi WHERE id=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		else
			header('location:emploie.php');
			$req->closeCursor();
	}
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_emploie($id_emploie, $auteur, $comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_emploie(id_emploie,auteur,comment,dates) VALUES (?,?,?,NOW())');
		$req->execute(array($id_emploie,$auteur,$comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_emploie($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_emploie WHERE id_emploie=?');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}

// *********************************Evenement**********************
		function getevent($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM evenement WHERE id=?');
		$req->execute(array($id));
		if ($req->rowCount()==1) {
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		else
			header('location:.php');
			$req->closeCursor();
	}
// FONCTION QUI AJOUTE UN COMMENTAIRE
	function addComment_event($id_event, $auteur, $comment){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('INSERT INTO comment_event(id_event,auteur,comment,dates) VALUES (?,?,?,NOW())');
		$req->execute(array($id_event,$auteur,$comment));
		$req->closeCursor();
	}
// FONCTION QUI RECUPERE LE COMMENTAIRE D'UN ARTICLE
	function getComments_event($id){
		require('../bdd/connexion.php');
		$req=$pdo->prepare('SELECT * FROM comment_event WHERE id_event=?');
		$req->execute(array($id));
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		return $data;
		$req->closeCursor();
	}


	?>