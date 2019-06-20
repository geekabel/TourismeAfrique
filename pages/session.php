<?php
	session_start();
	if(!isset($_SESSION['user'])){	//si la variable $_SESSION['user'] n'existe pas
		header('location:login.php');
		exit();
	}
?>