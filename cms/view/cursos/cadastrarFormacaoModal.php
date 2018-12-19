<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR A FORMAÇÃO  -->
<?php

     @session_start();

    //Variaveis de escopo de Classe
    $nome = "";
    $desc = "";
    

    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=formacao&modo=inserir"; //URL de inserção

	 if(isset($_GET['modo'])){

         if($_GET['modo'] == "buscar"){

            $idFormacao = $listFormacao ->getIdFormacao();
            $nome = $listFormacao->getNome();
            $desc = $listFormacao->getDesc();
    
//            URL de edição
            $urlModo = "../../router.php?controller=formacao&modo=editar&id=".$idFormacao;
            //Alterando variaveis para edição
            $btn = "Editar"; // altera o nome do botão Submit // Editar
         }
     }
?>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script>
	
	$(document).ready(function() {

		//Submit do formulario
		$("#formFormacao").submit(function(event) {
			 //Cancelar ação do submit
			  event.preventDefault();

			     //Inserir ou editar Evento
				$.ajax({
					url:"<?=$urlModo?>",
					type:"POST",
					data: new FormData($('#formFormacao')[0]),
					cache:false,
					contentType:false,
					processData:false,
					async:true,
					success:function(dados){
						closeModal();
						syncTela("../telas/tabelas_curso.php",".content");
					}

              });
			});;
	});

</script>

 <div class="header_modal">
	 <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Formação</h1>
     </div>
	 <div class="botao_fechar" onclick="closeModal();">&times;</div>
 </div>
<div class="formulario_modal">
    <form id="formFormacao" name="formFormacao">
        <div class="row">
            <div class="col-100">
                 <label for="txtNome">Nome:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtNome" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome da formação..." required>
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
