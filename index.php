<?php
    @session_start();
    require_once("sessao.php");
	require_once($_SESSION['require']."cms/controller/conteudo/controllerHome.php");

	$controllerHome = new controllerHome();

//INFOS
	$list = $controllerHome->buscarHome(2);
	$conteudo = explode(";",$list->getConteudo());

	$background = $_SESSION['requireUrl'].$list->getFoto();



?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Universidade ACME</title>
<link rel="icon" href="img/icons/favicon.png">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.3.1.min.js"></script>
<style>

	#menu_line{
    height: 4px;
    width: 50px;
    background-color: white;;
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
    background-color: white;;
    position: absolute;
    margin-top: 10px;
    transition: all .3s;
    border-radius: 4px;
}

#menu_line::after{
    content: "";
    height: 4px;
    width: 40px;
    background-color: white;;
    position: absolute;
    margin-top: -10px;
    transition: all .3s;
    border-radius: 4px;
}

	.area-aluno{
		color: white;
	}

.s1{
 background: url(img/bg/home/slide/bg7.jpg);
 background-size: cover;
}
.s2{
 background: url(img/bg/home/slide/bg6.jpg);
 background-size: cover;
}
.s3{
 background: url(img/bg/home/slide/clyde-he-1086921-unsplash.jpg);
 background-size: cover;
}
.s4{
 background: url(img/bg/home/slide/bg5.jpg);
 background-size: cover;
}

</style>
</head>

<body>
    <?php
        require_once("header.php");
    ?>
    <header>

	<div class="box">
		</div>
        <div class="slider">
            <div class="slide s1 active">
                <h2 class="subTitulo txt-color1" style="position: absolute; left: 70%; top: 25%; width: 400px;">Ensino e entreterimento de qualidade é aqui ACME.</h2>
				<img src="img/icons/logo_007W.png" alt="ACME"  style="position: absolute; left: 45%; top: 35%; width: 200px;">
            </div>
            <div class="slide s2">
                <h2 class="subTitulo txt-color1" style="position: absolute; left: 9%; top: 20%; width: 400px;">Vagas abertas, corra e garanta seu lugar no futuro.</h2>
            </div>
            <div class="slide s3">
                <h2 class="subTitulo txt-color1" style="position: absolute; left: 15%; top: 25%; width: 400px;">Venha fazer parte do nosso futuro, seja ACME.</h2>
            </div>
            <div class="slide s4">
                <h2 class="subTitulo txt-color1" style="position: absolute; left: 10%; top: 25%; width: 400px;">Participe dos nossos eventos semestrais, venha competir em nossos hackathons.</h2>
            </div>
        </div>

    </header>
    <section id="noticias_home" style="background-image:
			 url('<?=$background?>');">
        <div class="container" style="overflow: hidden;" >
            <h3 class="subTitulo txt-color4" style="margin: 80px 0px 0px 80px;"><?=$conteudo[0]?></h3>
            <h5 class="subTitulo txt-color3" style="margin: 10px 0px 0px 90px; width: 400px;"><?=$conteudo[1]?></h5>
            <h3 class="subTitulo txt-color4" style="margin: 80px 0px 0px 80px;">Noticias</h3>
            <div class="blocos container" style="margin-top: 20px;">
                <?php
                     require_once($_SESSION['require'].'cms/controller/controllerNoticia.php');
                    $controllerNoticia =  new controllerNoticia();

                    $rsNoticia = $controllerNoticia::listarNoticia();

                    $cont = 0;

                    while($cont < count($rsNoticia)){
                ?>
                <div class="col-20" style="height: 290px; overflow:hidden;" >
                    <img src="<?=$rsNoticia[$cont]->getFoto();?>" width="240" alt="">
                    <h4 class="subTitulo txt-color4" style="text-align: center; margin-bottom: 5px;"><?=$rsNoticia[$cont]->getTitulo();?></h4>
                    <h5 class="subTitulo txt-color1" style="text-align: center" ><?=$rsNoticia[$cont]->getDesc();?></h5>
                </div>
                <?php
                    $cont++;
                    }
                ?>

            </div>
        </div>
    </section>
    <?php require_once('footer.html'); ?>
<script src="js/main.js"></script>
</body>
</html>
