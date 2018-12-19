<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cursos</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
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
		color: white;
	}
	
</style>	
</head>

<body>
	
	 <?php
	
        require_once("header.php");
    
    ?>
	
	<section id="header_menu_cursos" style="background-image: url(img/conteudo/curso/cursos.jpg)">
		<h2 class="subTitulo centralizarX txt-color1" style="text-align: center; position: absolute; margin-top: 20px;">Nossos cursos</h2>
		<div class="container_formacoes centralizarX">
			<a href="cursos.php">
				<button class="button" style="width: 200px; margin-left: 20px;">todos os cursos</button>
			</a>
			<?php
			require_once("sessao.php");

		 	require_once($_SESSION['require'].'cms/controller/controllerFormacao.php');
			$controllerFormacao =  new controllerFormacao();

			$rsFormacao = $controllerFormacao::listarFormacao();

			$cont = 0;
			while($cont < count($rsFormacao)){                        

		?>
			<a href="cursos.php?idFormacao=<?=$rsFormacao[$cont]->getIdFormacao();?>">
				<button class="button" style="width: 200px; margin-left: 20px;"><?=$rsFormacao[$cont]->getNome();?></button>
			</a>
			<?php
				$cont++;
			}
			?>
			
		</div>
	</section>
	<section id="container_cursos" class="centralizarX">
		<?php

		 	require_once($_SESSION['require'].'cms/controller/controllerCurso.php');
			$controllerCurso =  new controllerCurso();

		
		if(isset($_GET['idFormacao'])){//SELECIONAR POR FORMACAO
			$rsCurso = $controllerCurso::listarPorFormacao($_GET['idFormacao']);
		}else{//MOSTRAR TODOS OS CURSOS
			$rsCurso = $controllerCurso::listarCurso();
		}
			

			$cont = 0;
			while($cont < count($rsCurso)){                        

		?>
		
		<article class="bloco col-31" style= "height: 750px; width: 400px;overflow: auto;">
			<div class="row">
				<div class="col-100"><h5 class="subTitulo quebra-col" style=" text-align: center"></h5></div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-40" style="height: 100%;">
					<div class="perfil">
						<img src="<?=$_SESSION['requireUrl'].$rsCurso[$cont]->getFoto();?>" style="width: 100%; height:100%; border-radius: 100%;">
					</div>
				</div>
				<div class="col-60">
					<div class="row">
						<div class="col-100">
							<h4 class="subTitulo" style=" margin: 20px 0px 0px 20px"><?=$rsCurso[$cont]->getNome()?> </h4>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<h5 class="subTitulo quebra-col" style=" margin: 5px 0px 0px 20px"><?=$rsCurso[$cont]->getCargaHoraria()?> Horas </h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<h5 class="subTitulo quebra-col" style=" margin: 20px 0px 20px 20px"><span style="color: orangered">Descritivo:</span> <?=$rsCurso[$cont]->getDescTecnico()?></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<h5 class="subTitulo quebra-col" style=" margin: 20px 0px 20px 20px"><span style="color: orangered">Objetivo:</span> <?=$rsCurso[$cont]->getObjetivo()?></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<h5 class="subTitulo quebra-col" style=" margin: 20px 0px 20px 20px"><span style="color: orangered">Grade:</span> <?=$rsCurso[$cont]->getGrade()?></h5>
				</div>
			</div>
		</article>
		
		<?php
			 $cont++;
			 }
         ?>

		

	</section>
	<?php require_once('footer.html'); ?>
</body>
<script type="text/javascript" src="js/main.js"></script>
<script>
	//Onload
	$(function(){
		
		//Função imediata para evitar conflito de variaveis, codigo responstavel pelo tamanho do elemento 'container_cursos'.
		(function(){
			var filhos = $('.container_formacoes').children(), tamanhoDiv;
			tamanhoDiv = filhos.length * 221
			console.log(tamanhoDiv);
			$('.container_formacoes').css("width",(tamanhoDiv <= 1102) ? tamanhoDiv : 1101);
			
		})();
		 //codigo responstavel pelo tamanho do elemento 'container_formacoes'.
		(function(){
			var filhos = $('#container_cursos').children(), tamanhoDiv;
			tamanhoDiv = filhos.length * 421
			console.log(tamanhoDiv);
			$('#container_cursos').css("width", (tamanhoDiv <= 1265) ? tamanhoDiv : 1265 );
			
		})();
		
	})
</script>
</html>
