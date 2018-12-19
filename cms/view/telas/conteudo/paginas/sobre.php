<?php
    @session_start();
    require_once($_SESSION['require']."cms/controller/conteudo/controllerSobre.php");
    $controllerSobre = new controllerSobre();
    
    $listInicio =  $controllerSobre->buscarSobre(3);
	$conteudoINI = explode(";",$listInicio->getConteudo());
    $fotoINI = explode(";",$listInicio->getFoto());

    $listNossaHistoria =  $controllerSobre->buscarSobre(4);
	$conteudoNH = explode(";",$listNossaHistoria->getConteudo());
    $fotoNH = $_SESSION['requireUrl'].$listNossaHistoria->getFoto();

    $listNossaFilosofia =  $controllerSobre->buscarSobre(5);
	$conteudoNF = explode(";",$listNossaFilosofia->getConteudo());
    $fotoNF = $_SESSION['requireUrl'].$listNossaFilosofia->getFoto();

    $listParceiros =  $controllerSobre->buscarSobre(6);
	$conteudoParceiros = $listParceiros->getConteudo();
    $fotoParceiros = $_SESSION['requireUrl'].$listParceiros->getFoto();


?> 

<script>

	$(document).ready(function(){
        
        //Carrega foto do banco no formulario se existir 
        setInterval(<?= $fotoINI[1] != "" ? "loadOnEdit('container-foto1','".$_SESSION['requireUrl'].$fotoINI[2]."','".$_SESSION['requireUrl']."',formInicio)" : ""?>,300);
        
        setInterval(<?= $fotoINI[0] != "" ? "loadOnEdit('container-foto','".$_SESSION['requireUrl'].$fotoINI[0]."','".$_SESSION['requireUrl']."',formInicio)" : ""?>,300);
        
        setInterval(<?= $fotoINI[2] != "" ? "loadOnEdit('container-foto2','".$_SESSION['requireUrl'].$fotoINI[2]."','".$_SESSION['requireUrl']."',formInicio)" : ""?>,300);
        
        setInterval(<?= $fotoNF != "" ? "loadOnEdit('container-foto-NossaFilo','".$fotoNF."','".$_SESSION['requireUrl']."',formNossaFilosofia )" : ""?>,300);
        
        setInterval(<?= $fotoNH != "" ? "loadOnEdit('container-foto-NossaHist','".$fotoNH."','".$_SESSION['requireUrl']."',formNossaHistoria)" : ""?>,300);
        
        setInterval(<?= $fotoParceiros != "" ? "loadOnEdit('container-foto-parceiros','".$fotoParceiros."','".$_SESSION['requireUrl']."',formParceiros)" : ""?>,300);
        
        //Caregar foto no formulario 
        pegarFoto("flFoto", "container-foto", "formInicioFoto");
        pegarFoto("flFoto1", "container-foto1", "formInicioFoto1");
        pegarFoto("flFoto2", "container-foto2", "formInicioFoto2");
        pegarFoto("flFotoNossaHist", "container-foto-NossaHist", "formNossaHistoriaFoto");
		pegarFoto("flFotoNossaFilo", "container-foto-NossaFilo", "formNossaFilosofiaFoto");
		pegarFoto("flFotoParceiros", "container-foto-parceiros", "formParceirosFoto");

		//Submit de formulario
        enviarFormulario("formInicio","../../router.php?controller=conteudoSobre&modo=editarInicio&id=3");
		enviarFormulario("formNossaHistoria","../../router.php?controller=conteudoSobre&modo=editarNH&id=4");
		enviarFormulario("formNossaFilosofia","../../router.php?controller=conteudoSobre&modo=editarNF&id=5"); 
		enviarFormulario("formParceiros","../../router.php?controller=conteudoSobre&modo=editarParceiros&id=6"); 

	});
    
