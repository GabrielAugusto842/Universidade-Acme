<?php
require_once("sessao.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Loja</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style-loja.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/modernizr.custom.63321.js"></script>
<style>
	
	#menu_line{
    height: 4px;
    width: 50px;
    background-color: #181818;
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
    background-color: #181818;
    position: absolute;
    margin-top: 10px;
    transition: all .3s;
    border-radius: 4px;
}

#menu_line::after{
    content: "";
    height: 4px;
    width: 40px;
    background-color: #181818;
    position: absolute;
    margin-top: -10px;
    transition: all .3s;
    border-radius: 4px;
}
	
</style>
</head>

<body>
     <?php
        require_once("header.php");
    ?>
    <header>
        <div class="box"></div>
        <div class="slider">
            <div class="slide s1 active">
                <h2 class="subTitulo txt-color1" style="position: absolute; left: 15%; top: 25%; width: 400px;">Vista nossa univeridade, seja ACME.</h2>
            </div>
            <div class="slide s2">
                <h2 class="subTitulo txt-color4" style="position: absolute; left: 15%; top: 25%; width: 400px;">Seja ACME tanto quanto somos você.</h2>
            </div>
            <div class="slide s3">
                <h2 class="subTitulo txt-color4" style="position: absolute; left: 15%; top: 25%; width: 400px;">Vista nossa univeridade, seja ACME.</h2>
            </div>
            <div class="slide s4">
                <h2 class="subTitulo txt-color1" style="position: absolute; left: 15%; top: 25%; width: 400px;">Vista nossa univeridade, seja ACME.</h2>
            </div>
        </div>
    </header>
	<section style="height: 100vh;">
		<div id="mi-slider" class="mi-slider" style="position: relative; left: 50%; top: 50%; transform: translate(-50%,-50%)">
            <?php
            require_once($_SESSION['require'].'cms/controller/controllerProdutoLoja.php');
            require_once($_SESSION['require'].'cms/controller/controllerCatProdutoLoja.php');
            
                    $controllerCatProdutoLoja =  new controllerCatProdutoLoja();

                    $rsCatProdutoLoja = $controllerCatProdutoLoja::listarCatProdutoLoja();

                    $i = 0;
            while($i < count($rsCatProdutoLoja)){
                
            ?>
			<ul>
                <?php
                    $j =0;
                    $controllerProdutoLoja =  new controllerProdutoLoja();
                    $rsProdutoLoja = $controllerProdutoLoja::listarProdutoLojaPorCat($rsCatProdutoLoja[$i]->getIdCatProduto());
                    while($j< count($rsProdutoLoja)){
                
                ?>
				<li>
                    <a href="#">
                        <img src="<?=$rsProdutoLoja[$j]->getImg();?>" title="<?=$rsProdutoLoja[$j]->getTitulo();?> " alt="<?=$rsProdutoLoja[$j]->getTitulo();?> ">
                        
                        <h4><?=$rsProdutoLoja[$j]->getTitulo();?></h4>
                    </a>
                </li>
				
                <?php
                    $j++;
                    }
                ?>
			</ul>
            <?php
                $i++; 
            }
            ?>
            
			<nav>
                <?php
                    
                    $controllerCatProdutoLoja =  new controllerCatProdutoLoja();

                    $rsCatProdutoLoja = $controllerCatProdutoLoja::listarCatProdutoLoja();

                    $cont = 0;

                    while($cont < count($rsCatProdutoLoja)){
                ?>
				<a href="#"><?=$rsCatProdutoLoja[$cont]->getTitulo();?></a>
                <?php
                $cont++;
                }
                ?>
			</nav>
		</div>
    </section>
    <?php require_once('footer.html'); ?>
</body>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/jquery.catslider.js"></script>
<script>
	$(function() {

		$( '#mi-slider' ).catslider();

	});
</script>
</html>
