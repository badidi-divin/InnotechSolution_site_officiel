<?php session_start(); 
	require_once('../bdd/connexion.php');
	require_once('../model/cookie-config.php');
	require_once('securite.php');
	require_once('../model/profile-edit.php');
?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<body>
		

		<?php require_once('head2.php');

		?>
		<?php require_once('theme.php'); ?>

		<?php  require_once('menu-sidebar.php'); ?>
		<div class="mobile-menu-overlay">
			
		</div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Profile</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="blog.php">Accueil</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Profile
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="pd-20 card-box height-100-p">
								<div class="profile-photo">
									<a
										href="modal"
										data-toggle="modal"
										data-target="#modal"
										class="edit-avatar"
										title="Ajouter une photo de profile"
										><i class="fa fa-pencil"></i
									>

								</a>
									<?php if (!$_SESSION['photo']=='') {
									?>
									<a target="_blank" href="../includes/Avatar_compte/<?= $_SESSION['photo'] ?>"><img src="../includes/Avatar_compte/<?= $_SESSION['photo'] ?>" alt="" width="400px"  height="400px"/> </a> 
												<?php	
											} ?>
									
									<div
										class="modal fade"
										id="modal"
										tabindex="-1"
										role="dialog"
										aria-labelledby="modalLabel"
										aria-hidden="true"
									>
										<div
											class="modal-dialog modal-dialog-centered"
											role="document"
										>
											<div class="modal-content">
												<div class="modal-body pd-5">
													<div class="img-container">
													<?php if (!$_SESSION['photo']=='') {
															?>
															<img src="../includes/Avatar_compte/<?= $_SESSION['photo'] ?>" alt="" width="400px"  height="400px"/> 
															<?php	
														} ?>
													 <form method="post" action="" enctype="multipart/form-data">
													 	<input type="file" name="photo">
													</div>
												</div>
												<div class="modal-footer">
													<button
														type="submit"
														class="btn btn-primary"
														name="photosave"
													>
													Mettre à Jour
													</button>
													</form>
													<button
														type="button"
														class="btn btn-default"
														data-dismiss="modal"
													>
														Fermer
													</button>
												</div>
											</div>
										</div>
									</div>
								</div><br><br>
								<h5 class="text-center h5 mb-0"><?= $_SESSION['pseudo'] ?></h5>
								<div class="profile-info">
									<h5 class="mb-20 h5 text-blue">Mes Contacts</h5>
									<ul>
										<li>
											<span>Adresse Email:</span>
											<?= $_SESSION['email'] ?>
										</li>
										<li>
											<span>Telephone Whatsapp:</span>
											<?php 
												if ($_SESSION['numero']=='') {
													?>
												vide
													<?php
												}else{
													?>
												<?= $_SESSION['numero'] ?>
													<?php
												}
											 ?>
										</li>
										<li>
											<span>Pays:</span>
											<?= $_SESSION['pays'] ?>
										</li>
										<li>
											<span>Address:</span>
											<?= $_SESSION['adresse'] ?>
										</li>
									</ul>
								</div>
					
							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
							<div class="card-box height-100-p overflow-hidden">
								<div class="profile-tab height-100-p">
									<div class="tab height-100-p">
										
										<div class="tab-content">
											<!-- Timeline Tab start -->
												<div class="profile-setting">
													<?php
														if (!empty($errors)):
													?>
													<div class="alert alert-danger">
														<p></p>
															<ul>
																<?php foreach($errors as $error):?>
																	<li><?= $error; ?></li>
																<?php endforeach; ?>
															</ul>
														</div>

														<?php endif; ?>
													<?php
														if (!empty($success)):
													?>
													<div class="alert alert-success">
														<p></p>
															<ul>
																<?php foreach($success as $successs):?>
																	<li><?= $successs; ?></li>
																<?php endforeach; ?>
															</ul>
														</div>

														<?php endif; ?>
													<form method="post" action="">
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-6">
																<h4 class="text-blue h5 mb-20">
																	Edition du Profile
																</h4>
																<div class="form-group">
																	<label>Prénom</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" name="prenom" value="<?= $_SESSION['prenom']; ?>" required="required"
																	/>
																</div>
																<div class="form-group">
																	<label>Nom</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" value="<?= $_SESSION['nom']; ?>" name="nom" required="required"
																	/>
																</div>
																<div class="form-group">
																	<div class="radio">
																		<label for="sexe">Sexe:</label>
																		<label><input type="radio" name="sexe" value="Masculin" <?php if($sexe=="Masculin") echo "checked" ?>/>Masculin</label>
																		<label><input type="radio" name="sexe" value="Féminin" <?php if($sexe=="Féminin") echo "checked" ?>/> Féminin</label>
																	</div>
																</div>
																<div class="form-group">
																	<label>Email</label>
																	<input
																		class="form-control form-control-lg"
																		type="email" value="<?= $_SESSION['email']; ?>" name="email" required="required"
																	/>
																</div>
															</li>
															<li class="weight-500 col-md-6">
															
																<div class="form-group">
																	<label>Numéro Télephone(+) <img src="../includes/images/whatasapp.png" width="30px" height="50px"></label>
																	<input
																		class="form-control form-control-lg"
																		type="number" value="<?= $_SESSION['numero']; ?>" name="numero" placeholder="+243817767357"
																	/>
																</div>
																<div class="form-group">
																	<label>Adresse</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" value="<?= $_SESSION['adresse']; ?>" name="adresse" required="required"
																	/>
																</div>
																<div class="form-group">
																	<label>Pays</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" value="<?= $_SESSION['pays']; ?>" name="pays" required="required"
																	/>
																</div>
																<div class="form-group">
																	<label>Music Favorie</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" value="<?= $_SESSION['music']; ?>" name="music" required="required"
																	/>
																</div>
																<div class="form-group mb-0">
																	<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Mettre à jour</button>
																</div>
															</li>
														</ul>
													</form>
												</div>
											</div>
											<!-- Setting Tab End -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php'); ?>					
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/cropperjs/dist/cropper.js"></script>
		<script>
			window.addEventListener("DOMContentLoaded", function () {
				var image = document.getElementById("image");
				var cropBoxData;
				var canvasData;
				var cropper;

				$("#modal")
					.on("shown.bs.modal", function () {
						cropper = new Cropper(image, {
							autoCropArea: 0.5,
							dragMode: "move",
							aspectRatio: 3 / 3,
							restore: false,
							guides: false,
							center: false,
							highlight: false,
							cropBoxMovable: false,
							cropBoxResizable: false,
							toggleDragModeOnDblclick: false,
							ready: function () {
								cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
							},
						});
					})
					.on("hidden.bs.modal", function () {
						cropBoxData = cropper.getCropBoxData();
						canvasData = cropper.getCanvasData();
						cropper.destroy();
					});
			});
		</script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="#"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>

