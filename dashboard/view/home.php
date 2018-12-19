<?php

	//Import
	require_once($_SESSION['require']."/dashboard/controller/function.php");

	verifSession();

	@session_start();
	$nome = explode(" ", $_SESSION['aluno']["nome"]);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Área do aluno</title>
<link rel="icon" href="view/img/icons/favicon.png">
<link href="view/css/style.css" rel="stylesheet" type="text/css">
<script src="view/js/jquery.js"></script>
<script src="view/js/wolfJquery.js"></script>
<script src="view/js/function.js" type="text/javascript"></script>
</head>

<body>

	<!--Modal-->
	<div class="container_modal">
	   <div class="modal"></div>
   	</div>

	<header>
		<nav>
			<div class="icone_area_a" onClick="window.location=''" style="z-index: 400; cursor: pointer;"></div>
			<div class="titulo_nav_top">
				<h3 class="titulo t-clr1">Area do aluno</h3>
			</div>
			<div class="box_usuario">
			   <h3 class="titulo t-clr " style=" float: right; display: block; position: relative; top: 50%; transform: translate(0,-50%); text-align: right; margin: 0px 40px 0px 0px;"><?= $nome[0]  ?></h3>
				<div class="icone_usuario">
					<img src="<?= $_SESSION['requireUrl'].$_SESSION['aluno']['foto'] ?>" style="width: 100%;height: 100%; border-radius: 100%;" alt="img">
				</div>
			</div>
		</nav>
	</header>
	<section class="row" id="main">

		<article id="container_rede_social">

			<div id="box-postar"></div>

			<div id="post"></div>

		</article>

		<article id="container_quadro">
			<article id="container_quadro_trabalhos">
				<button class="accordion">Trabalhos</button>
				<div class="panel" id="frt-panel">
					<?php
					@session_start();
					require_once($_SESSION['require']."/dashboard/controller/controllerEntrega.php");
				   	
				   	$controllerEntrega = new controllerEntrega();
				   	$rsEntrega = $controllerEntrega->listarEntregaByAluno($_SESSION['aluno']["matricula"]);
				   
				   	for($cont = 0; $cont < count($rsEntrega); $cont++ ){
						$idEntrega = $rsEntrega[$cont]->getIdEntrega();
					?>
					<article class="box-1" style="cursor: pointer" id="frt-box" onClick="openModal('view/telas/modal_entrega.php?idEntrega=<?= $idEntrega;?>',700,'auto')"> 
						<h3 class="titulo t-clr4"><?= $rsEntrega[$cont]->getTitulo() ?></h3>
						<p class="texto4"><?= $rsEntrega[$cont]->getDisciplina() ?></p>
					</article>
					<?php
					}
					?>
				</div>
				<!--Script necessario para manter elemento funcionado-->
				<script>
					startAccordion();
				</script>
			</article>
			<div id="container_menu_lateral">
				<nav>
					<article class="box-2 t-center" onClick="openModal('view/telas/modal_aulas.php',800,'auto')">Aulas</article>
					<article class="box-2 t-center" onClick="openModal('view/telas/modal_boletim.php',1000,'auto')">
						Boletim
					</article>
					<article class="box-2 t-center" onClick="openModal('view/telas/modal_mensalidades.php',1000,'auto')">
						Mensalidades
					</article>
					<article class="box-2 t-center" onClick="openModal('view/telas/modal_qrcode.php',600,'auto')">
						Carteirinha Digital
					</article>

				</nav>
			</div>

			<div id="container_forum">
				<div class="corpo_forum" id="corpo_forum">
					<div class="header_forum">
						<h4 class="titulo t-clr1">Forum</h4>
					</div>
					<div class="row" id="container_pesquisa_forum">
						<div class="col-80" style=" position: relative; left: 50%; transform: translateX(-50%); padding: 20px 0px 10px 0px;">
							<input type="text" name="txtPesquisa" id="txtPesquisa" placeholder="pesquisar" style="margin: 0px;">
						</div>
						<div class="row" style="margin: 0px;">
							<div class="col-100">
								<button type="button" class="white" id="btnNovaPerguntaForum" style=" margin: 0px auto 10px auto; display: block; padding: 6px 10px;">Nova pergunta</button>
							</div>
						</div>
					</div>
					<div id="container_perguntas_forum"></div> <!-- Perguntas forum -->
				</div>
				<script>
					
						$(".header_forum").click(function () {

							if($('.corpo_forum').height() == 40){
								$(".corpo_forum").animate({ height:85 + "%"}, "fast");
								//$("#container_forum").delay(200).slideDown("fast");
							}else{
								//$("#container_forum").slideUp("fast");
								$(".corpo_forum").delay(100).animate({ height: 40 }, "fast");
								setTimeout(function(){
									$("#container_quadro").loadFrom({url:"index.php", target:"container_quadro"});
								},200);
								
							}
						});
					
				</script>
			</div>

		</article>
	</section>
</body>
<script>

	$(function(){
		
		//Carregar rede social
		$("#box-postar").load("view/telas/rede_social/postar.php");
		$("#post").load("view/telas/rede_social/rede_social.php", function(){
			//Atualiza tela de postagens de 3 em 3 minutos
			setInterval(function(){
				$("#post").load("view/telas/rede_social/rede_social.php");
			},180000);
			setInterval(function(){
				$("#box-postar").load("view/telas/rede_social/postar.php");
			},200000);
		});
		
		//Carregar forum
		$("#container_perguntas_forum").load("view/telas/forum/perguntas.php");
		
		//Criar pergunta
		$("#btnNovaPerguntaForum").click(function(){
			$("#corpo_forum").load("view/telas/forum/nova_pergunta.php");
			
		});
	});
		
</script>

</html>
