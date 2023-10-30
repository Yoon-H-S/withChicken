<?php
	session_start();
	unset($_SESSION["admin_id"]);
	
	header("Location:/withChicken/admin/admin_login.php");
?>