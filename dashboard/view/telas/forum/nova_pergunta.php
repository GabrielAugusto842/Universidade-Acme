<?php

@session_start();

?>

<i id="voltar_perguntas" class="fal fa-arrow-left fa-1x" style="color: white; position: absolute; left: 10px; top: 10px; z-index: 101; cursor: pointer;"></i>
<div class="header_forum">
	<h4 class="titulo t-clr1">Forum</h4>
</div>
<div id="container_pesquisa_forum" style="overflow: hidden">
	<div class="row">
		<div class="col-100" style="padding: 0px 0px 5px 0px; text-align: center;">
			<h5 class="titulo t-clr1">Criar pergunta</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-100" style="padding: 0px 20px 10px 20px; text-align: center; box-sizing: border-box">
			<p class="t-clr1 texto5">Aqui você pode criar perguntas e direciona-las para quem quiser</p>
		</div>
	</div>
</div>
<div style="padding: 20px;">
	<form id="frmPerguntaForum" name="frmPerguntaForum">
		<div class="row">
			<div class="col-50">
				<label for="">Direcionar a:</label>
			</div>
		</div>
		<div class="row">
			<div class="col-100">
				<select name="slcDirecaoPergunta" id="slcDirecaoPergunta" class="custom-select" placeholder="Direcione a pergunta">
					<option selected value="0">Ninguém</option>
					<option value="47716233840">Marcel</option>
					<option value="36718293857">Kassiano</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-100">
				<label for="txtPergunta">Pergunta:</label>
			</div>
		</div>
		<div class="row">
			<div class="col-100">
				<textarea name="txtPergunta" id="txtPergunta" placeholder="Digite uma pergunta"></textarea>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-100-b-full">
				<input type="submit" value="Criar" name="btnEnviarPergunta" id="btnEnviarPergunta">
			</div>
		</div>
	</form>			
</div>
<script>
	
	$(function(){
		//Publica uma nova pergunta post, Submit de frmPerguntaForum
		$("#frmPerguntaForum").formSubmit("router.php?controller=perguntaForum&modo=inserir&matricula=<?= $_SESSION['aluno']["matricula"] ?>&idForum=<?= $_SESSION['aluno']["idForum"]?>",function(){
			//Valta para perguntas
			$("#corpo_forum").loadFrom({url:"index.php", target:"corpo_forum"});
//			$("#container_quadro_trabalhos").loadFrom({url:"index.php", target:"container_quadro_trabalhos"}); //Evita parada de funcionamento do fechaento do forum
			$("#container_perguntas_forum").load("index.php #container_perguntas_forum"); //Limpa input para evitar itens duplicados
			
		});
		
	});
	
	$(".header_forum").click(function () {

		if($('.corpo_forum').height() == 40){
			$(".corpo_forum").animate({ height:85 + "%"}, "fast");
		}else{
			$(".corpo_forum").delay(100).animate({ height: 40 }, "fast");
			setTimeout(function(){
				$("#container_quadro").loadFrom({url:"index.php", target:"container_quadro"});
			},200);
		}
	});
	
	$("#voltar_perguntas").click(function(){
		$("#corpo_forum").loadFrom({url:"index.php", target:"corpo_forum"});
		$("#container_quadro_trabalhos").loadFrom({url:"index.php", target:"container_quadro_trabalhos"});
	})
	
	selectElement();
	
</script>