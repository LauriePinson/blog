<?php

session_start();

if (!isset($_SESSION["user"])) {
	header("location: login.php");//on va envoyer une information dans le head, header est une fonction php
}