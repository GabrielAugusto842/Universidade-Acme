<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR OS cursos  -->
<?php

     @session_start();
     //Include de Classe
	 require_once($_SESSION['require'].'cms/controller/function/functions.php');

    //Variaveis de escopo de Classe
    $catCurso = "";
    $formacaoCurso = "";
    $nome = "";
    $cargaHoraria = "";
    $grade = "";
    $objetivo = "";
    $descTecnico = "";
    $foto = "";

    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=curso&modo=inserir"; //URL de inserção

    //Instanciamento da Classe function
    $function = new functions();

	 if(isset($_GET['modo'])){

         if($_GET['modo'] == "buscar"){

            $idCurso = $listCurso->getIdCurso();
            $catCurso = $listCurso->getIdCatCurso();
            $formacaoCurso = $listCurso->getIdFormacao();
            $nome = $listCurso ->getNome();
            $cargaHoraria = $listCurso ->getCargaHoraria();
            $grade = $listCurso ->getGrade();
            $objetivo = $listCurso ->getObjetivo();
            $descTecnico = $listCurso->getDescTecnico();             
            $foto = $_SESSION['requireUrl'].$listCurso ->getFoto();
    
            //URL de edição
            $urlModo = "../../router.php?controller=curso&modo=editar&id=".$idCurso;
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
        formCurso.txtFoto.value = '<?=  str_replace($_SESSION['requireUrl'],"",$foto)?>';
    }

	$(document).ready(function() {

        <?= isset($_GET['modo']) ? "loadOnEdit()" : ""?>

		//Submit do formulario
		$("#formCurso").submit(function(event) {
			 //Cancelar ação do submit
			  event.preventDefault();

               var cont = 0 ;
               while(cont < fotoUrl.length){

                    passarGet("../../function/functions.php?deletarArquivo&arquivo="+encodeURI(fotoUrl[cont]));
                    cont++;
                }

			     //Inserir ou editar cursos
				$.ajax({
					url:"<?=$urlModo?>",
					type:"POST",
					data: new FormData($('#formCurso')[0]),
					cache:false,
					contentType:false,
					processData:false,
					async:true,
					success:function(){
						closeModal();
						syncTela("../telas/tabelas_curso.php",".content");
					}

              });
			});

		//Upload de foto
		$('#flFoto').live('change',function(){
			$('#container-foto').html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

			$('#container-foto').css('background-image','url("")');
			setTimeout(function(){
				$('#formCursoFoto').ajaxForm({
					target:'#container-foto'
				}).submit();
                // Adiciona url da foto
                fotoUrl.push(formCurso.txtFoto.value);

			},300);
		});
	});

</script>

 <div class="header_modal">
	 <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Curso</h1>
     </div>
	 <div class="botao_fechar" onclick="closeModalDltFoto(fotoUrl);">&times;</div>
 </div>
<div class="formulario_modal">
    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formCurso&nomeFt=flFoto&local=<?= urlencode('img/conteudo/curso/')?>" method="post" id="formCursoFoto" name="formCursoFoto" enctype="multipart/form-data">
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
    <form id="formCurso" name="formCurso">
        <div class="row">
            <div class="col-70">
                 <label for="txtNome">Nome:</label>
            </div>
            <div class="col-30">
                 <label for="txtCargaHoraria">Carga horaria:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-70">
                <input type="text" id="txtNome" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome do curso..." required>
                <input name="txtFoto" type="text" hidden="" required>
            </div>
            <div class="col-30">
                <input type="text" id="txtCargaHoraria" name="txtCargaHoraria" value="<?=$cargaHoraria?>" placeholder="Carga Horaria" required maxlength="15">
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                 <label for="txtCategoria">Categoria:</label>
            </div>
            <div class="col-50">
                 <label for="txtFormacao">Formação:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <select name="txtCategoria" class="custom-select" placeholder="Selecione uma categoria">
                    <?php
                        session_start();
                        require_once($_SESSION['require'].'cms/controller/controllerCatCurso.php');
                        
                        $listCat = new controllerCatCurso();
                        $rsCatCurso = $listCat::listarCatCurso();
        
                        $cont = 0;
                       
                        while($cont < count($rsCatCurso)){
                            
                        $catCurso == $rsCatCurso[$cont]->getIdCategoriaCurso() ? $selecionarC = "selected" : $selecionarC = "";
        
                        
                    ?>
                    <option <?=$selecionarC?> value="<?=$rsCatCurso[$cont]->getIdCategoriaCurso();?>">
                        <?=$rsCatCurso[$cont]->getNome();?>
                    </option>
                    <?php
                        $cont++;
                        }
                    ?>
                </select>
            </div>
            <div class="col-50">
                <select name="txtFormacao" class="custom-select" placeholder="Selecione uma formação">
                    <?php
                        session_start();
                        require_once($_SESSION['require'].'cms/controller/controllerFormacao.php');
                        
                        $listFormacao = new controllerFormacao();
                        $rsFormacao = $listFormacao::listarFormacao();
        
                        $cont = 0;
                    while($cont < count($rsFormacao)){
                        
                    $formacaoCurso == $rsFormacao[$cont]->getIdFormacao() ? $selecionar = "selected" : $selecionar = "";
                    
                    ?>
                    <option <?=$selecionar?> value="<?=$rsFormacao[$cont]->getIdFormacao();?>">
                        <?=$rsFormacao[$cont]->getNome();?>
                    
                    </option>
                    <?php
                    $cont++;
                    }
                    
                    ?>
                </select>
            </div>
        </div>
		<div class="row">
            <div class="col-100">
                 <label for="txtGrade">Grade curricular:</label>
            </div>
        </div>
		
        <div class="row">
            <div class="col-100">
                <textarea name="txtGrade" id="txtGrade" placeholder="Digite a grade curricular..." required><?=$grade?></textarea>
            </div>
        </div>
		
		<div class="row">
            <div class="col-100">
                 <label for="txtObjetivo">Objetivo:</label>
            </div>
        </div>
		
        <div class="row">
            <div class="col-100">
                <textarea name="txtObjetivo" id="txtObjetivo" placeholder="Digite o objetivo..." required><?=$objetivo?></textarea>
            </div>
        </div>
		
		<div class="row">
            <div class="col-100">
                 <label for="txtDescTecnico">Descritivo Tecnico:</label>
            </div>
        </div>
		
        <div class="row">
            <div class="col-100">
                <textarea name="txtDescTecnico" id="txtDescTecnico" placeholder="Digite um descritivo ..." required><?=$descTecnico?></textarea>
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
<script>
	//Function com atribuiçõe do select costumizado // Esencial para funcionamento
	selectElement();
</script>
