<?php

	if(isset($_GET['logout'])){
		header('location:'.$_SESSION['requireUrl'].'login.php');
	}

    require_once("view/home.php");
?>