<?php

//inclusion fichier config

$config = require('config.php');
require_once ('functions.php');

//connection DB

$configDB=$config['db'];
connectDB ($configDB['host'], $configDB['username'], $configDB['password'], $configDB['db']);


$logins = array(
	array ('username' => 'laurie', 'password' => 'testpass'),
	array ('username' => 'login2', 'password' => 'pass2')
);

if (isset ($_POST[ "action"]) && $_POST ["action"] === "login") {
	$username = $_POST[ "username"];
	$password = $_POST[ "password"]; 
	
	$login = false ;
	$i = 0;
	while ($i < count ($logins) && $login === false) {
		if (
			$logins[$i]['username'] === $username && 
			$logins[$i]['password'] === $password
		) {
			$login = $logins[$i]; // tant que mon i est < 
		}	
		
		$i++;
	}
	if ($login === false) {
		echo 'Saisie incorrecte';
	}
	else {
		session_start();
		$_SESSION['user'] = $login['username'];
		header("Location:index.php");//pas fini d'écrire
	}
}
if (isset($_GET['action'])&& $_GET['action'] === 'deconnexion') {
	unset ($_SESSION['user']);
	header ("Location: login.php");
	}
	
if (isset($_POST['action']) && $_POST['action'] === 'add_article') {
	$title = $_POST['title'];
	$text = $_POST['text'];
	
	$messages = array();
	if (empty($title)) {
		$messages['title'] = 'Veuillez saisir un titre';
	}
	if (empty($text)) {
		$messages['text'] = 'Veuillez saisir un texte';
	}


if (count($messages) === 0){
	mysql_query("INSERT INTO articles   (title,text,date) VALUES('" . mysql_real_escape_string($title) . "', '" . mysql_real_escape_string($text) ."', NOW())");
		header("Location: gestion_articles.php");
	}
}

//note: ajouter un backslash(\) pour les apostrophes dans les chaines de caractères pour que php comprenne que ce n'est pas une fermeture de quote (comme ceci: c\'est//)




	