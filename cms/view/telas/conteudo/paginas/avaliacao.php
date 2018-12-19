<?php 

    @session_start();
    require_once($_SESSION['require']."cms/controller/conteudo/controllerAvaliacao.php");
    $controllerAvaliacao = new controllerAvaliacao();
    
    $listInicio =  $controllerAvaliacao->buscarAvaliacao(1);
	$conteudoINI = explode(";",$listInicio->getConteudo());
    $fotoINI = $listInicio->getFoto();

?>

<script>

    $(document).ready(function(){
        //Pegar Foto
        pegarFoto("flFoto", "container-foto", "formAvaliacaoFoto");
        //Submit de formulario
        enviarFormulario("formAvaliacao","../../router.php?controller=conteudoAvaliacao&modo=editarInicio&id=1");
        //Carrega foto do banco no formulario se existir 
        setInterval(<?= $fotoINI != "" ? "loadOnEdit('container-foto','".$_SESSION['requireUrl'].$fotoINI."','".$_SESSION['requireUrl']."',formAvaliacao)" : ""?>,300);
        
    });
    
</script>
<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Inicio</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formAvaliacao&nomeFt=flFoto&local=<?= urlencode('img/conteudo/avaliacao/')?>" method="post" id="formAvaliacaoFoto" name="formAvaliacaoFoto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFoto" class="container-foto" id="container-foto"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" id="flFoto" name="flFoto">
						</div>
					</div>
				</form>
				<form id="formAvaliacao" name="formAvaliacao">
					<div class="row">
						<div class="col-50">
							 <label for="txtTitulo">Titulo:</label>
						</div>
						<div class="col-50">
							 <label for="txtSubTitulo">Subtitulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoINI[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtSubTitulo" name="txtSubtitulo" value="<?= $conteudoINI[1] ?>" placeholder="Digite o Subtitulo..." required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
						   <input type="text" id="txtT1" name="txtT1" value="<?= $conteudoINI[2] ?>" placeholder="Digite o Texto 1..." required> 
						</div>
					</div>
					<div class="row">
						<div class="col-100">
						   <input type="text" id="txtT2" name="txtT2" value="<?= $conteudoINI[3] ?>" placeholder="Digite o Texto 2..." required> 
						</div>
					</div>
					
					<div class="row">
						<div class="col-100-b-full">
							<input type="submit" name="btnSalvar" id="btnSalvar" value="Salvar">
						</div>
					</div>
				</form>
			</div>
			<div class="col-30" style="box-sizing: border-box;">
				<h6 class="titulo" style="margin-bottom: 10px;">Tela de referência</h6>
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/avaliacao.png" width="70%">
			</div>
		</div>
	</div>
</div>

<script>
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight){
		  panel.style.maxHeight = null;
		} else {
		  panel.style.maxHeight = panel.scrollHeight + "px";
		} 
	  });
	}
</script>