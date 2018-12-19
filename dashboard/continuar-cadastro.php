<?php
@session_start();

require_once($_SESSION['require'].'dashboard/controller/controllerAluno.php');
require_once($_SESSION['require']."/dashboard/controller/function.php");

verifSession();

$id = $_SESSION['aluno']['matricula'];

$listAluno = new controllerAluno();

$rsAluno = $listAluno->buscarAluno($id);

$nome = $rsAluno->getNome();
$matricula = $rsAluno->getMatricula();
$cpf = $rsAluno->getCpf();
$dtNasc = $rsAluno->getDtNasc();


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Primeiro Acesso</title>
<link rel="icon" href="view/img/icons/favicon.png">
<link rel="stylesheet" href="view/css/style.css">
<link rel="stylesheet" href="view/css/toast.css">
<script src="view/js/function.js" type="text/javascript"></script>
<script src="view/js/jquery.js" type="text/javascript"></script>
<script src="view/js/wolfJquery.js" type="text/javascript"></script>
<script src="view/js/jquery.mask.js" type="text/javascript"></script>
<script src="view/js/toast.js" type="text/javascript"></script>
<script>

$(function(){

	//Submit do formulario
	$("#frmCadastro").formSubmit("router.php?controller=aluno&modo=editar&id=<?=$matricula?>",function(){
		getDefaultNotf();
		toastr.success('Cadastro efetuado com sucesso', 'Tudo Pronto (: ', {onclick: function() {window.location="login.php"}});
		setTimeout(function(){
			window.location="login.php";
		},5000);

	});
	
});

</script>
</head>

