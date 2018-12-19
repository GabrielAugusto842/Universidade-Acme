<?php

function verifSession(){
	
	if(!isset($_SESSION['aluno'])){
		echo("não existe");
		header("location:login.php");
	}
}

?>