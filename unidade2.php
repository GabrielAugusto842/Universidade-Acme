<?php
    @session_start();

    require_once($_SESSION['require']."cms/controller/controllerUnidade.php");
    
   	$controllerUnidade =  new controllerUnidade();

    $rsUnidade = $controllerUnidade::buscarUnidade($_GET['id']);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unidade</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<style>
	
	#menu_line{
    height: 4px;
    width: 50px;
    background-color: #fff;;
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
    background-color: #fff;;
    position: absolute;
    margin-top: 10px;
    transition: all .3s;
    border-radius: 4px;
}

#menu_line::after{
    content: "";
    height: 4px;
    width: 40px;
    background-color: #fff;;
    position: absolute;
    margin-top: -10px;
    transition: all .3s;
    border-radius: 4px;
}
	
</style>
</head>

<body>
    <!--Inicio Menu hamburguer-->
    <?php
        require_once("header.php");
    ?>
    <!--Fim Menu hamburguer-->
    <!--Inicio header-->
    <header id="header_unidade" class="bg-fullsc item2" style="background-image:url(<?=$rsUnidade->getFoto();?>)">
       <div class="col-60">
            <h1 class="titulo txt-color1" style="text-align: center;margin: 140px 0px 0px 0px;"><?=$rsUnidade->getNome();?></h1>
            <h2 class="subTitulo txt-color1" style="text-align: center;margin: 5px 0px 160px 0px;"></h2>
        </div>
       <div class="col-40" style=" background-color: rgba(0,0,0,0.70); height: 100%">
            <div class="contentent-col" style="margin: 0px 0px 0px 40px">
                <img class="bloco-float" src="img/elementos/elemento_linha_com_circulo.svg" style="height: 200px;" alt="seta">
                <article class="bloco-float" style="margin: 170px 0px 0px 20px">
                    <h4 class="subTitulo txt-color4">Endereço</h4>
                    <h5 class="subTitulo txt-color1">localizado na</h5>
                    <p class="texto3 txt-color1" style="width: 300px; margin: 5px 0px 0px 0px"><?=$rsUnidade->getEndereco();?></p>
                 </article>
             </div>
            <div class="contentent-col" style="margin: -122px 0px 0px 40px">
                <img class="bloco-float" src="img/elementos/elemento_linha_com_circulo.svg" style="height: 200px;" alt="seta">
                <article class="bloco-float" style="margin: 170px 0px 0px 20px">
                    <h4 class="subTitulo txt-color4">Destaque</h4>
                    <h5 class="subTitulo txt-color1">descrição</h5>
                    <p class="texto3 txt-color1" style="width: 300px; margin: 5px 0px 0px 0px"><?=$rsUnidade->getDesc();?></p>
                 </article>
             </div>
        </div>
    </header>
    <!--Fim header-->
    <!--Inicio noticias/eventos -->
    <section>
        <article class="container" style=" height: 1000px; overflow: hidden; ">
            <div>
                <div class="col-20">
                     <h3 class="subTitulo txt-color3"  style=" width: 190px; position: relative; left: 80px; top: 40px; ">Eventos e Noticias</h3>
                </div>
                <div class="col-70">
                 <article class="contentent-col" style="width: 100%;">
					  <?php
                  
					 require_once($_SESSION['require'].'cms/controller/controllerEvento.php');
						$controllerEvento =  new controllerEvento();

						$rsEvento = $controllerEvento::listar3Evento($rsUnidade->getIdUnidade());

					 ?>
				  
                    <div class="contentent-col">
                        <img class="bloco-float" src="img/elementos/elemento_linha_com_quadrado.svg" style="height: 250px; margin: 0px 0px 0px 360px" alt="seta">
                        <article class="bloco-float" style="margin: 220px 0px 0px 20px">
                            <h4 class="subTitulo"><?=$rsEvento[0]->getNome();?></h4>
                            <h5 class="subTitulo txt-color4"><?=$rsEvento[0]->getInicio();?></h5>
                            <p class="texto3" style="width: 300px; margin: 5px 0px 0px 0px"><?=$rsEvento[0]->getDesc();?></p>
                         </article>
                     </div>
                      <div class="contentent-col" style="margin-top: -127px">
                        <article class="bloco-float" style="margin: 220px 20px 0px 40px">
                            <h4 class="subTitulo-2"><?=$rsEvento[1]->getNome();?></h4>
                            <h5 class="subTitulo-2 txt-color3"><?=$rsEvento[1]->getInicio();?></h5>
                            <p class="texto4" style="width: 300px; margin: 0px 0px 0px 0px"><?=$rsEvento[1]->getDesc();?></p>
                         </article>
                          <img class="bloco-float" src="img/elementos/elemento_linha_com_quadrado.svg" style="height: 250px;" alt="seta">
                     </div>
                      <div class="contentent-col" style="margin-top: -120px">
                        <img class="bloco-float" src="img/elementos/elemento_linha_com_quadrado.svg" style="height: 250px; margin: 0px 0px 0px 360px" alt="seta">
                        <article class="bloco-float" style="margin: 220px 0px 0px 20px">
                            <h4 class="subTitulo"><?=$rsEvento[2]->getNome();?></h4>
                            <h5 class="subTitulo txt-color4"><?=$rsEvento[2]->getInicio();?></h5>
                            <p class="texto3" style="width: 300px; margin: 5px 0px 0px 0px"><?=$rsEvento[2]->getDesc();?></p>
                         </article>
                     </div>
                </article>
                </div>
            </div>
        </article>
    </section>
    <!--Fim noticias/eventos -->
    <!--Inicio Footer-->
    <footer>
        <div class="container">
            <article class="conteudo_footer col-31">
            <div class="col-99" style="height: 315px; margin-top: 35px;">
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
            </div>
        </article>
        <article class="conteudo_footer col-31">
            <div class="col-99" style="height: 315px; margin-top: 35px;">
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
            </div>
        </article>
        <article class="conteudo_footer col-31">
            <div class="col-99" style="height: 315px; margin-top: 35px;">
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
                <h5 class="subTitulo" style=" text-align: center;">AAaaaa</h5>
            </div>
        </article>
        </div>
    </footer>
    <!--Fim Footer-->
</body>
    
<script type="text/javascript" src="js/main.js"></script>
</html>
