<?php
	session_start();
	unset($_SESSION['client_id']);
	unset($_SESSION['email']);
	unset($_SESSION['pass']);
	header("location: index.php");
?>