<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR OS PARCEIROS  -->
<?php

     @session_start();
     //Include de Classe
	 require_once($_SESSION['require'].'cms/controller/function/functions.php');

    //Variaveis de escopo de Classe
    $idParceiro = "";
    $nome = "";
    $desc = "";
    $foto = "";
    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=parceiro&modo=inserir"; //URL de inserção

    //Instanciamento da Classe function
    $function = new functions();


	 if(isset($_GET['modo'])){

         if($_GET['modo'] == "buscar"){

            $idParceiro = $listP->getIdParceiro();
            $nome = $listP ->getNome();
            $desc = $listP ->getDesc();
            $foto = $_SESSION['requireUrl'].$listP ->getImg();



            //URL de edição
            $urlModo = "../../router.php?controller=parceiro&modo=editar&id=".$idParceiro;
            //Alterando variaveis para edição
            $btn = "Editar"; // altera o nome do botão Submit // Editar
         }
     }
?>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script>

    //Variaveis de escopo JS
    var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

    function loadOnEdit(foto){ // Função para carrehar a foto do banco  se o modo for editar
         //Instancia variavel Url no editar ela precisa ser chamada pois ao fechar a janela é passada na função fechar e excluir img
         var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

        document.getElementById('container-foto').innerHTML = "<img src= '<?= $foto ?>'  height='100px' aling='center' alt='foto'>";
        $('#container-foto').css('background-image','url("")');
        form.txtFoto.value = '<?=  str_replace($_SESSION['requireUrl'],"",$foto)?>';
    }

	$(document).ready(function() {

        <?= isset($_GET['modo']) ? "loadOnEdit()" : ""?>

		//Submit do formulario
		$("#form").submit(function(event) {
			 //Cancelar ação do submit
			  event.preventDefault();

               var cont = 0 ;
               while(cont < fotoUrl.length){

                    passarGet("../../controller/function/functions.php?deletarArquivo&arquivo="+encodeURI(fotoUrl[cont]));
                    cont++;
                }

			     //Inserir ou editar pARCEIROS
				$.ajax({
					url:"<?=$urlModo?>",
					type:"POST",
					data: new FormData($('#form')[0]),
					cache:false,
					contentType:false,
					processData:false,
					async:true,
					success:function(dados){
						closeModal();
						syncTela("../telas/tabela_parceiro.php",".content");
					}

              });
			});

		//Upload de foto
		$('#flFoto').live('change',function(){
			$('#container-foto').html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

			$('#container-foto').css('background-image','url("")');
			setTimeout(function(){
				$('#formFoto').ajaxForm({
					target:'#container-foto'
				}).submit();
                // Adiciona url da foto
                fotoUrl.push(form.txtFoto.value);

			},300);
		});
	});

</script>

 <div class="header_modal">
	 <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Parceiro</h1>
     </div>
	 <div class="botao_fechar" onclick="closeModalDltFoto(fotoUrl);">&times;</div>
 </div>
<div class="formulario_modal">
    <form action="../../controller/function/functions.php?uploadFotoAjax&form=form&nomeFt=flFoto&local=<?= urlencode('img/conteudo/sobre/parceiros/')?>" method="post" id="formFoto" name="formFoto" enctype="multipart/form-data">
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
    <form id="form" name="form">
        <div class="row">
            <div class="col-100">
                 <label for="txtNome">Nome:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtTitulo" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome do parceiro" required>
                <input name="txtFoto" type="text" hidden="" required>
            </div>
        </div>
   

        <div class="row">
            <div class="col-100">
                 <label for="txtDesc">Descrição:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <textarea name="txtDesc" id="txtDesc" placeholder="Digite a descrição..." required><?=$desc?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="reset" name="btbLimapra" value="Limpar" style="margin-left: 10px;">
                <input type="submit" name="btnSalvar" id="btnSalvar" value="<?= $btn ?>">
            </div>
        </div>
    </form>
</div>