</script>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Inicio</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
                <div class="row" style="margin-left: 45px;">
                    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formInicio&nomeFt=flFoto1&local=<?= urlencode('img/conteudo/sobre/inicio/')?>&input=txtFoto1" method="post" id="formInicioFoto1" name="formInicioFoto1" enctype="multipart/form-data">
                        <div class="col-30">
                            <h6 class="titulo" style="margin-bottom: 10px;">Imagem 1</h6>
                            <label for="flFoto1" class="container-foto" id="container-foto1"></label>
                            <input type="file" class="flFoto"  id="flFoto1" name="flFoto1">
                        </div>
                    </form>
                    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formInicio&nomeFt=flFoto&local=<?= urlencode('img/conteudo/sobre/inicio/')?>" method="post" id="formInicioFoto" name="formInicioFoto" enctype="multipart/form-data">
                        <div class="col-30"> 
                            <h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
                            <div class="col-100">
                                 <label for="flFoto" class="container-foto" id="container-foto"></label>
                                 <input type="file" id="flFoto" name="flFoto">
                            </div>
                        </div>
				    </form>
                    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formInicio&nomeFt=flFoto2&local=<?= urlencode('img/conteudo/sobre/inicio/')?>&input=txtFoto2" method="post" id="formInicioFoto2" name="formInicioFoto2" enctype="multipart/form-data">
                        <div class="col-30">
                            <h6 class="titulo" style="margin-bottom: 10px;">Imagem 2</h6>
                            <label for="flFoto2" class="container-foto" id="container-foto2"></label>
                            <input type="file" class="flFoto"  id="flFoto2" name="flFoto2">
                        </div>
                    </form>
                
                </div>
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
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoINI[0]?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtSubtitulo" name="txtSubtitulo" value="<?= $conteudoINI[1]?>" placeholder="Digite o Subtitulo..." required>
						</div>
					</div>

					<div class="row container_form" style="padding: 10px;">
						<h6 class="titulo">Conteudo referente a imagem 1</h6>
						<div class="col-100">
							<div class="row">
								<div class="col-100">
								   <label for="txtSubImg1">Subtitulo imagem 1:</label>
								</div>
							</div>
							<div class="row">
								<div class="col-100">
								   <input type="text" id="txtSubImg1" name="txtSubImg1" value="<?= $conteudoINI[2]?>" placeholder="Digite o Subtitulo..." required> 
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-100">
								   <label for="txtDescImg1">Texto imagem 1:</label>
								</div>
							</div>
						<div class="row">
							<div class="col-100">
							   <input type="text" id="txtDescImg1" name="txtDescImg1" value="<?= $conteudoINI[3]?>" placeholder="Digite o Texto..." required>
                                <input name="txtFoto1" type="text" hidden="" required>
                                <input name="txtFoto2" type="text" hidden="" required>
							</div>
						</div>
					</div>

					<div class="row container_form" style="padding: 10px;">
						<h6 class="titulo">Conteudo referente a imagem 2</h6>
						<div class="col-100">
							<div class="row">
								<div class="col-100">
								   <label for="txtDescImg2">Subtitulo imagem 2:</label>
								</div>
							</div>
							<div class="row">
								<div class="col-100">
								    <input type="text" id="txtSubImg2" name="txtSubImg2" value="<?= $conteudoINI[4]?>" placeholder="Digite o Subtitulo..." required> 
								</div>
							</div>
						</div>
                
						<div class="row">
								<div class="col-100">
								   <label for="txtDescImg2">Texto imagem 2:</label>
								</div>
							</div>
						<div class="row">
							<div class="col-100">
							   <input type="text" id="txtDescImg2" name="txtDescImg2" value="<?= $conteudoINI[5]?>" placeholder="Digite o Texto..." required> 
							</div>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/ini_sobre.png" width="70%"
                     >
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Nossa Historia</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formNossaHistoria&nomeFt=flFotoNossaHist&local=<?= urlencode('img/conteudo/sobre/nossa_historia/')?>" method="post" id="formNossaHistoriaFoto" name="formNossaHistoriaFoto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoNossaHist" class="container-foto" id="container-foto-NossaHist"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoNossaHist" name="flFotoNossaHist">
						</div>
					</div>
				</form>
				<form id="formNossaHistoria" name="formNossaHistoria">
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
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoNH[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtSubTitulo" name="txtSubTitulo" value="<?= $conteudoNH[1] ?>" placeholder="Digite o Subtitulo..." required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoNH[2] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/nossa_historia.png" width="70%">
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Nossa Filosofia</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formNossaFilosofia&nomeFt=flFotoNossaFilo&local=<?= urlencode('img/conteudo/sobre/nossa_filosofia/')?>" method="post" id="formNossaFilosofiaFoto" name="formNossaFilosofiaFoto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoNossaFilo" class="container-foto" id="container-foto-NossaFilo"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoNossaFilo" name="flFotoNossaFilo">
						</div>
					</div>
				</form>
				<form id="formNossaFilosofia" name="formNossaFilosofia">
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
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoNF[0] ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
						</div>
						<div class="col-50">
							 <input type="text" id="txtSubTitulo" name="txtSubTitulo" value="<?= $conteudoNF[1] ?>" placeholder="Digite o Subtitulo..." required>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma texto..." required><?= $conteudoNF[2] ?></textarea>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/nossa_historia.png" width="70%">
			</div>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 100%;">
	<button class="accordion">Rodapé parceiros</button>
	<div class="panel">
		<div class="row">
			<div class="col-70" style="padding: 10px; box-sizing: border-box;">
				<form action="../../controller/function/functions.php?uploadFotoAjax&form=formParceiros&nomeFt=flFotoParceiros&local=<?= urlencode('img/conteudo/sobre/parceiros/')?>" method="post" id="formParceirosFoto" name="formParceirosFoto" enctype="multipart/form-data">
					<div class="row">
						<h6 class="titulo" style="margin-bottom: 10px;">Background</h6>
						<div class="col-100">
							 <label for="flFotoParceiros" class="container-foto" id="container-foto-parceiros"></label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="file" class="flFoto" id="flFotoParceiros" name="flFotoParceiros">
						</div>
					</div>
				</form>
				<form id="formParceiros" name="formParceiros">
					<div class="row">
						<div class="col-100">
							 <label for="txtTitulo">Titulo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="text" id="txtTitulo" name="txtTitulo" value="<?= $conteudoParceiros ?>" placeholder="Digite o titulo..." required>
							<input name="txtFoto" type="text" hidden="" required>
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
				<img class="center container_form" style="margin-left: 40px" src="<?=$_SESSION['requireUrl']?>img/tela_referencia/parceiros.png" width="70%">
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