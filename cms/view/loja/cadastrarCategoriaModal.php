<?php

	//Efetuando cadastro
    $btn = "Cadastrar";
	$titulo = "";
	$desc = "";

    //URL de inserção
    $urlModo = "../../router.php?controller=catprodutoloja&modo=inserir";


	if(isset($_GET['modo'])){
		if($_GET['modo'] == "buscar"){

			$idCategoria = $listCatProdutoLoja->getIdCatProduto();
			$titulo = $listCatProdutoLoja->getTitulo();
			$desc = $listCatProdutoLoja->getDesc();

		//URL de edição
		$urlModo = "../../router.php?controller=catprodutoloja&modo=editar&id=".$idCategoria;
		$btn = "Editar";
		echo($idCategoria);
	  }
	}
?>

<!-- MODAL RESPONSÁVEL POR CADASTRAR categorias dos produtos -->
<script>
	
	enviarFormularioV2("formCatProdutoLoja","<?= $urlModo ?>");
	
</script>  

     <div class="header_modal">
         <div class="titulo_modal">
		 	<h1 class="titulo" style="margin: 0px">Cadastrar Categoria</h1>
		 </div>
         <div class="botao_fechar" onclick="closeModal();">&times;</div>
     </div>
    <div class="formulario_modal">
        <form id="formCatProdutoLoja">
			<div class="row">
				<div class="col-100">
					<label for="txtTitulo">Titulo:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<input type="text" name="txtTitulo" value="<?= $titulo ?>" id="txtTitulo" placeholder="Digite o nome da categoria...">
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<label for="txtDesc">Descrição:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma descrição do produto..."><?= $desc ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
				   	<input type="reset" name="" value="Limpar" style="margin-left: 10px;">
					<input type="submit" name="" value="<?= $btn ?>">
				</div>
			</div>
        </form>
    </div> 