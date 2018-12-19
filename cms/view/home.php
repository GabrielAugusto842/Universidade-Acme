<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<link rel="stylesheet" type="text/css" href="view/css/style.css"> 
<link rel="stylesheet" type="text/css" href="view/css/header.css"> 
<link rel="stylesheet" type="text/css" href="view/css/tables.css">
<link rel="icon" href="view/img/icons/favicon.png">
<script src="view/js/jquery.js"></script>
<script src="view/js/functions.js"></script>
<style>
	
	#bv_home{
		width: 90%;
		height: 80vh;
		background-image: url("view/img/bg/bg_home.jpg");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: contain;
		margin: 40px auto;
	}
	
</style>
</head>
	
<body>
  <div class="container_modal">
	<div class="modal">

	</div>
</div>


   <?php
		require_once("view/header.php");
	?>
<!--        Todas as telas serão carregadas aqui dentro da main -->
	 <h1 class="titulo t-clr4" style="margin-top: 80px; font-size: 44px">Bem vindo ao <br> Sistema de Gerenciamento do Site</h1>
	<div id="bv_home"  style="text-align:center;"></div>
<!--        Todas as telas serão carregadas aqui-->
	<?php
		require_once("view/footer.php");
	?>
</body>
</html>