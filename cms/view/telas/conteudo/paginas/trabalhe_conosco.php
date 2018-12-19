<?php

    @session_start();
    require_once($_SESSION['require']."cms/controller/conteudo/controllerTrabalheConosco.php");
    $controllerTrabalheConosco = new controllerTrabalheConosco();
    
    $listInicio =  $controllerTrabalheConosco->buscarTrabalheConosco(7);
	$conteudoINI = explode(";",$listInicio->getConteudo());
    $fotoINI = $listInicio->getFoto();

    $listQuadro1 =  $controllerTrabalheConosco->buscarTrabalheConosco(8);
	$conteudoQuadro1 = explode(";",$listQuadro1->getConteudo());
    $fotoQuadro1 = $listQuadro1->getFoto();

    $listQuadro2 =  $controllerTrabalheConosco->buscarTrabalheConosco(9);
	$conteudoQuadro2 = explode(";",$listQuadro2->getConteudo());
    $fotoQuadro2 = $listQuadro2->getFoto();

    $listQuadro3 =  $controllerTrabalheConosco->buscarTrabalheConosco(10);
	$conteudoQuadro3 = explode(";",$listQuadro3->getConteudo());
    $fotoQuadro3 = $listQuadro3->getFoto();

    $listQuadro4 =  $controllerTrabalheConosco->buscarTrabalheConosco(11);
	$conteudoQuadro4 = explode(";",$listQuadro4->getConteudo());
    $fotoQuadro4 = $listQuadro4->getFoto();

    $listQuadro5 =  $controllerTrabalheConosco->buscarTrabalheConosco(12);
	$conteudoQuadro5 = explode(";",$listQuadro5->getConteudo());
    $fotoQuadro5 = $listQuadro5->getFoto();


?>
<script>
    
    //Carrega foto do banco no formulario se existir 
    setInterval(<?= $fotoINI != "" ? "loadOnEdit('container-foto','".$_SESSION['requireUrl'].$fotoINI."','".$_SESSION['requireUrl']."',formInicio)" : ""?>,300);
    
    setInterval(<?= $fotoQuadro1 != "" ? "loadOnEdit('container-foto-quadro1TC','".$_SESSION['requireUrl'].$fotoQuadro1."','".$_SESSION['requireUrl']."',formQuadro1)" : ""?>,300);
    
    setInterval(<?= $fotoQuadro2 != "" ? "loadOnEdit('container-foto-quadro2TC','".$_SESSION['requireUrl'].$fotoQuadro2."','".$_SESSION['requireUrl']."',formQuadro2)" : ""?>,300);
    
    setInterval(<?= $fotoQuadro3 != "" ? "loadOnEdit('container-foto-quadro3TC','".$_SESSION['requireUrl'].$fotoQuadro3."','".$_SESSION['requireUrl']."',formQuadro3)" : ""?>,300);
    
    setInterval(<?= $fotoQuadro4 != "" ? "loadOnEdit('container-foto-quadro4TC','".$_SESSION['requireUrl'].$fotoQuadro4."','".$_SESSION['requireUrl']."',formQuadro4)" : ""?>,300);
    
    setInterval(<?= $fotoQuadro5 != "" ? "loadOnEdit('container-foto-quadro5TC','".$_SESSION['requireUrl'].$fotoQuadro5."','".$_SESSION['requireUrl']."',formQuadro5)" : ""?>,300);
    
    //Caregar foto no formulario 
    pegarFoto("flFoto", "container-foto", "formInicioFoto");
    pegarFoto("flFotoQuadro1", "container-foto-quadro1TC", "formQuadro1Foto");
    pegarFoto("flFotoQuadro2", "container-foto-quadro2TC", "formQuadro2Foto");
    pegarFoto("flFotoQuadro3", "container-foto-quadro3TC", "formQuadro3Foto");
    pegarFoto("flFotoQuadro4", "container-foto-quadro4TC", "formQuadro4Foto");
    pegarFoto("flFotoQuadro5", "container-foto-quadro5TC", "formQuadro5Foto");
    
    //Submit de formulario
    enviarFormulario("formInicio","../../router.php?controller=conteudoTrabalheConosco&modo=editarInicio&id=7");
    enviarFormulario("formQuadro1","../../router.php?controller=conteudoTrabalheConosco&modo=editarQuadro1&id=8");
    enviarFormulario("formQuadro2","../../router.php?controller=conteudoTrabalheConosco&modo=editarQuadro2&id=9");
    enviarFormulario("formQuadro3","../../router.php?controller=conteudoTrabalheConosco&modo=editarQuadro3&id=10");
    enviarFormulario("formQuadro4","../../router.php?controller=conteudoTrabalheConosco&modo=editarQuadro4&id=11");
    enviarFormulario("formQuadro5","../../router.php?controller=conteudoTrabalheConosco&modo=editarQuadro5&id=12");


