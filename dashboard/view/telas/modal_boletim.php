<?php
@session_start();
?>

<i class="fal fa-times fa-2x t-clr2" onClick="closeModal()" style="position: absolute; right: 20px; top: 20px; cursor: pointer;"></i>
<h2 class="titulo t-clr4" style="text-align: center; margin: 20px 0px;">Boletim</h2>
<div class="row centralizarX" style="width: 40%;">
	<div class="col-45" style="margin-right: 5%;">
		<div class="box-2 t-center">
			<strong>Curso: </strong><?= $_SESSION['aluno']['curso'] ?>
		</div>
	</div>
	<div class="col-45" style="margin-left: 5%;">
		<div class="box-2 t-center">
			<strong>Turma: </strong><?= $_SESSION['aluno']['turma'] ?>
		</div>
	</div>
</div>
<div class="container_tabela" style="width: 80%; margin-top: 10px;">
	<table>
		<thead>
			<tr>
				<th>Disciplina</th>
				<th>Professor</th>
				<th>Nota final</th>
			</tr>
		</thead>
		<tbody style="height: 350px;">
			<?php
			require_once($_SESSION['require']."/dashboard/controller/controllerNota.php");

			$controllerNota = new controllerNota();
			$rsNota = $controllerNota->listarNotaByAluno($_SESSION['aluno']['matricula']);

			for($cont = 0; $cont < count($rsNota); $cont++ ){
			?>
			<tr>
				<td><?= $rsNota[$cont]->getDisciplina();?></td>
				<td><?= $rsNota[$cont]->getProfessor();?></td>
				<td><?= $rsNota[$cont]->getNota();?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
