<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR AS UNIDADES  -->
<?php

     @session_start();
     //Include de Classe
	 require_once($_SESSION['require'].'cms/controller/function/functions.php');

    //Variaveis de escopo de Classe
    $idUnidade = "";
    $nome = "";
    $desc = "";
    $foto = "";
    $logradouro = "";
    $numero = "";
    $complemento = "";
    $bairro = "";
    $estado = "";
    $cidade = "";
    $cep = "";

    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=unidade&modo=inserir"; //URL de inserção

    //Instanciamento da Classe function
    $function = new functions();

	 if(isset($_GET['modo'])){

         if($_GET['modo'] == "buscar"){

         	$idUnidade = $listUnidade->getIdUnidade();
           	$nome = $listUnidade->getNome();
            $desc = $listUnidade->getDesc();
            $foto = $_SESSION['requireUrl'].$listUnidade->getFoto();
            $endereco = $listUnidade->getEndereco();
			$item_endereco = explode(", ", $endereco);
			$logradouro = $item_endereco[0];
			$numero = $item_endereco[1];
			$complemento = $item_endereco[2];
			$bairro = $item_endereco[3];
			$cep = $item_endereco[4];
			$estado = $item_endereco[5];
			$cidade = $item_endereco[6];

            //URL de edição
            $urlModo = "../../router.php?controller=unidade&modo=editar&id=".$idUnidade;
            //Alterando variaveis para edição
            $btn = "Editar"; // altera o nome do botão Submit // Editar
         }
     }
?>
<script type="text/javascript" src="../js/date-time-picker.min.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script>
	
	//Função responsavel por carregar e alimentar um select com a lista de cidades trazidos da API, e a cidade selecionada do banco
	function buscarCidade(id_estado, id_cidade){
		var request = new XMLHttpRequest();
		var cidades = [];
		request.open('GET', 'http://servicodados.ibge.gov.br/api/v1/localidades/estados/'+id_estado+'/municipios', true);
		request.onload = function(){
			var data = JSON.parse(this.response);
			data.forEach(cidade => {
				cidades.push(cidade.nome);
			});

			//Criação de container temporario para receber resposta da função
			var conteudo = document.querySelector('#slcCidade');

			var cont = 0 ;

			while(cont < cidades.length){

				var htmlTemporario = conteudo.innerHTML;
				var htmlNovo = "<option" + (id_cidade == cidades[cont] ? 'selected' : '') + " value='" + cidades[cont] + "'>" + cidades[cont] + "</option>";

				htmlTemporario = htmlNovo + htmlTemporario;

				conteudo.innerHTML = htmlTemporario;

				cont++;

			}
		}
		request.send();
	}

    pegarEstado(<?=$estado?>);
	<?php
	if($_GET['modo'] == "buscar"){
	?>
	buscarCidade(<?=$estado?>, <?=$cidade?>);
	<?php
	}
	?>
    $('#slcEstado').click(function(){ 

        var estado;
        var conteudo = document.querySelector('#slcCidade');
        estado = this.value;

        conteudo.innerHTML = "";
		
		pegarCidade(estado);

    });

    //Variaveis de escopo JS
    var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

    function loadOnEdit(foto){ // Função para carrehar a foto do banco  se o modo for editar
         //Instancia variavel Url no editar ela precisa ser chamada pois ao fechar a janela é passada na função fechar e excluir img
         var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

        document.getElementById('container-foto').innerHTML = "<img src= '<?= $foto ?>'  height='100px' aling='center' alt='foto'>";
        $('#container-foto').css('background-image','url("")');
        formUnidade.txtFoto.value = '<?=  str_replace($_SESSION['requireUrl'],"",$foto)?>';
    }

	$(document).ready(function() {

        <?= isset($_GET['modo']) ? "loadOnEdit()" : ""?>

		//Submit do formulario
		$("#formUnidade").submit(function(event) {
			 //Cancelar ação do submit
			  event.preventDefault();

               var cont = 0 ;
               while(cont < fotoUrl.length){

                    passarGet("../../function/functions.php?deletarArquivo&arquivo="+encodeURI(fotoUrl[cont]));
                    cont++;
                }

			     //Inserir ou editar Unidade
				$.ajax({
					url:"<?=$urlModo?>",
					type:"POST",
					data: new FormData($('#formUnidade')[0]),
					cache:false,
					contentType:false,
					processData:false,
					async:true,
					success:function(dados){
						closeModal();
						syncTela("../telas/tabela_unidade.php",".content");
					}

              });
			});

		//Upload de foto
		$('#flFoto').live('change',function(){
			$('#container-foto').html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

			$('#container-foto').css('background-image','url("")');
			setTimeout(function(){
				$('#formUnidadeFoto').ajaxForm({
					target:'#container-foto'
				}).submit();
                // Adiciona url da foto
                fotoUrl.push(formUnidade.txtFoto.value);

			},300);
		});
	});

