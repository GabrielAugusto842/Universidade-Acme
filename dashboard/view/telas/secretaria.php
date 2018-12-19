<div>
	<i class="fal fa-times fa-2x t-clr2" onClick="closeModal()" style="position: absolute; right: 20px; top: 20px; cursor: pointer;"></i>
	<h2 class="titulo t-clr4 centralizarX" style="margin: 40px 0px 20px 0px">Secretaria Virtual</h2>
	<div class="centralizarX" style="width: 90%; margin: 10px 0px 40px;">
		<div class="accordion" id="frst_acc" style="box-sizing: border-box;">Aulas</div>
		<div class="panel">
			<div class="row">
				<div class="col-50">
					<label for="">Curso:</label>
				</div>
				<div class="col-50">
					<label for="">Turma:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-50">
					<select name="slcCurso" id="slcCurso" class="custom-select" placeholder="selecione o curso">
						<option value="">informatica</option>
					</select>
				</div>
				<div class="col-50">
					<select name="slcTurma" id="slcTurma" class="custom-select" placeholder="selecione a turma">
						<option value="lapa">lapa</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-50">
					<label for="">Disciplina:</label>
				</div>
				<div class="col-50">
					<label for="">Professor:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-50">
					<select name="slcDisciplina" id="slcDisciplina" class="custom-select" placeholder="selecione a disciplina">
						<option value="">informatica</option>
					</select>
				</div>
				<div class="col-50">
					<select name="slcProfessor" id="slcProfessor" class="custom-select" placeholder="selecione o professor">
						<option value="">informatica</option>
					</select>
				</div>
			</div>
			<div class="row" style="margin-top: 50px;">
				<div class="col-100">
					<input type="submit" name="btnVerificar" value="Verificar">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	//Function necessaria para ativar acordion // Esencail para funcionamento
	startAccordion();
	//Ativa acordion pela primaira vez
	$(document).ready(function (){

		panel = $('#frst_acc').next();
		$('#frst_acc').addClass('active');
		panel.css('max-height','300px');
		console.log($('#frst_acc').next());

	});

	//Function com atribuiçõe do select costumizado // Esencial para funcionamento
		selectElement();
</script>