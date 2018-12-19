<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR OS EVENTOS  -->
<?php

     @session_start();
     //Include de Classe 
	 require_once($_SESSION['require'].'cms/controller/function/functions.php');

    //Variaveis de escopo de Classe
    $idEvento = "";     
    $nome = "";
	$nomeUnidade = "";
    $desc = "";     
    $foto = "";     
    $inicio = "";    
    $termino = "";
    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=evento&modo=inserir"; //URL de inserção
    
    //Instanciamento da Classe function
    $function = new functions();


	 if(isset($_GET['modo'])){
         
         if($_GET['modo'] == "buscar"){ 

            $idEvento = $listEvento ->getIdEvento();
            $unidade = $listEvento->getIdUnidade();
            $nome = $listEvento ->getNome();    
            $desc = $listEvento ->getDesc();    
            $foto = $_SESSION['requireUrl'].$listEvento ->getFoto();    
            $inicio = str_replace(" ", "T", $listEvento ->getInicio());    
            $termino = str_replace(" ", "T", $listEvento ->getTermino());    

            
            //URL de edição
            $urlModo = "../../router.php?controller=evento&modo=editar&id=".$idEvento; 
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
        formEvento.txtFoto.value = '<?=  str_replace($_SESSION['requireUrl'],"",$foto)?>';
    }
     
	$(document).ready(function() {
        
        <?= isset($_GET['modo']) ? "loadOnEdit()" : ""?>
        
		//Submit do formulario
		$("#formEvento").submit(function(event) {
			 //Cancelar ação do submit
			  event.preventDefault();
                
               var cont = 0 ;
               while(cont < fotoUrl.length){
                   
                    passarGet("../../function/functions.php?deletarArquivo&arquivo="+encodeURI(fotoUrl[cont]));
                    cont++;
                }

			     //Inserir ou editar Evento
				$.ajax({
					url:"<?=$urlModo?>",
					type:"POST",
					data: new FormData($('#formEvento')[0]),
					cache:false,
					contentType:false,
					processData:false,
					async:true,
					success:function(dados){
						closeModal();
						syncTela("../telas/tabela_evento.php",".content");
					}

              });
			});

		//Upload de foto
		$('#flFoto').live('change',function(){
			$('#container-foto').html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');
                        
			$('#container-foto').css('background-image','url("")');
			setTimeout(function(){
				$('#formEventoFoto').ajaxForm({
					target:'#container-foto'
				}).submit();
                // Adiciona url da foto 
                fotoUrl.push(formEvento.txtFoto.value);

			},300);
		});
	});

</script>

 <div class="header_modal">
	 <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Evento</h1>
     </div>
	 <div class="botao_fechar" onclick="closeModalDltFoto(fotoUrl);">&times;</div>
 </div>
<div class="formulario_modal">
    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formEvento&nomeFt=flFoto&local=<?= urlencode('img/conteudo/eventos/')?>" method="post" id="formEventoFoto" name="formEventoFoto" enctype="multipart/form-data">
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
    <form id="formEvento" name="formEvento">
        <div class="row">
            <div class="col-70">
                 <label for="txtNome">Nome:</label>
            </div>
            <div class="col-30">
                 <label for="txtNome">Unidade:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-70">
                <input type="text" id="txtNome" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome do Evento" required>
                <input name="txtFoto" type="text" hidden="" required>
            </div>
            <div class="col-30">
                 <select id="txtUnidade" name="txtUnidade" class="custom-select" placeholder="Unidades">
                     <?php
                        session_start();
                        require_once($_SESSION['require'].'cms/controller/controllerUnidade.php');
                        $listUnidade = new controllerUnidade();
                        $rsUnidade = $listUnidade::listarUnidade();
        
                        $cont = 0;
        
                        while ($cont < count($rsUnidade)){
                            $unidade == $rsUnidade[$cont]->getIdUnidade() ? $selecionar = "selected" : $selecionar = "";
							
							if($rsUnidade[$cont]->getNome() == "Universidade ACME - Leste"){ 
								$nomeUnidade = "U - Leste"; 
							}else if($rsUnidade[$cont]->getNome() == "Universidade ACME - Centro"){ 
								$nomeUnidade = "U - Centro"; 
							}else if($rsUnidade[$cont]->getNome() == "Universidade ACME - Norte"){
								$nomeUnidade = "U - Norte";
							}
                        
                     ?>
                    <option value="<?=$rsUnidade[$cont]->getIdUnidade();?>" <?=$selecionar?>><?= $nomeUnidade ?></option>
                     <?php
                        $cont++;
                        }
                     ?>
                </select>
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
                <input type="datetime-local" name="txtInicio" class="mt10px input" id="date-1" value="<?= $inicio ?>" required>
                <script type="text/javascript"> 

                    if( "<?= $function->pegarNavegador() ?>" == "outro" || "<?= $function->pegarNavegador() ?>" == "Firefox"){
                        $('#date-1').dateTimePicker({
                            mode: 'dateTime'
                        });
                    }

                </script>
            </div>
            <div class="col-50">
                <input type="datetime-local" name="txtTermino" class="mt10px input" value="<?= $termino ?>" id="date-2" required>
                <script type="text/javascript"> 

                    if( "<?= $function->pegarNavegador() ?>" == "outro" || "<?= $function->pegarNavegador() ?>" == "Firefox"){
                        $('#date-2').dateTimePicker({
                            mode: 'dateTime'
                        });
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
<script>
	//Function com atribuiçõe do select costumizado // Esencial para funcionamento
	selectElement();
</script>
    