</script>

 <div class="header_modal">
	 <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar unidade</h1>
     </div>
	 <div class="botao_fechar" onclick="closeModalDltFoto(fotoUrl);">&times;</div>
 </div>
<div class="formulario_modal">
    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formUnidade&nomeFt=flFoto&local=<?= urlencode('img/conteudo/unidades/')?>" method="post" id="formUnidadeFoto" name="formUnidadeFoto" enctype="multipart/form-data">
        <div class="row">
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
    <form id="formUnidade" name="formUnidade">
        <div class="row">
            <div class="col-100">
                 <label for="txtNome">Nome:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtNome" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome da unidade..." required>
                <input name="txtFoto" type="text" hidden="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-80">
                 <label for="date-1">Logradouro:</label>
            </div>
            <div class="col-20">
                 <label for="date-2">N°:</label>
            </div>
        </div>
        <div class="row">
           <div class="col-80">
                <input type="text" id="txtLogradouro" name="txtLogradouro" value="<?=$logradouro?>" placeholder="Digite o logradouro da unidade..." required>
            </div>
			<div class="col-20">
                <input type="text" id="txtNumero" name="txtNumero" value="<?=$numero?>" placeholder="Numero" required>
            </div>
        </div>
        <div class="row">
            <div class="col-40">
                 <label for="date-1">Complemento:</label>
            </div>
            <div class="col-50">
                 <label for="date-2">Bairro:</label>
            </div>
        </div>
        <div class="row">
           <div class="col-40">
                <input type="text" id="txtComplemento" name="txtComplemento" value="<?=$complemento?>" placeholder="Digite o complemento..."required>
            </div>
			<div class="col-60">
                <input type="text" id="txtBairro" name="txtBairro" value="<?=$bairro?>" placeholder="Digite o bairro..." required>
            </div>
        </div>
		<div class="row">
            <div class="col-40">
                 <label for="date-1">Estado:</label>
            </div>
			<div class="col-40">
                 <label for="date-1">Cidade:</label>
            </div>
            <div class="col-20">
                 <label for="date-2">CEP:</label>
            </div>
        </div>
		<div class="row">
           <div class="col-40">
			   <select id="slcEstado" name="slcEstado">
			   </select>
            </div>
			<div class="col-40">
                 <select id="slcCidade" name="slcCidade">
			   </select>
            </div>
			<div class="col-20">
                <input type="text" id="txtCep" name="txtCep" value="<?=$cep?>" placeholder="CEP" required>
            </div>
        </div>
		<div class="row">
            <div class="col-100">
                 <label for="txtDesc">Descrição:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <textarea name="txtDesc" id="txtDesc" placeholder="Digite uma descrição..." required><?=$desc?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="reset" name="btnLimpar" value="Limpar" style="margin-left: 10px;">
                <input type="submit" name="btnSalvar" id="btnSalvar" value="<?= $btn ?>">
            </div>
        </div>
    </form>
</div>
