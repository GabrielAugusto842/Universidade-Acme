<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR OS EVENTOS  -->
<?php

     @session_start();
     //Include de Classe

    //Variaveis de escopo de Classe
        $nome = "";


    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=catcurso&modo=inserir"; //URL de inserção

	 if(isset($_GET['modo'])){

         if($_GET['modo'] == "buscar"){

            $idCategoriaCurso = $listCat ->getIdCategoriaCurso();
            $nome = $listCat ->getNome();
             
            $urlModo = "../../router.php?controller=catcurso&modo=editar&id=".$idCategoriaCurso;

            $btn = "Editar"; // altera o nome do botão Submit // Editar
         }
     }
?>
<script>
	
	$(document).ready(function() {

		//Submit do formulario
		$("#form").submit(function(event) {
			 //Cancelar ação do submit
			  event.preventDefault();

			     //Inserir ou editar Evento
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
						syncTela("../telas/tabelas_curso.php",".content");
					}

              });
			});;
	});

</script>

 <div class="header_modal">
	 <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Categoria</h1>
     </div>
	 <div class="botao_fechar" onclick="closeModal();">&times;</div>
 </div>
<div class="formulario_modal">
    <form id="form" name="form">
        <div class="row">
            <div class="col-100">
                 <label for="txtNome">Nome:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtNome" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome da categoria de curso..." required>
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
