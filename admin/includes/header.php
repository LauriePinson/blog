<!DOCTYPE html> <!--début de la déclaration pour tous les documents du blog-->
<html>
	<head>
	<meta charset="UTF-8"/>
	<title><?php echo $title; ?></title> <!--variable "page d'authentification"-->
	<link rel="stylesheet" href="includes/style.css" />
	</head>
		<body> <!--fin de déclaration pour tous les documents, on incluera header.php dans les autres documents-->
			
			<!--lien deconnexion-->
			<nav class="menu">
				<ul>
				
				
				<li><a href="index.php">accueil</a></li>
				<li><a href="gestion_articles.php">Gestion des articles</a></li>
				<?php if (isset($_SESSION) &&($_SESSION['user'])) { ?>
					<li><a href="?action=deconnexion">Deconnexion</a></li>
				<?php } ?>
				</ul>
			</nav>
				 