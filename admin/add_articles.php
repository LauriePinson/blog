<?php
	$title = "Ajouter un article";
	
	require_once("includes/authenticated.php");
	include_once("includes/actions.php");
	
	$articleTitle = '';
	$articleText = '';
	
	if (isset($_POST['action']) && $_POST['action'] === 'form_articles') {
		$articleTitle = $title = $_POST['title'];
		$articleText = $text = $_POST['text'];
		
		$messages = array();
		if (empty($title)) {
			$messages['title'] = 'Veuillez saisir un titre';
		}
		if (empty($text)) {
			$messages['text'] = 'Veuillez saisir un texte';
		}


		if (count($messages) === 0){
			mysql_query("INSERT INTO articles   (title,text,date,user) VALUES('" . mysql_real_escape_string($title) . "', '" . mysql_real_escape_string($text) ."', NOW(), " . $_SESSION['user']['id'] . ")") or die (mysql_error());
		exit;
			header("Location: gestion_articles.php");
		}
	}
	
	include_once("includes/header.php");
	include_once("includes/footer.php");
	include_once("views/add_articles.view.php");
	
?> 



