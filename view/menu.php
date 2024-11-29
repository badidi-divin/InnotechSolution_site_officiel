<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						
						<li class="dropdown">
							<?php if ($_SESSION['photo']=='' || $_SESSION['numero']=='') {
							?>
						<div class="alert alert-danger">
							<a href="profile.php" style="color: red;">Complétés votre Profile</a>
						</div>
							<?php
						} 
						 ?>
							<a href="blog.php" class="dropdown-toggle">
								<span class="micon bi bi-house"></span
								><span class="mtext">Accueil</span>
							</a>
		
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-textarea-resize"></span
								><span class="mtext">le Prof</span>
							</a>
							<ul class="submenu">
								<li>
									<a href="service.php">Services et Formations</a>
								</li>
								<li>
									<a href="reduction.php" title="Voir votre niveau de Réduction">Réductions</a>
								</li>
<!-- 								<li>
									<a href="cours-videos.php" title="Voir votre niveau de Réduction">Tutoriels Vidéos</a>
								</li> -->
								<!-- <li>
									<a href="reduction.php" title="Voir votre niveau de Réduction">Cours Pdf</a>
								</li> -->
								<li><a href="Contactez-Nous.php">Contactez-Nous</a></li>
								<li><a href="a-propos.php">A Propos de Nous</a></li>							
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-textarea-resize"></span
								><span class="mtext">Documentation</span>
							</a>
							<ul class="submenu">
								<li><a href="liens-user.php">Liens </a></li>
								<li><a href="livre.php">Livre</a></li>
								<li><a href="Tutoriels.php">Tutoriels vidéos </a></li>
							</ul>
						</li> 
							<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-textarea-resize"></span
								><span class="mtext">Entreprenariat</span>
							</a>
							<ul class="submenu">
								<li><a href="projet-user.php">Projet</a></li>
								<li><a href="vendre.php" title="Trouver des produits en vente facilement">Zando</a></li>
								<li><a href="Tutoriels.php">Tutoriels vidéos </a></li>
							</ul>
						</li> 
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-person"></span
								><span class="mtext">Paramètre</span>
							</a>
							<ul class="submenu">
								<li><a href="Contactez-Nous.php">Supprimer compte</a></li>
								<li><a href="Contactez-Nous.php" >Signaler un problème</a></li>
								<li><a href="modf-password.php">Changer le Mot de Passe</a></li>
								<li><a href="faq.php" title="Besoin d'aide ?">FAQ</a></li>
								<li><a href="../includes/pdf/Politique-de-confidentialite-type_FR.pdf" target="_blank">Politique de Confidentialité</a></li>
							</ul>
						</li>
						<?php if ($_SESSION['pseudo']=='divin BADIDI'): ?>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-person"></span
								><span class="mtext">Admin</span>
							</a>
							<ul class="submenu">
								<li><a href="user.php" title="Liste des Utilisateurs?">Utilisateurs</a></li>
								<li><a href="categorie.php">Catégorie article</a></li>
								<li><a href="reduction-admin.php">Reduction</a></li>
								<li><a href="article.php">Article Blog</a></li>
								<li><a href="contact-admin.php">Contact</a></li>
								<li><a href="setting-service.php">Services</a></li>
								<li><a href="setting-faq.php">FAQ</a></li>
								<li><a href="setting-categ.php">Catégorie Vidéos</a></li>
								<li><a href="setting-video.php">Vidéos</a></li>
								<li><a href="setting-liens.php">Liens</a></li>
								<li><a href="setting-pdf.php">Pdf</a></li>
								<li><a href="setting-tuto.php">Tutoriel Vidéos</a></li>
								<li><a href="setting-projet.php">Projet</a></li>
								<li><a href="setting-boutique.php">Boutique</a></li>
							</ul>
						</li>
						<?php endif ?>
						
			
					</ul>
				</div>
			</div>