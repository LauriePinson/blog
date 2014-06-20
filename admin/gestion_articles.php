<?php

	$title = 'Gestion des articles';
	
	require_once('includes/authenticated.php');
	require_once('includes/actions.php');
	
	$articles = mysql_query('SELECT id_articles, title, date FROM articles');
	
	$title = 'Gestion des articles'; 
	include_once('includes/header.php');
	require_once('views/gestion_articles.view.php');
	include_once('includes/footer.php');
	




