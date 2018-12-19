<?php
@session_start();
require_once($_SESSION['require']."/dashboard/controller/controllerEntrega.php");

$titulo = "";
$arquivo = "";
$data = "";
$disciplina = "";
$professor = "";

$controllerEntrega = new controllerEntrega();
$matricula = $_SESSION['aluno']["matricula"];
$idEntrega = $_GET['idEntrega'];
$rsEntrega = $controllerEntrega->BuscarEntregaByAlunoAndId($matricula, $idEntrega);

if(isset($idEntrega)){
	$titulo = $rsEntrega->getTitulo();
	$arquivo = $rsEntrega->getArquivo();
	$data = $rsEntrega->getData();
	$disciplina = $rsEntrega->getDisciplina();
	$professor = $rsEntrega->getProfessor();
}
?>

<i class="fal fa-times fa-2x t-clr2" onClick="closeModal()" style="position: absolute; right: 20px; top: 20px; cursor: pointer;"></i>
<div id="container_entrega_trabalho">
	<h2 class="titulo t-clr4" style="margin: 20px 0px;">Entrega de trabalho</h2>
	<div class="row">
		<div class="col-50">
			<div class="row">
				<div class="col-100">
					<h5 class="titulo t-clr2"><span class="t-clr4">Titulo do trabalho: </span><?= $titulo; ?></h5>
				</div>
				<div class="col-100">
					<h5 class="titulo t-clr2"><span class="t-clr4">Instruções: </span><?= $arquivo; ?></h5>
				</div>
				<div class="col-100">
					<h5 class="titulo t-clr2"><span class="t-clr4">Disciplina: </span><?= $disciplina; ?></h5>
				</div>
				<div class="col-100">
					<h5 class="titulo t-clr2"><span class="t-clr4">Professor: </span><?= $professor; ?></h5>
				</div>
				<div class="col-100">
					<h5 class="titulo t-clr2"><span class="t-clr4">Data de entrega: </span><?= $data; ?></h5>
				</div>
			</div>
		</div>
		<div class="col-50">
			<div class="row">
				<div class="col-100">
					<i class="fal fa-file-word fa-6x t-clr4 centralizarX" style="margin: 20px 0px 0px 40px; cursor: pointer"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-100">
			<input type="submit" value="Enviar">
		</div>
	</div>
</div>