</script>
<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Inicio</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formInicio&nomeFt=flFoto&local=<?= urlencode('img/conteudo/trabalheConosco/')?>" method="post" id="formInicioFoto" name="formInicioFoto" enctype="multipart/form-data">
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
						<div class="col-50">
							 <label for="txtTitulo">Titulo:</label>
						</div>
						<div class="col-50">
							 <label for="txtSubtitulo">Subtitulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoINI[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtSubtitulo" name="txtSubtitulo" value="<?= $conteudoINI[1] ?>" placeholder="Digite o Subtitulo..." required>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/trabalhe.png" width="70%" >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Quadro 1</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formQuadro1&nomeFt=flFotoQuadro1&local=<?= urlencode('img/conteudo/trabalheConosco/')?>" method="post" id="formQuadro1Foto" name="formQuadro1Foto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoQuadro1" class="container-foto" id="container-foto-quadro1TC"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoQuadro1" name="flFotoQuadro1">
						</div>
					</div>
				</form>
				<form id="formQuadro1" name="formQuadro1">
					<div class="row">
						<div class="col-50">
							 <label for="txtTitulo">Titulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoQuadro1[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoQuadro1[1] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/trabalhe.png" width="70%">
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Quadro 2</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formQuadro2&nomeFt=flFotoQuadro2&local=<?= urlencode('img/conteudo/trabalheConosco/')?>" method="post" id="formQuadro2Foto" name="formQuadro2Foto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoQuadro2" class="container-foto" id="container-foto-quadro2TC"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoQuadro2" name="flFotoQuadro2">
						</div>
					</div>
				</form>
				<form id="formQuadro2" name="formQuadro2">
					<div class="row">
						<div class="col-50">
							 <label for="txtTitulo">Titulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoQuadro2[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoQuadro2[1] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/trabalhe.png" width="70%" >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Quadro 3</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formQuadro3&nomeFt=flFotoQuadro3&local=<?= urlencode('img/conteudo/trabalheConosco/')?>" method="post" id="formQuadro3Foto" name="formQuadro3Foto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoQuadro3" class="container-foto" id="container-foto-quadro3TC"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoQuadro3" name="flFotoQuadro3">
						</div>
					</div>
				</form>
				<form id="formQuadro3" name="formQuadro3">
					<div class="row">
						<div class="col-50">
							 <label for="txtTitulo">Titulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoQuadro3[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoQuadro3[1] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/trabalhe.png" width="70%" >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Quadro 4</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formQuadro4&nomeFt=flFotoQuadro4&local=<?= urlencode('img/conteudo/trabalheConosco/')?>" method="post" id="formQuadro4Foto" name="formQuadro4Foto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoQuadro4" class="container-foto" id="container-foto-quadro4TC"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoQuadro4" name="flFotoQuadro4">
						</div>
					</div>
				</form>
				<form id="formQuadro4" name="formQuadro4">
					<div class="row">
						<div class="col-50">
							 <label for="txtTitulo">Titulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoQuadro4[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoQuadro4[1] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/trabalhe.png" width="70%" >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Quadro 5</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formQuadro5&nomeFt=flFotoQuadro5&local=<?= urlencode('img/conteudo/trabalheConosco/')?>" method="post" id="formQuadro5Foto" name="formQuadro5Foto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoQuadro5" class="container-foto" id="container-foto-quadro5TC"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoQuadro5" name="flFotoQuadro5">
						</div>
					</div>
				</form>
				<form id="formQuadro5" name="formQuadro5">
					<div class="row">
						<div class="col-50">
							 <label for="txtTitulo">Titulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoQuadro5[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoQuadro5[1] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/trabalhe.png" width="70%" >
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