<?php

@session_start();
    require_once("sessao.php");
   
    require_once($_SESSION['require']."cms/controller/controllerUnidade.php");
    
   	$controllerUnidade =  new controllerUnidade();

    $rsUnidade = $controllerUnidade::listarUnidade();

//fotos das unidades
    $idUnidade1 = $rsUnidade[0]->getIdUnidade();
    $unidade1 = $_SESSION['requireUrl'].$rsUnidade[0]->getFoto();
    
    $idUnidade2 = $rsUnidade[1]->getIdUnidade();
    $unidade2 = $_SESSION['requireUrl'].$rsUnidade[1]->getFoto();

    $idUnidade3 = $rsUnidade[2]->getIdUnidade();
    $unidade3 = $_SESSION['requireUrl'].$rsUnidade[2]->getFoto();

    
   

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nossas Unidades</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
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
    <!--Inicio Menu hamburguer-->
  <?php
        require_once("header.php");
    ?>
    <!--Fim Menu hamburguer-->
    <!--Inicio header-->
    <header id="header_unidades" class="bg-fullsc" style="cursor:pointer;">
        <div id="bg_acordeon">
            <div class="col-33 item1" style="height: 100%;" onClick="location.href='unidade.php?id=<?=$idUnidade1?>'"><div class="bg" style="background-image:url(<?=$unidade1?>);"></div></div>
            <div class="col-33 item2" style="height: 100%;" onClick="location.href='unidade.php?id=<?=$idUnidade2?>'"><div class="bg" style="background-image:url(<?=$unidade2?>);"></div></div>
            <div class="col-33 item3" style="height: 100%;" onClick="location.href='unidade.php?id=<?=$idUnidade3?>'"><div class="bg" style="background-image:url(<?=$unidade3?>);"></div></div>
        </div>
    </header>
    <!--Fim header-->
    <!--Inicio noticias/eventos -->
    <section id="eventos_noticias">
        <article class="container" style=" height: 1300px; overflow: hidden; ">
            <div>
                <div class="col-20">
                     <h3 class="subTitulo txt-color3" style=" width: 190px; position: relative; left: 80px; top: 40px;">Eventos da Semana</h3>
                </div>
                <div class="col-70">
              <article class="contentent-col" style="width: 100%;">
				  <?php
                  
					 require_once($_SESSION['require'].'cms/controller/controllerEvento.php');
						$controllerEvento =  new controllerEvento();

						$rsEvento = $controllerEvento::listar3Evento(0);

                        $cont = 0;
                        while($cont < count($rsEvento)){
					 ?>
				  
				  
                    <div id="feed" class="contentent-col" style="height: 350px;">
                        <img class="bloco-float" src="img/elementos/elemento_linha_com_quadrado.svg" style=" height: 250px; margin: 0px 0px 0px 360px" alt="seta">
                        <article class="bloco-float" style="margin: 220px 0px 0px 20px">
                            <h4 class="subTitulo txt-color4"><?=$rsEvento[$cont]->getNome();?></h4>
                            <h5 class="subTitulo txt-color3"><?=$rsEvento[$cont]->getInicio();?></h5>
                            <p class="texto3" style="width: 300px; height: 60px; margin: 5px 0px 0px 0px"><?=$rsEvento[$cont]->getDesc();?></p>
                         </article>
                     </div>
                  <?php
                  $cont++;
                        }
                  ?>
                  
                </article>
                </div>
            </div>
        </article>
    </section>
    <!--Fim noticias/eventos -->
    <?php require_once('footer.html'); ?>
</body>
    
<script>
    
    $('.item1').hover(function(){
        
        $(this).toggleClass('col-60');
        $('.item2').toggleClass('col-33').toggleClass('col-20');
        $('.item3').toggleClass('col-33').toggleClass('col-20');
        
    });
    
    $('.item2').hover(function(){
        
        $(this).toggleClass('col-60');
        $('.item1').toggleClass('col-33').toggleClass('col-20');
        $('.item3').toggleClass('col-33').toggleClass('col-20');
        
    });
    
    $('.item3').hover(function(){
        
        $(this).toggleClass('col-60');
        $('.item1').toggleClass('col-33').toggleClass('col-20');
        $('.item2').toggleClass('col-33').toggleClass('col-20');
        
    });
    
    
</script>
    
<script type="text/javascript" src="js/main.js"></script>
</html>