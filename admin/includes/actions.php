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
		$_SESSION['user'] = array("id"=>$login['id_user'],"username"=>$login['username']);
		header("Location:index.php");//pas fini d'écrire
	}
}
if (isset($_GET['action'])&& $_GET['action'] === 'deconnexion') {
	unset ($_SESSION['user']);
	header ("Location: login.php");
	}
	


//note: ajouter un backslash(\) pour les apostrophes dans les chaines de caractères pour que php comprenne que ce n'est pas une fermeture de quote (comme ceci: c\'est//)




	