<body>
    <div id="container-cadastro" class="box-2">
        <h2 class="titulo" style="margin: 40px 0px">Continuar cadastro</h2>
        <form name="frmCadastro" id="frmCadastro" enctype="multipart/form-data">
            <div class="container_accordion">
                <div class="accordion" id="frst_acc" style="box-sizing: border-box;">Informações pessoais</div>
                <div class="panel">
					<div class="row">
						<div class="col-100">
							<label for="flImg" id="targetIMGAluno" class="alunoImgUp centralizarX"></label>
							<input style="display: none;" type="file" name="flImg" id="flImg">
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<label for="txtNome">Nome:</label>
						</div>
						<div class="col-50">
							<label for="txtMatricula">Matricula:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="text" id="txtNome" disabled value="<?= $nome?>">
						</div>
						<div class="col-50">
							<input type="text" id="txtMatricula" disabled value="<?= $matricula?>">
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<label for="txtCPF">CPF:</label>
						</div>
						<div class="col-50">
							<label for="txtDtNasc">Data de nascimento:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="text" id="txtCPF" disabled value="<?= $cpf?>">
						</div>
						<div class="col-50">
							<input type="date" id="txtDtNasc" disabled value="<?= $dtNasc?>">
						</div>
					</div>
                </div>

            </div>
            <div class="container_accordion">
				<div class="accordion" style="box-sizing: border-box;">Informações de acesso</div>
				<div class="panel">
					<div class="row">
						<div class="col-50">
							<label for="txtSenha">Senha:</label>
						</div>
						<div class="col-50">
							<label for="txtReSenha">Repetir senha:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="password" id="txtSenha" name="txtSenha" value="" placeholder="Digite sua senha... ">
						</div>
						<div class="col-50">
							<input type="password" id="txtReSenha" name="txtReSenha" value="" placeholder="Digite novamente sua senha... ">
						</div>
					</div>
				</div>
			</div>
           <div class="container_accordion">
				<div class="accordion" style="box-sizing: border-box;">Informações de contato</div>
				<div class="panel">
										<div class="row">
						<div class="col-25">
							<label for="txtEmail">Bairro:</label>
						</div>
						<div class="col-15">
							<label for="txtCEP">CEP:</label>
						</div>
						<div class="col-15">
							<label for="slcUF">UF:</label>
						</div>
						<div class="col-45">
							<label for="slcCidade">Cidade:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<input type="text" id="txtBairro" name="txtBairro" value="" placeholder="Bairro...">
						</div>
						<div class="col-15" style="margin-left: 2%;">
							<input type="text" id="txtCEP" name="txtCep" value="" placeholder="CEP">
						</div>
						<div class="col-15" style="margin-left: 1%;">
							<div class="dropdown">
								<a class="select">UF</a>
								 <ul class="option-list" id="slcUF">
								</ul> 
							</div>
							<input type="text" name="slcUF" id="slcUFIn" hidden>
						</div>
						<div class="col-40" style="margin-left: 2%;">
						  <div class="dropdown">
								<a class="select">Cidade</a>
								 <ul class="option-list" id="slcCidade">
									<li><a>Selecione um UF</a></li>
								</ul> 
							</div>
							<input type="text" name="slcCidade" id="slcCidadeIn" hidden>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<label for="txtEmail">Logradouro:</label>
						</div>
						<div class="col-25">
							<label>Complemento:</label>
						</div>
						<div class="col-25">
							<label>N°:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="text" id="txtLogradouro" name="txtLogradouro" value="" placeholder="Digite o logradouro...">
						</div>
						<div class="col-25">
							<input type="text" id="txtComplemento" name="txtComplemento" value="" placeholder="Complemento">
						</div>
						<div class="col-25">
							<input type="text" id="txtNumero" name="txtNumero" value="" placeholder="Numero">
						</div>
					</div>

					<div class="row">
						<div class="col-50">
							<label for="txtTelefone">Telefone:</label>
						</div>
						<div class="col-50">
							<label for="txtCelular">Celular:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="text" id="txtTelefone" name="txtTelefone" value="" placeholder="Digite seu telefone...">
						</div>
						<div class="col-50">
							<input type="text" id="txtCelular" name="txtCelular" value="" placeholder="Digite seu celular...">
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<label for="txtEmail">E-mail:</label>
						</div>
						<div class="col-50">
							<label>Sexo:</label>
						</div>
					</div>
					<div class="row">
						<div class="col-50">
							<input type="email" id="txtEmail" name="txtEmail" value="" placeholder="Digite seu email...">
						</div>
						<div class="col-50">
							<ul class="list">
								<li class="rdo_item">
									<input type="radio" class="radio_btn" name="rdoSexo" id="a-opt" value="M"/>
									<label for="a-opt" class="label_rdo">Maculino</label>
								</li>

								<li class="rdo_item">
									<input type="radio" class="radio_btn" name="rdoSexo" id="b-opt" value="F"/>
									<label for="b-opt" class="label_rdo">Feminino</label>
								</li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-100">
							<input type="submit" name="btnSalvar" value="Salvar">
						</div>
					</div>
				</div>
			</div>
        </form>
    </div>
	
	<script>		
		
		//Fuction para efetuar preview da imagem
		preLoadIMG('view/img/gif/load.gif','#flImg','#targetIMGAluno');
	
		//Function necessaria para ativar acordion // Esencail para funcionamento
		startAccordion();
		
		$(document).ready(function (){
			
			//Mascaras
			$('#txtCEP').mask('00000-000');
			$('#txtTelefone').mask('(00) 0000-0000');
			
			//Ativa acordion pela primaira vez
		 	(function(){
				panel = $('#frst_acc').next();
				$('#frst_acc').addClass('active');
				panel.css('max-height','400px');
			})();
			
			(function(){

				var listaEstados = "";

				$('#slcUF').html('');

				$.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/estados",function(e){
					for(var cont=0; cont < e.length; cont++){

						listaEstados +=  '<li><a data-value="' + e[cont].id + '">' + e[cont].sigla + '</a></li>';
					}

					$('#slcUF').html(listaEstados);

				});

			})();

			//Function com atribuiçõe do select costumizado // Esencial para funcionamento				
			setTimeout(function(){

				$('#slcUF li').click(function(e){
				var idEstado = this.children[0].getAttribute('data-value');

				getCidade(idEstado);
					
				if(idEstado == 35){
					$('#txtCelular').mask('(00) 00000-0000');
				}else{
					$('#txtCelular').mask('(00) 0000-0000');	
				}

			});
			},1000);
			
		});
		

$(document).on('click', function(event) {
	if (!$(event.target).closest('.dropdown').length) {
		$('.option-list, .search-box').hide();
	}
});
$('.select').click(function(event) {
//	$('.option-list, .search-box').hide();
	$(this).closest('.dropdown').find('.option-list, .search-box').toggle(); 
	$('.option-list a').click(function(){
		var select = $(this).text();
		var selected = $(this).parents()[1],
			selectedId = $(selected).attr('id');
		console.log(selectedId)
		$(this).closest('.dropdown').children('.select').text(select);
		$("#" + selectedId + "In").val(select);
		$('.option-list, .search-box').hide();
	});
});
//Search
$('.seach-control').keyup(function(){
	var val = $(this).val().toLowerCase();
	var list =  $(this).closest('.dropdown').find('li')
	list.each(function(){
		var text = $(this).text().toLowerCase();
		if(text.indexOf(val)==-1){
			$(this).hide();
		}else{
			$(this).show();
		}

	})
});
		
	</script>

</body>
</html>
