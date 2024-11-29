<?php 
	session_start();

	if (isset($_SESSION['pseudo'])) {
		header("location:profile.php");
	}
	require_once('../model/cookie-config.php');
	require_once('../bdd/connexion.php');
	require_once('../model/login.php');
	
 ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<?php require_once('header.php'); ?>
	</head>
	<body class="login-page">
<!-- 		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="#">
						<img src="../includes/images/5.jpg" alt="" width="
						70px" height="80px" />
					</a>
				</div>
			</div>
		</div> -->
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="vendors/images/login-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title" align="center">
								<h2 class="text-center text-primary">SE CONNECTER</h2>
								<img src="../includes/images/5.jpg" alt="" width="
						70px" height="80px" />
							</div>
							<form method="post" action="">
								<div class="input-group custom">
									<input
										type="email"
										class="form-control form-control-lg"
										placeholder="Email" name="email"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Mot de passe" name="mdp"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input
												type="checkbox"
												class="custom-control-input"
												id="customCheck1" name="rememberme"
											/>
											<label class="custom-control-label" for="customCheck1"
												>Se Souvenir de Moi</label
											>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password">
											<a href="Mot-de-passe-oublie.php">Mot de passe oublié?</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Se Connecter</button>
											<a
												class="btn btn-outline-success btn-lg btn-block"
												href="creer-compte.php"
												>Créer un compte</a
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
