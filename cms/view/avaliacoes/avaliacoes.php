<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Avaliações</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/header.css">
<link rel="stylesheet" type="text/css" href="../css/tables.css">
<link rel="icon" href="../img/icons/favicon.png">
<script src="../js/jquery.js"></script>
<script src="../js/functions.js"></script>
<meta charset="utf-8">
</head>
	
<body>
  <div class="container_modal">
	<div class="modal">

		</div>
	</div>
   <?php
		require_once("../header.php");
	?>
<!--        Todas as telas serão carregadas aqui dentro da main -->
	<div id="main">
		<div class="content">
		   <script> syncTela("../telas/tabela_avaliacao.php",".content");</script>
		</div>


	</div>

<?php
	require_once('../footer.php');
?>

</body>


</html>
