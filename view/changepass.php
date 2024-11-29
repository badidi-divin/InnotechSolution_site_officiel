<?php 
	session_start();
	if (isset($_SESSION['pseudo'])) {
		header("location:profile.php");
	}
	require_once('../bdd/connexion.php');
	require_once('../model/forget2.php');
	
 ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<?php require_once('header.php'); ?>
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="#">
						<img src="../includes/images/1.png" alt="" width="100px" height="150px" />
					</a>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="vendors/images/forgot-password.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Renseigner le Nouveau mot de Passe</h2>
							</div>
							<form method="post" action="">
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
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Entrer le Nouveau Mot de Passe" name="a" required="required"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Confirmer le Mot de Passe" name="b" required="required"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Changer le Mot de Passe</button>
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											Ou
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-primary btn-lg btn-block"
												href="login.php"
												>Se Connecter</a
											>
										</div>
									</div>
								</div>
							</form>
							<?php
								if (isset($erreur)) {
									echo "<font color='red'>".$erreur."</font>";
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
