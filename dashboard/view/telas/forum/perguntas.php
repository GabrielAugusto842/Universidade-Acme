<?php
	@session_start();

	require_once($_SESSION['require']."/dashboard/controller/controllerPerguntaAluno.php");
	require_once($_SESSION['require']."/dashboard/controller/controllerRespostaAluno.php");

	$controllerPerguntaAluno = new controllerPerguntaAluno();
	$rsPerguntaAluno = $controllerPerguntaAluno->listarPerguntaAluno($_SESSION['aluno']['idForum']);

	for ($cont=0; $cont < count($rsPerguntaAluno); $cont++) {

?>
<div id="corpo_perguntas">
	<div class="box-3">
		<div class="row default-margin">
			<div class="col-100">
				<div class="row default-margin">
					<div class="col-20">
						<img src="<?= $rsPerguntaAluno[$cont]->getFoto() != "" ? $_SESSION['requireUrl'].$rsPerguntaAluno[$cont]->getFoto() : 'https://cdn.blog.psafe.com/blog/wp-content/uploads/2017/09/perfil-fake.jpg' ;?>" class="perfil foto-mini-2x" alt="usuario">
					</div>
					<div class="col-80 perfil nome-mini"><?= $rsPerguntaAluno[$cont]->getNomeAluno();?></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-100 pergunta" style="padding: 0px 20px 0px 20px; box-sizing: border-box;">
				<?= $rsPerguntaAluno[$cont]->getTexto();?>
			</div>
		</div>
		<div id="container-resposta-forum-<?= $rsPerguntaAluno[$cont]->getIdPerguntaAluno()?>">
			<div style="border-top: 1px solid  rgba(239,105,25,0.1); margin-top: 10px;">
				<?php

					$controllerRespostaAluno = new controllerRespostaAluno();
					$rsResposta = $controllerRespostaAluno->listarRespostaAluno($rsPerguntaAluno[$cont]->getIdPerguntaAluno());
					$contResposta = 0;
					while($contResposta < count($rsResposta)){

				?>
				<div class="row">
					<div class="col-15">
						<img src="<?= $rsResposta[$contResposta]->getFoto() != "" ? $_SESSION['requireUrl'].$rsResposta[$contResposta]->getFoto() : 'https://cdn.blog.psafe.com/blog/wp-content/uploads/2017/09/perfil-fake.jpg' ;?>" class="perfil foto-mini-1x" alt="perfil">
					</div>
					<div class="col-85 resposta">
						<?= $rsResposta[$contResposta]->getResposta()?>
					</div>
				</div>

				<?php

					$contResposta++;

					}

				?>
			</div>
			<div class="row">
				<div class="col-100">
					<form class="formResposta" name="formResposta" autocomplete="off" data-id-pergunta="<?= $rsPerguntaAluno[$cont]->getIdPerguntaAluno() ?>">
						<input type="text" name="txtResposta" class="txtResposta" placeholder="responder" style="padding: 6px 10px;">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	}
?>

<script>
	$(function(){
		
		//Submit do formResposta usando enter
		$(".formResposta .txtResposta").keypress(function(e){
			if(e.wich == 13 || e.keyCode == 13){ //Pega click do enter, dentro do input
				e.preventDefault();
				
				var $form = $(this).parent(), id = $form.attr("data-id-pergunta");//Pega formulario
				//Seta ação no submit				
				$form.formSubmit("router.php?controller=respostaForum&modo=inserir&matricula=<?= $_SESSION['aluno']["matricula"] ?>&idPergunta=" + id);
				$form.submit(); //Efetua submit
				var $container = $(this).parents()[3]; //Pega container pai
				
				$($container).loadFrom({url:"view/telas/forum/perguntas.php", target:$container.id}, function(){ //recarrega comentarios 
					//$("#post").loadFrom("view/telas/rede_social/rede_social.php"); //Atualiza posts
					//$("#box-postar").loadFrom("view/telas/rede_social/postar.html"); //Limpa formulario frmPublicarRede
					//$("#corpo_forum").loadFrom({url:"index.php", target:"corpo_forum"});
					$("#container_quadro_trabalhos").loadFrom({url:"index.php", target:"container_quadro_trabalhos"});
					
				});
			}
		});
		 
	})
</script>