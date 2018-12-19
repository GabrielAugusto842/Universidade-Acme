<i class="fal fa-times fa-2x t-clr2" onClick="closeModal()" style="position: absolute; right: 20px; top: 20px; cursor: pointer;"></i>
<h2 class="titulo t-clr4" style="text-align: center; margin: 20px 0px;">Mensalidades</h2>
<div class="row">
	<div class="col-60">
		<div class="row" style="padding: 15px; box-sizing: border-box; border-bottom: 1px solid rgba(239,105,25,0.1);">
			<div class="col-40">
				<h5 class="titulo t-clr4" style="margin-top: 5px;">Mensalidade</h5>
			</div>
			<div class="col-25">
				<h5 class="titulo t-clr2" style="margin-top: 5px; text-align: center">Data</h5>
			</div>
			<div class="col-30">
				<h5 class="titulo t-clr2" style="margin-top: 5px; text-align: center;">Status</h5>
			</div>
		</div>
		
<?php

	@session_start();

	require_once($_SESSION['require']."/dashboard/controller/controllerMensalidade.php");

	$controllerMensalidade = new controllerMensalidade();
	$rsMensalidades = $controllerMensalidade->listarMensalidadeByAluno($_SESSION['aluno']["matricula"]);
		
	$cont = 0;
		
	while($cont < count($rsMensalidades)){


?>
		
		<div class="row" style="padding: 15px; box-sizing: border-box; border-bottom: 1px solid rgba(239,105,25,0.1);">
			<div class="col-40">
				<h5 class="titulo t-clr4" style="margin-top: 5px;">Mensalidade <?= $vle= $cont + 1 ?></h5>
			</div>
			<div class="col-25">
				<h5 class="titulo t-clr2" style="margin-top: 5px;"><?= $rsMensalidades[$cont]->getDtVencimento()?></h5>
			</div>
			<div class="col-15">
				<i class="fal fa-check fa-2x centralizarX" style="color: forestgreen"></i>
			</div>
			<div class="col-20">
				<button type="button" style="margin-top: -3px; color: forestgreen; border-color: forestgreen;">Paga</button>
			</div>
		</div>
<?php
		$cont++;
										 
	 }
?>
	</div>
	<div class="col-40" style="padding: 20px; box-sizing: border-box;">
		<div class="box-2">
			<div class="row">
				<div class="col-100">
					<h5 class="titulo t-clr4" style="margin-top: 5px;">Mensalidade 1</h5>
				</div>
				<div class="col-100">
					<div class="col-100"><h5 class="titulo t-clr2" style="margin-top: 5px;"><span class="t-clr4">Nome: </span><?= $_SESSION['aluno']["nome"]?></h5></div>
				</div>
				<div class="col-100">
					<div class="col-100"><h5 class="titulo t-clr2" style="margin-top: 5px;"><span class="t-clr4">CPF: </span><?= $_SESSION['aluno']["cpf"]?></h5></div>
					
				</div>
				<div class="col-100">
					<div class="col-100"><h5 class="titulo t-clr2" style="margin-top: 5px;"><span class="t-clr4">Valor: </span>R$ 150,00</h5></div>
				</div>
				<div class="col-100">
					<h5 class="titulo t-clr2"><span class="t-clr4" style="margin-top: 5px;">Vencimento: </span>22/05/2019</h5>
				</div>
				<div class="col-100"><h5 class="titulo t-clr2" style="margin-top: 5px;"><span class="t-clr4">Juros/Desconto: </span>R$ 00,00</h5></div>
			</div>
		</div>
	</div>
</div>