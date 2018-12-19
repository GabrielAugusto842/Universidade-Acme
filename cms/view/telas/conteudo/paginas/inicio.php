<?php

    @session_start();
    require_once($_SESSION['require']."cms/controller/conteudo/controllerHome.php");
    $controllerHome = new controllerHome();
    
    $listInicio =  $controllerHome->buscarHome(2);
	$conteudoINI = explode(";",$listInicio->getConteudo());
    $fotoINI = $listInicio->getFoto();


?>

<script>

    $(document).ready(function(){
        //Pegar Foto
        pegarFoto("flFoto", "container-foto", "formInicioFoto");
        pegarFoto("flFotoSlide1", "container-foto-slide1", "formSlide1Foto");
        pegarFoto("flFotoSlide2", "container-foto-slide2", "formSlide2Foto");
        pegarFoto("flFotoSlide3", "container-foto-slide3", "formSlide3Foto");
        pegarFoto("flFotoSlide4", "container-foto-slide4", "formSlide4Foto");
        //Submit de formulario
        enviarFormulario("formInicio","../../router.php?controller=conteudoHome&modo=editarInicio&id=2");
        enviarFormulario("formSlide","../../router.php?controller=campanha&modo=editar&id=1");
        //Carrega foto do banco no formulario se existir 
        setInterval(<?= $fotoINI != "" ? "loadOnEdit('container-foto','".$_SESSION['requireUrl'].$fotoINI."','".$_SESSION['requireUrl']."',formInicio)" : ""?>,300);
        
    });
    
</script>
<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Slider</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<div class="row">
					
					<div class="col-25">
						<form action="../../controller/function/functions.php?uploadFotoAjax&form=formSlide&nomeFt=flFotoSlide1&local=<?= urlencode('img/conteudo/home/')?>" method="post" id="formSlide1Foto" name="formSlide1Foto" enctype="multipart/form-data">
							<div class="row">
								<h6 class="titulo" style="margin-bottom: 10px;">Imagem 1</h6>
								<div class="col-100">
									 <label for="flFotoSlide1" class="container-foto" id="container-foto-slide1"></label>
								</div>
							</div>
							<div class="row">
								<div class="col-100">
									<input type="file" class="flFoto" id="flFotoSlide1" name="flFotoSlide1">
								</div>
							</div>
						</form>
					</div>
					
					<div class="col-25">
						<form action="../../controller/function/functions.php?uploadFotoAjax&form=formSlide&nomeFt=flFotoSlide2&local=<?= urlencode('img/conteudo/home/')?>&input=txtFoto1" method="post" id="formSlide2Foto" name="formSlide2Foto" enctype="multipart/form-data">
							<div class="row">
								<h6 class="titulo" style="margin-bottom: 10px;">Imagem 2</h6>
								<div class="col-100">
									 <label for="flFotoSlide2" class="container-foto" id="container-foto-slide2"></label>
								</div>
							</div>
							<div class="row">
								<div class="col-100">
									<input type="file" class="flFoto" id="flFotoSlide2" name="flFotoSlide2">
								</div>
							</div>
						</form>
					</div>
					
					<div class="col-25">
						<form action="../../controller/function/functions.php?uploadFotoAjax&form=formSlide&nomeFt=flFotoSlide3&local=<?= urlencode('img/conteudo/home/')?>&input=txtFoto2" method="post" id="formSlide3Foto" name="formSlide3Foto" enctype="multipart/form-data">
							<div class="row">
								<h6 class="titulo" style="margin-bottom: 10px;">Imagem 3</h6>
								<div class="col-100">
									 <label for="flFotoSlide3" class="container-foto" id="container-foto-slide3"></label>
								</div>
							</div>
							<div class="row">
								<div class="col-100">
									<input type="file" class="flFoto" id="flFotoSlide3" name="flFotoSlide3">
								</div>
							</div>
						</form>
					</div>
					
					<div class="col-25">
						<form action="../../controller/function/functions.php?uploadFotoAjax&form=formSlide&nomeFt=flFotoSlide4&local=<?= urlencode('img/conteudo/home/')?>&input=txtFoto3" method="post" id="formSlide4Foto" name="formSlide4Foto" enctype="multipart/form-data">
							<div class="row">
								<h6 class="titulo" style="margin-bottom: 10px;">Imagem 4</h6>
								<div class="col-100">
									 <label for="flFotoSlide4" class="container-foto" id="container-foto-slide4"></label>
								</div>
							</div>
							<div class="row">
								<div class="col-100">
									<input type="file" class="flFoto" id="flFotoSlide4" name="flFotoSlide4">
								</div>
							</div>
						</form>
					</div>
					
					
				</div>
				<form id="formSlide" name="formSlide">
					<div class="row">
						<div class="col-100">
							<input name="txtFoto" type="text" hidden="" required>
							<input name="txtFoto1" type="text" hidden="" required>
							<input name="txtFoto2" type="text" hidden="" required>
							<input name="txtFoto3" type="text" hidden="" required>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/slide.png" width="70%">
			</div>
		</div>
	</div>
</div>
<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Inicio</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formInicio&nomeFt=flFoto&local=<?= urlencode('img/conteudo/home/')?>" method="post" id="formInicioFoto" name="formInicioFoto" enctype="multipart/form-data">
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
				<form id="formInicio" name="formInicio">
					<div class="row">
						<div class="col-100">
							 <label for="txtTitulo">Frase:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoINI[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
						   <input type="text" id="txtSubtitulo" name="txtSubtitulo" value="<?= $conteudoINI[1] ?>" placeholder="Digite a frase..." required> 
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/inicio.png" width="70%">
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