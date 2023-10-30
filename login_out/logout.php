<?php
	session_start();
	unset($_SESSION["id"]);
	
	header("Location:/withChicken/main/main.php");
?>