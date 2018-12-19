<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR AS NOTICIAS  -->
<?php

     @session_start();
     //Include de Classe
	 require_once($_SESSION['require'].'cms/controller/function/functions.php');

    //Variaveis de escopo de Classe
    $idNoticia = "";
    $titulo = "";
    $desc = "";
    $foto = "";
    $inicio = "";
    $termino = "";
    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=noticia&modo=inserir"; //URL de inserção

    //Instanciamento da Classe function
    $function = new functions();


	 if(isset($_GET['modo'])){

         if($_GET['modo'] == "buscar"){

            $idNoticia = $listNoticia ->getIdNoticia();
            $titulo = $listNoticia ->getTitulo();
            $desc = $listNoticia ->getDesc();
            $foto = $_SESSION['requireUrl'].$listNoticia ->getFoto();
            $inicio = $listNoticia ->getInicio();
            $termino = $listNoticia ->getTermino();


            //URL de edição
            $urlModo = "../../router.php?controller=noticia&modo=editar&id=".$idNoticia;
            //Alterando variaveis para edição
            $btn = "Editar"; // altera o nome do botão Submit // Editar
         }
     }
?>
<script type="text/javascript" src="../js/date-time-picker.min.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script>

    //Variaveis de escopo JS
    var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

    function loadOnEdit(foto){ // Função para carrehar a foto do banco  se o modo for editar
         //Instancia variavel Url no editar ela precisa ser chamada pois ao fechar a janela é passada na função fechar e excluir img
         var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

        document.getElementById('container-foto').innerHTML = "<img src= '<?= $foto ?>'  height='100px' aling='center' alt='foto'>";
        $('#container-foto').css('background-image','url("")');
        formNoticia.txtFoto.value = '<?=  str_replace($_SESSION['requireUrl'],"",$foto)?>';
    }

	$(document).ready(function() {

        <?= isset($_GET['modo']) ? "loadOnEdit()" : ""?>

		//Submit do formulario
		$("#formNoticia").submit(function(event) {
			 //Cancelar ação do submit
			  event.preventDefault();

               var cont = 0 ;
               while(cont < fotoUrl.length){

                    passarGet("../../controller/function/functions.php?deletarArquivo&arquivo="+encodeURI(fotoUrl[cont]));
                    cont++;
                }

			     //Inserir ou editar Noticia
				$.ajax({
					url:"<?=$urlModo?>",
					type:"POST",
					data: new FormData($('#formNoticia')[0]),
					cache:false,
					contentType:false,
					processData:false,
					async:true,
					success:function(dados){
						closeModal();
						syncTela("../telas/tabela_noticia.php",".content");
					}

              });
			});

		//Upload de foto
		$('#flFoto').live('change',function(){
			$('#container-foto').html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

			$('#container-foto').css('background-image','url("")');
			setTimeout(function(){
				$('#formNoticiaFoto').ajaxForm({
					target:'#container-foto'
				}).submit();
                // Adiciona url da foto
                fotoUrl.push(formNoticia.txtFoto.value);

			},300);
		});
	});

</script>

 <div class="header_modal">
	 <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Noticia</h1>
     </div>
	 <div class="botao_fechar" onclick="closeModalDltFoto(fotoUrl);">&times;</div>
 </div>
<div class="formulario_modal">
    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formNoticia&nomeFt=flFoto&local=<?= urlencode('img/conteudo/noticias/')?>" method="post" id="formNoticiaFoto" name="formNoticiaFoto" enctype="multipart/form-data">
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
    <form id="formNoticia" name="formNoticia">
        <div class="row">
            <div class="col-100">
                 <label for="txtTitulo">Titulo:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtTitulo" name="txtTitulo" value="<?=$titulo?>" placeholder="Digite o titulo do Noticia" required>
                <input name="txtFoto" type="text" hidden="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                 <label for="date-1">Inicio:</label>
            </div>
            <div class="col-50">
                 <label for="date-2">Termino:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <input type="date" name="txtInicio" class="mt10px input" id="date-1" value="<?= $inicio ?>" required>
                <script type="text/javascript">

                    if( "<?= $function->pegarNavegador() ?>" == "outro" || "<?= $function->pegarNavegador() ?>" == "Firefox"){
                        $('#date-1').dateTimePicker();
                    }

                </script>
            </div>
            <div class="col-50">
                <input type="date" name="txtTermino" class="mt10px input" value="<?= $termino ?>" id="date-2" required>
                <script type="text/javascript">

                    if( "<?= $function->pegarNavegador() ?>" == "outro" || "<?= $function->pegarNavegador() ?>" == "Firefox"){
                        $('#date-2').dateTimePicker();
                    }

                </script>
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
                <input type="reset" name="btbLimapra" value="Limpar" style="margin-left: 10px;">
                <input type="submit" name="btnSalvar" id="btnSalvar" value="<?= $btn ?>">
            </div>
        </div>
    </form>
</div>
