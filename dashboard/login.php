<?php
	

    if(isset($_POST['btnLogar'])){
        session_start();
		require_once("controller/sessao.php");
        require_once($_SESSION['require']."dashboard/controller/controllerAluno.php");
        require_once("controller/controllerAluno.php");
        
        $controllerAluno = new controllerAluno();
        $controllerAluno->autenticar();
    }

	$erro = 0;

	if(isset($_GET['error'])){
		$erro = $_GET['error'];
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="view/css/style.css" rel="stylesheet" type="text/css">
<link href="view/css/login-style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="view/css/toast.css">
<script src="view/js/jquery.js" type="text/javascript"></script>
<script src="view/js/function.js" type="text/javascript"></script>
<script src="view/js/toast.js" type="text/javascript"></script>
<link rel="icon" href="view/img/icons/favicon.png">
<script>
	
	$(function(){
		if(<?= $erro ?> == 1){
			getDefaultNotf();
			toastr.error('Credenciais não conferem.', 'Há algo errado ): ');
		}
	})
	
</script>
</head>
	
<body>	
	<div class="main">
      <div class="container_login">
          <img src="view/img/icons/logo_007.png" class="logo-login centralizarX" alt="logo">
          <form method="POST" action="login.php">
               <div class="container_formulario_login center">
                   <div class="row">
                       <div class="col-100">
                            <input type="text" name="txtMatricula" placeholder="Digite seu usuario..">
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
                   <div class="row">
                        <div class="col-100">
                            <p class="texto4 link t-center t-clr1" onClick="window.location='acesso.php'">Primeiro acesso.</p>
                        </div>
                   </div>
               </div>
         </form>
      </div>
    </div>
</body>
</html>
