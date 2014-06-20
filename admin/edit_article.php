<?php
	$title = "modifier un article";
	
	require_once("includes/authenticated.php");
	require_once("includes/actions.php");
	include_once("includes/header.php");
	
	$query = mysql_query("SELECT title, text FROM articles WHERE id_articles=" . mysql_real_escape_string($_GET['id_article'])) or die(mysql_error());
	$article = mysql_fetch_assoc($query);
	
	if ($article === false) {
		header("location:gestion_articles.php");
		
		}

require_once('views/edit_articles.view.php');
include_once('includes/footer.php'); 
 
 ?>
