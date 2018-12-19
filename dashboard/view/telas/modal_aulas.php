<i class="fal fa-times fa-2x t-clr2" onClick="closeModal()" style="position: absolute; right: 20px; top: 20px; cursor: pointer;"></i>
<h2 class="titulo t-clr4" style="text-align: center; margin: 20px 0px;">Aulas</h2>
<div class="container_tabela" style="width: 80%;">
	<table>
		<thead>
			<tr>
				<th>Data</th>
				<th>Disciplina</th>
				<th>Faltas</th>
			</tr>
		</thead>
		<tbody style="height: 350px;">
			<?php
			@session_start();
			require_once($_SESSION['require']."/dashboard/controller/controllerAula.php");

			$controllerAula = new controllerAula();
			$rsAula = $controllerAula->listarAulaByAluno($_SESSION['aluno']['matricula']);
			
			$cont = 0;
			$falta = 0;
			while($cont < count($rsAula)){
				$presenca = $rsAula[$cont]->getPresenca();
			?>
			<tr>
				<td><?= $rsAula[$cont]->getData();?></td>
				<td><?= $rsAula[$cont]->getDisciplina();?></td>
				<td><?= $presenca;?></td>
			</tr>
			<?php
				if ($presenca=="Faltou") {
					$falta++;
				}
				$cont++;
			}
			$qtd = $cont-$falta;
			$frequencia = $qtd/$cont * 100;
			?>
		</tbody>
	</table>
</div>

<div class="row centralizarX" style="width: 80%; margin-bottom: 20px;">
	<div class="col-30">
		<div class="box-2 t-center">
			<?= "Total de aulas: ".$cont; ?>
		</div>
	</div>
	<div class="col-30" style="margin: 0 5%">
		<div class="box-2 t-center">
			<?= "Frequência: ".$frequencia."%"; ?>
		</div>
	</div>
	<div class="col-30">
		<div class="box-2 t-center">
			<?= "Total de faltas: ".$falta; ?>
		</div>
	</div>
</div>
