<?php

@session_start();
$nome_user = explode(" ", $_SESSION['aluno']["nome"]);

?>
<div class="box-1">
	<form name="frmPublicarRede" id="frmPublicarRede">
		<div class="row default-margin">
			<div class="col-100">
				<div class="row default-margin">
					<div class="col-100" style="padding-bottom: 10px; border-bottom: 1px solid  rgba(239,105,25,0.1);">
						<p class="texto3 t-clr4">Bem vindo <?= $nome_user[0] ?>, aqui você pode compartilhar suas idéias.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-100 pergunta" style="padding: 0px 20px 0px 20px; box-sizing: border-box;">
				<textarea name="txtTexto" id="txtTexto" placeholder="Digite algo..." style="border: none; height: 50px; padding-left: 5px"></textarea>
			</div>
		</div>
		<div style="border-top: 1px solid  rgba(239,105,25,0.1); margin-top: 10px;">
			<div class="row">
				<div class="col-05" style="margin-left: 5px;">

				</div>
				<div class="col-40">
					<button type="button" style="padding: 6px 10px">Foto</button>
				</div>
				<div class="col-60">
					<input type="submit" name="btnPublicarRede" id="btnPublicarRede" style="padding: 8px 10px" value="Publicar">
				</div>
			</div>
		</div>
	</form>
</div>
<script>

	$(function(){
		//Submit do txtTexto usando enter
		$("#txtTexto").keypress(function(e){
			if(e.wich == 13 || e.keyCode == 13){
				e.preventDefault();
				$("#btnPublicarRede").trigger("click");
			}
		});
	})
	
</script>