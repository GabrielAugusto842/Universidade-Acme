<?php

if (isset($_POST['btnVerificar'])) {
    require_once('../sessao.php');
    require_once('controller/controllerAluno.php');

    $controllerAluno = new controllerAluno();
    $controllerAluno->verificarAcesso();
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
<title>Primeiro Acesso</title>
<link rel="icon" href="view/img/icons/favicon.png">
<link rel="stylesheet" href="view/css/style.css">
<link rel="stylesheet" href="view/css/toast.css">
<script src="view/js/jquery.js" type="text/javascript"></script>
<script src="view/js/function.js" type="text/javascript"></script>
<script src="view/js/toast.js" type="text/javascript"></script>
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
    <div id="container-p-acesso" class="box-2">
        <h2 class="titulo">Verificar identidade</h2>
        <form action="acesso.php" method="post">
            <div class="row">
                <div class="col-100">
                    <label for="txtMatricula">Matricula:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-100">
                    <input type="text" name="txtMatricula" id="txtMatricula" placeholder="Digite sua matricula...">
                </div>
            </div>
            <div class="row">
                    <div class="col-100">
                        <label for="txtMatricula">CPF:</label>
                    </div>
            </div>
            <div class="row">
                <div class="col-100">
                    <input type="text" name="txtCpf" id="txtCpf" placeholder="Digite seu CPF...">
                </div>
            </div>
            <div class="row">
                <div class="col-100">
                    <label for="txtDtNasc">Data de nascimento:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-100">
                    <input type="date" name="txtDtNasc" id="txtDtNasc">
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-100-b-full">
                    <input type="submit" name="btnVerificar" value="Verificar">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
