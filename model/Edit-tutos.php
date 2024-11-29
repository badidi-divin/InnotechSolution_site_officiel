<?php
	$id=$_GET['id'];
	$requser=$pdo->prepare("SELECT * FROM tutos WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();
	$categ=$userinfo['categorie'];
	// Uploader photo
	if (isset($_POST['save'])) {
		$nom=htmlspecialchars($_POST['nom']);
		$description=htmlspecialchars($_POST['description']);
		$categorie=htmlspecialchars($_POST['categorie']);
		$video_name=$_FILES['chemin']['name'];
		$tmp_name=$_FILES['chemin']['tmp_name'];
		$error=$_FILES['chemin']['error'];

		if ($video_name=='') {
			
				$ps=$pdo->prepare("UPDATE tutos SET nom=?,description=?,categorie=? WHERE id=?");
				//Pour bien recupere les données on crée un table de parametre
				$params=array($nom,$description,$categorie,$id);
				$ps->execute($params);
			    ?>
			<script type="text/javascript">
				alert('Tutoriel Modifiée avec Succès!')
			</script>
			<script>
				window.open('setting-tuto.php','_self')
			</script>
			<?php

			exit();		

		} else {

			if ($error===0) {
			$video_ex=pathinfo($video_name, PATHINFO_EXTENSION);
			$video_ex_lc=strtolower($video_ex);

			$allowed_exs=array("mp4",'webm','avi','flv');
			if (in_array($video_ex_lc, $allowed_exs)) {
				$new_video_name=uniqid("video-",true).'.'.$video_ex_lc;
				$video_upload_path='../includes/tutos/'.$new_video_name;
				move_uploaded_file($tmp_name, $video_upload_path);
				$ps=$pdo->prepare("UPDATE tutos SET nom=?,description=?,chemin=?,categorie=? WHERE id=?");
				//Pour bien recupere les données on crée un table de parametre
				$params=array($nom,$description,$new_video_name,$categorie,$id);
				$ps->execute($params);
			    ?>
			<script type="text/javascript">
				alert('Tutoriel Modifiée avec Succès!')
			</script>
			<script>
				window.open('setting-tuto.php','_self')
			</script>
			<?php

			exit();	

			}	

			}
			else
			{
				$errors="Tu n'es peux pas uploader ce type de Fichier!";
			}
		}
		

		

		}
		
