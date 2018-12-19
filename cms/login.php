<?php

    if(isset($_POST['btnLogar'])){
		require_once("../sessao.php");
        require_once("controller/controllerUsuario.php");
        
        $controllerUsuario = new ControllerUsuario();
        $controllerUsuario::autenticar();
    }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login CMS</title>
<link rel="stylesheet" type="text/css" href="view/css/login.css"> 
<link rel="stylesheet" type="text/css" href="view/css/style.css">
<link rel="icon" href="view/img/icons/favicon.png">
</head>
<body>
    <div class="main">
      <div class="container_login">
          <img src="view/img/icons/logo_007.png" class="logo-login center" alt="logo">
          <form method="POST" action="login.php">
               <div class="container_formulario_login center">
                   <div class="row">
                       <div class="col-100">
                            <input type="text" name="txtUsuario" placeholder="Digite seu usuario..">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-100">
                            <input type="password" name="txtSenha" placeholder="Digite sua senha...">
                       </div>
                   </div>
                   <div class="row">
                        <div class="col-100-b-full">
                             <input type="submit" value="Entrar" name="btnLogar">
                       </div>
                   </div>
               </div>
         </form>
      </div>
    </div>
</body>
</html>