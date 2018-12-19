<?php
    @session_start();
    require_once("sessao.php");
   
    require_once($_SESSION['require']."cms/controller/conteudo/controllerSobre.php");
    $controllerSobre = new controllerSobre();

//INICIO
    $listInicio = $controllerSobre->buscarSobre(3);
    $conteudoInicio = explode(";", $listInicio->getConteudo());
	
	$fotosInicio = explode(";",$listInicio->getFoto());
    $fotoPrincipal = $_SESSION['requireUrl'].$fotosInicio[0];
    $foto2 = $_SESSION['requireUrl'].$fotosInicio[1];
    $foto3 = $_SESSION['requireUrl'].$fotosInicio[2];

//NOSSA HISTÓRIA
    $listNossaHistoria = $controllerSobre->buscarSobre(4);
    $conteudoNossaHistoria = explode(";",$listNossaHistoria->getConteudo());
    $fotoNossaHistoria = $_SESSION['requireUrl'].$listNossaHistoria->getFoto();

//NOSSA FILOSOFIA
    $listNossaFilosofia = $controllerSobre->buscarSobre(5);
    $conteudoNossaFilosofia = explode(";",$listNossaFilosofia->getConteudo());
    $fotoNossaFilosofia = $_SESSION['requireUrl'].$listNossaFilosofia->getFoto();

//RODAPÉ PARCEIROS
    $listRodape = $controllerSobre->buscarSobre(6);
    $conteudoRodape = $listRodape->getConteudo();
    $fotoRodape = $_SESSION['requireUrl'].$listRodape->getFoto();


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sobre</title>
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
	.area-aluno{
		color: #db5728;
	}
	
</style>
</head>

<body>
    <!-- Inicio header -->
    <?php
        require_once("header.php");
    
    ?>
    <header id="header_sobre" class="bg-fullsc" style="background-image:url('<?=$fotoPrincipal?>')">
        <h1 class="titulo txt-color1" style="text-align: center;margin: 80px 0px 0px 0px;"><?=$conteudoInicio[0]?></h1>
        <h2 class="subTitulo txt-color1" style="text-align: center;margin: 5px 0px 160px 0px;">
            <?=$conteudoInicio[1]?>
        </h2>
        <article class="float_circle">
            <div class="item2">
                <img src="<?=$foto2?>" style="width:100%;height:100%; border-radius: 100%;">
            </div>
            <h3 class="subTitulo txt-color4" style="position: relative; top:26%;left: 58%; width: 400px;"><?=$conteudoInicio[2]?></h3>
            <h5 class="subTitulo txt-color3" style="position: relative; top:26%;left: 60%; width: 300px;"><?=$conteudoInicio[3]?></h5>
            <div class="item3">
                <img src="<?=$foto3?>" style="width:100%; height:100%; border-radius: 100%;">
            </div>
            <h3 class="subTitulo txt-color4" style="position: relative; top:22%;left: 33%; width: 400px"><?=$conteudoInicio[4]?></h3>
            <h5 class="subTitulo txt-color3" style="position: relative; top:22%;left: 35%; width: 200px"><?=$conteudoInicio[5]?></h5>
            <article class="wave-item2"></article>
             <article class="wave2-item2"></article>
            <article class="wave-item3"></article>
            <article class="wave2-item3"></article>
        </article>
    </header>
    <!-- Fim header -->
    <!--Inicio Conteudo-->
    <section id="content_historia" class="container contentent-col">
        <article class="col-40">
            <h2 class="txt-color4 subTitulo" style="margin: 80px 0px 0px 25px"><?=$conteudoNossaHistoria[0]?></h2>
            <h4 class="txt-color3 subTitulo" style="margin: 0px 0px 0px 40px"><?=$conteudoNossaHistoria[1]?></h4>
            <h5 class="txt-color3 subTitulo" style="margin: 20px 0px 0px 40px; text-align: center"><?=$conteudoNossaHistoria[2]?></h5>
            
            <h2 class="txt-color4 subTitulo" style="margin: 80px 0px 0px 25px"><?=$conteudoNossaFilosofia[0]?></h2>
            <h4 class="txt-color3 subTitulo" style="margin: 0px 0px 0px 40px"><?=$conteudoNossaFilosofia[1]?></h4>
            <h5 class="txt-color3 subTitulo" style="margin: 20px 0px 40px 40px; text-align: center"><?=$conteudoNossaFilosofia[2]?></h5>
        </article>
        <article class="col-60">
            <div class="moldura item1" style="background-image:url('<?=$fotoNossaHistoria?>');"></div>
            <div class="moldura item2" style="background-image:url('<?=$fotoNossaFilosofia?>');"></div>
        </article>
    </section>
    <section id="bloco_parceiros" class="container" style="background-image:url('<?=$fotoRodape?>');">
        <div class="parceiros container contentent-col">
            <h2 class="subTitulo txt-color4" style="margin-bottom: 80px; text-align: center"><?=$conteudoRodape?></h2>
            
            <?php
                require_once($_SESSION['require'].'cms/controller/controllerParceiro.php');
                    
                $listP=  new controllerParceiro();

                $rsParceiro = $listP::listarParceiro();

                $cont = 0;

                while($cont < count($rsParceiro)){  
                ?>
            <article class="col-30">
                <img src="<?=$_SESSION['requireUrl'].$rsParceiro[$cont]->getImg()?>" alt="microsoft" style=" width: 100%; height:100px; margin: 0px auto">
                <h4 class="subTitulo txt-color4" style="text-align: center;"><?=$rsParceiro[$cont]->getNome()?></h4>
                <h6 class="subTitulo txt-color3" style="text-align: center;"><?=$rsParceiro[$cont]->getDesc()?></h6>
            </article>  
            <?php
                $cont++;
                    }
            ?>
            
        </div>
    </section>
    <!--Fim Conteudo-->
    <?php require_once('footer.html'); ?> 
</body>
    
<script type="text/javascript" src="js/main.js"></script>
</html>
