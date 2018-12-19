<?php

require_once("sessao.php");

   require_once($_SESSION['require']."cms/controller/conteudo/controllerVestibular.php");
   require_once($_SESSION['require']."cms/controller/controllerProcessoSeletivo.php");
   $controllerVestibular = new controllerVestibular();
   $controllerProcessoSeletivo = new controllerProcessoSeletivo();
	
	//HEADER INICIO
	$listInicio = $controllerVestibular->buscarVestibular(13);
	$conteudoInicio = explode(";",$listInicio->getConteudo());
	$background = $_SESSION['requireUrl'].$listInicio->getFoto();

	//BOLSA DE ESTUDOS
	$listBolsa = $controllerVestibular->buscarVestibular(14);
	$conteudoBolsa = explode(";",$listBolsa->getConteudo());
	$fotoBolsa = $_SESSION['requireUrl'].$listBolsa->getFoto();

	//CONVENIOS
	$listConvenio = $controllerVestibular->buscarVestibular(15);
	$conteudoConvenio = explode(";",$listConvenio->getConteudo());
	$fotoConvenio = $_SESSION['requireUrl'].$listConvenio->getFoto();	
	
	//CONVENIOS
	$listLista = $controllerProcessoSeletivo->buscarProcessoSeletivo(1);
	$arquivo = $_SESSION['requireUrl'].$listLista->getArquivo();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Processo Seletivo</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script></script>
<style>
	
	#menu_line{
    height: 4px;
    width: 50px;
    background-color: #db5728;;
    position: absolute;
    top:50%;
    left: 50%;
    transform: translate(-50%,-50%);
    transition: all .3s;
    border-radius: 4px;
}
	
	#menu_line::before{
    content: "";
    height: 4px;
    width: 40px;
    background-color: #db5728;;
    position: absolute;
    margin-top: 10px;
    transition: all .3s;
    border-radius: 4px;
}

#menu_line::after{
    content: "";
    height: 4px;
    width: 40px;
    background-color: #db5728;;
    position: absolute;
    margin-top: -10px;
    transition: all .3s;
    border-radius: 4px;
}
	
	.area-aluno{
		color: #db5728;
	}
	
</style>
</head>

<body>
     <?php
        require_once("header.php");
    ?>
    <header id="processo_seletivo" class="bg-fullsc" style="background-image: url(<?=$background?>);">
        <h2 class="subTitulo txt-color1" style="position: absolute; left: 42%; top:80px;"><?=$conteudoInicio[0]?></h2>
        <h3 class="subTitulo txt-color1" style="position: absolute; left: 42%; top:130px; width: 700px;"><?=$conteudoInicio[1]?></h3>
        <h3 class="subTitulo txt-color4" style="position: absolute; left: 80px; top:35%;"><?=$conteudoInicio[0]?></h3>
        <h4 class="subTitulo txt-color3" style="position: absolute; left: 80px; top:42%; width: 370px;"><?=$conteudoInicio[2]?></h4>
        <input type="button" class="button" onclick="window.open('<?= $arquivo ?>', '_blank');" value="Conferir" style="position: absolute; left: 80px; top:62%;">
    </header>
    <section id="sobre_bolsa" class="container contentent-col">
        <article class="col-40">
            <h2 class="txt-color4 subTitulo" style="margin: 80px 0px 0px 25px"><?=$conteudoBolsa[0]?></h2>
            <h4 class="txt-color3 subTitulo" style="margin: 0px 0px 0px 40px"><?=$conteudoBolsa[1]?></h4>
            <h5 class="txt-color3 subTitulo" style="margin: 20px 0px 0px 40px; text-align: center"><?=$conteudoBolsa[2]?></h5>
            
            <h2 class="txt-color4 subTitulo" style="margin: 250px 0px 0px 25px"><?=$conteudoConvenio[0]?></h2>
            <h4 class="txt-color3 subTitulo" style="margin: 0px 0px 0px 40px"><?=$conteudoConvenio[1]?></h4>
            <h5 class="txt-color3 subTitulo" style="margin: 20px 0px 40px 40px; text-align: center"><?=$conteudoConvenio[2]?></h5>
        </article>
        <article class="col-60">
            <div class="moldura item1" style="background-image: url(<?=$fotoBolsa?>)"></div>
            <div class="moldura item2" style="background-image: url(<?=$fotoConvenio?>)"></div>
        </article>
    </section>
    <?php require_once('footer.html'); ?>
</body>
    
<script type="text/javascript" src="js/main.js"></script>
</html>