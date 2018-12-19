<?php

    @session_start();
    require_once($_SESSION['require']."cms/controller/conteudo/controllerVestibular.php");
    $controllerVestibular = new controllerVestibular();
    
    $listInicio =  $controllerVestibular->buscarVestibular(13);
	$conteudoINI = explode(";",$listInicio->getConteudo());
    $fotoINI = $listInicio->getFoto();

    $listBS =  $controllerVestibular->buscarVestibular(14);
	$conteudoBS = explode(";",$listBS->getConteudo());
    $fotoBS = $listBS->getFoto();

    $listConvenio =  $controllerVestibular->buscarVestibular(15);
	$conteudoConvenio = explode(";",$listConvenio->getConteudo());
    $fotoConvenio = $listConvenio->getFoto();


?>

<script>
    
        //PegarArquivo
        pegarArquivo("flArquivo", "container-arquivo", "formListaAquivo");
    
        //Carrega foto do banco no formulario se existir 
        setInterval(<?= $fotoINI != "" ? "loadOnEdit('container-foto','".$_SESSION['requireUrl'].$fotoINI."','".$_SESSION['requireUrl']."',formInicio)" : ""?>,300);
    
        setInterval(<?= $fotoBS != "" ? "loadOnEdit('container-foto-bolsa','".$_SESSION['requireUrl'].$fotoBS."','".$_SESSION['requireUrl']."',formBolsa)" : ""?>,300);
    
        setInterval(<?= $fotoConvenio != "" ? "loadOnEdit('container-foto-convenio','".$_SESSION['requireUrl'].$fotoConvenio."','".$_SESSION['requireUrl']."',formConvenio)" : ""?>,300);
    
        //Caregar foto no formulario 
        pegarFoto("flFoto", "container-foto", "formInicioFoto");
        pegarFoto("flFotoBolsa", "container-foto-bolsa", "formBolsaFoto");
        pegarFoto("flFotoConvenio", "container-foto-convenio", "formConvenioFoto");
        
        //Submit de formulario
        enviarFormulario("formInicio","../../router.php?controller=conteudoVestibular&modo=editarInicio&id=13");
        enviarFormulario("formBolsa","../../router.php?controller=conteudoVestibular&modo=editarBS&id=14");
        enviarFormulario("formConvenio","../../router.php?controller=conteudoVestibular&modo=editarConvenio&id=15");
        enviarFormulario("formLista","../../router.php?controller=conteudoVestibular&modo=editarLista&id=1");

</script>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Inicio</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formInicio&nomeFt=flFoto&local=<?= urlencode('img/conteudo/vestibular/inicio')?>" method="post" id="formInicioFoto" name="formInicioFoto" enctype="multipart/form-data">
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
							 <label for="txtNome">Titulo:</label>
						</div>
						<div class="col-50">
							 <label for="txtNome">Subtitulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="text" id="txtNome" name="txtTitulo" value="<?= $conteudoINI[0]?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtNome" name="txtSubtitulo" value="<?= $conteudoINI[1]?>" placeholder="Digite o Subtitulo..." required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
						   <input type="text" id="txtT" name="txtT" value="<?= $conteudoINI[2]?>" placeholder="Digite o Texto..." required> 
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/ini_vestibular.png" width="70%" >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Lista</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
                <form action="../../controller/function/functions.php?uploadArquivoAjax&form=formLista&nomeArq=flArquivo&local=<?= urlencode('cms/view/arquivos/lista/')?>" method="post" id="formListaAquivo" name="formListaAquivo" enctype="multipart/form-data">
					<div class="row">
                        <h6 class="titulo" style="margin-bottom: 10px;">Lista</h6>
						<div class="col-100">
							 <label for="flArquivo" class="container-arquivo" id="container-arquivo"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flArquivo" id="flArquivo" name="flArquivo">
						</div>
					</div>
				</form>
                <form id="formLista" name="formLista">
					<div class="row">
						<div class="col-50">
							 <input type="text" name="txtArquivo" hidden required>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/ini_vestibular.png" width="70%" >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Bolsa de Estudos</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formBolsa&nomeFt=flFotoBolsa&local=<?= urlencode('img/conteudo/vestibular/bolsa/')?>" method="post" id="formBolsaFoto" name="formBolsaFoto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoBolsa" class="container-foto" id="container-foto-bolsa"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoBolsa" name="flFotoBolsa">
						</div>
					</div>
				</form>
				<form id="formBolsa" name="formBolsa">
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
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoBS[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtSubtitulo" name="txtSubtitulo" value="<?= $conteudoBS[1] ?>" placeholder="Digite o Subtitulo..." required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoBS[2] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/vestibular.png" width="70%" >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Convenios</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formConvenio&nomeFt=flFotoConvenio&local=<?= urlencode('img/conteudo/vestibular/convenio/')?>" method="post" id="formConvenioFoto" name="formConvenioFoto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoConvenio" class="container-foto" id="container-foto-convenio"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoConvenio" name="flFotoConvenio">
						</div>
					</div>
				</form>
				<form id="formConvenio" name="formConvenio">
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
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoConvenio[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtSubtitulo" name="txtSubtitulo" value="<?= $conteudoConvenio[1] ?>" placeholder="Digite o Subtitulo..." required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoConvenio[2] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/vestibular.png" width="70%" >
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