<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Niveis</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<link rel="stylesheet" type="text/css" href="../css/header.css"> 
<link rel="stylesheet" type="text/css" href="../css/tables.css">
<link rel="icon" href="../img/icons/favicon.png">
<script src="../js/jquery.js"></script>
<script src="../js/wolfJquery.js"></script>
<script src="../js/functions.js"></script>
</head>
    
<body>
      <div class="container_modal">
        <div class="modal">

        </div>
    </div>
       <?php
            require_once("../header.php");
        ?>
        <div id="main">
           <div class="content">
<!--              Carregando tela/tabela de forma assincrona na classe content-->
               <script> $(".content").loadFrom("../telas/tabela_nivel.php") </script>          
            </div>
            
        </div>
        <?php
            require_once("../footer.php");
        ?>
</body>
</html>
   