<?php

session_start();

if (isset($_SESSION ['username'])) {

    $_SESSION['msg'] = "You must login to view this page";
    header("location: login.html");

	}

	if (isset($_GET['logout'])) {

		session_destroy();
		$_SESSION['username'];
		header("location :login.html");
		
	}

?>