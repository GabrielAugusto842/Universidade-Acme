<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Usuarios</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<link rel="stylesheet" type="text/css" href="../css/header.css"> 
<link rel="stylesheet" type="text/css" href="../css/tables.css">
<script src="../js/jquery.js"></script>
<script src="../js/functions.js"></script>
<meta charset="utf-8">
</head>
    
<body>
   <div class="container_modal">
       <div class="modal">

       </div>
   </div>

   <?php require_once('../header.php');?>
    <div class="main">
        <!--Inicio do conteúdo-->
        <div class="content">
           <script>syncTela("../telas/tabela_usuario.php",".content");</script>
        </div>
        <!--FIM do conteúdo-->
    </div>
    <?php
        require_once("../footer.php");
    ?>
</body>
</html>
