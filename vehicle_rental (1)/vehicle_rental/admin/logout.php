<?php
	session_start();
	unset($_SESSION['admin_uname']);
	unset($_SESSION['admin_pass']);
	header("location: ../index.php");
?>