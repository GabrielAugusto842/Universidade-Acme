<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Parceiros</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<link rel="stylesheet" type="text/css" href="../css/header.css"> 
<link rel="stylesheet" type="text/css" href="../css/tables.css">
<link rel="icon" href="../img/icons/favicon.png">
<link href="../css/date.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/functions.js" type="text/javascript"></script>
<meta charset="utf-8">
</head>
    
<body>
   <div class="container_modal">
       <div class="modal"></div>
   </div>

   <?php require_once('../header.php');?>
    <div class="main">
        <!--Inicio do conteúdo-->
        <div class="content">
            <!-- descarega de forma asyncrona a tabaela localizada em view/telas -->
           <script>syncTela("../telas/tabela_parceiro.php",".content");</script>
        </div>
        <!--FIM do conteúdo-->
    </div>
    <?php
        require_once("../footer.php");
    ?>
</body>
</html>