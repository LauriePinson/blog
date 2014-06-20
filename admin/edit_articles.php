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

		$articleTitle = $article['title'];
		$articleText = $article('text'];
		
		if (isset($_POST['action']) && $_POST['action'] === 'form_articles') {
	$articleTitle = $title = $_POST['title'];
	$articleText = $text = $_POST['text'];
	$idArticle = $_GET['id_article'];
	
	$messages = array();
	if (empty($title)) {
		$messages['title'] = 'Veuillez saisir un titre';
	}
	if (empty($text)) {
		$messages['text'] = 'Veuillez saisir un texte';
	}

	if (count($messages) === 0){
	mysql_query("UPDATE articles SET title='" . mysql_real_escape_string($title) . "', text='" . mysql_real_escape_string($text) ."' WHERE id_articles=" . mysql_real_escape_string($idArticle)) or die (mysql_error());
		header("Location: gestion_articles.php");
	}
}
		
require_once('views/edit_articles.view.php');
include_once('includes/footer.php'); 
 
 ?>
