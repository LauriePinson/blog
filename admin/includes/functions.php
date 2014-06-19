<?php

//connexion à la Data Base 
 
function connectDB($host, $username, $password, $db) {
	$connect = mysql_connect ($host, $username, $password);
	mysql_select_db($db, $connect); 
}

function login ($username, $password) {
	$query = mysql_query("SELECT id user, username FROM users WHERE username ='" .
	$username ."'AND password = '" . sha1($password . 'BlogLaurie') . "'");
	
	$row =mysql_fetch_assoc($query);
	
	if ($row !== false) {
	return $row;
	}
	
	return false;
}	
