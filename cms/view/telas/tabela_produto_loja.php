<script>
	
	//Efetua delete onClick 
	$(document).ready(function(){
		
		$(".btnExluirCat").click(function(){
			var id = $(this).attr("data-id");
			
			excluir(id,"../../router.php?controller=catprodutoloja&modo=excluir&id=");
			syncTela("../telas/tabela_produto_loja.php",".content");
		});
		
		$(".btnExluirProd").click(function(){
			var id = $(this).attr("data-id");
			
			excluir(id,"../../router.php?controller=produtoloja&modo=excluir&id=");
			syncTela("../telas/tabela_produto_loja.php",".content");
		});
		
		
		$(".btnBuscarCat").click(function(){
			
			var id = $(this).attr("data-id");
			
			openModal("../../router.php?controller=catprodutoloja&modo=buscar&id="+id,600,"auto");
			
		})
		
		$(".btnBuscarProd").click(function(){
			
			var id = $(this).attr("data-id");
			
			openModal("../../router.php?controller=produtoloja&modo=buscar&id="+id,600,"auto");
			
		})
		
	});

</script>  


<h1 class="titulo">Loja</h1>
<div class="container_accordion" style="width: 800px;">
	<button class="accordion">Produtos</button>
	<div class="panel"><!-- Abrir modal  passando como paramêtro a URL, width, height -->
		<button type="button" onclick="openModal('cadastrarProdutoModal.php',600,'auto');" style="margin-top: 20px;">Adicionar Produto</button>
		<div class="container_table"  style="width:100%; margin-top: 20px;">
			 <!-- Abrir modal  passando como paramêtro a URL, width, height -->
			<table>
				<tr>
					<th>Nome</th>
					<th>Preço</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Funções</th>
				</tr>

				<?php
				@session_start(); 
				require_once($_SESSION['require'].'cms/controller/controllerProdutoLoja.php');

				$listProdutoLoja =  new controllerProdutoLoja();

				$rsProdutoLoja = $listProdutoLoja::listarProdutoLoja();

				$cont = 0;

				while($cont < count($rsProdutoLoja)){ 
					$preco2 = $rsProdutoLoja[$cont]->getPreco();
					$preco = "R$".number_format($preco2, 2, ",", ".");

				?>

				<tr>
					<td><?=$rsProdutoLoja[$cont]->getTitulo();?></td>
					<td><?=$preco?></td>
					<td><?=$rsProdutoLoja[$cont]->getDesc();?></td>
					<td><?=$rsProdutoLoja[$cont]->getIdCategoria();?></td>
					<td>
						<button style="margin: 2.5px auto" type="button" data-id="<?=$rsProdutoLoja[$cont]->getIdProduto();?>" class="btnBuscarProd">Editar</button>
						<button style="margin: 2.5px auto" type="button" data-id="<?=$rsProdutoLoja[$cont]->getIdProduto();?>" class="btnExluirProd">Excluir</button>
					</td>
				</tr>

				<?php

					$cont++;
				}
				?>
			</table>
		</div>
	</div>
</div>

<div class="container_accordion" style="width: 800px;">
	<button class="accordion">Categorias</button>
	<div class="panel"><!-- Abrir modal  passando como paramêtro a URL, width, height -->
		<button type="button" onclick="openModal('cadastrarCategoriaModal.php',600,'auto');" style="margin-top: 20px;">Adicionar Categoria</button>
		<div class="container_table"  style="width:100%; margin-top: 20px;">
			 <!-- Abrir modal  passando como paramêtro a URL, width, height -->
			<table>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Funções</th>
				</tr>

				<?php
				@session_start(); 
				require_once($_SESSION['require'].'cms/controller/controllerCatProdutoLoja.php');

				$controllerCatProdutoLoja =  new controllerCatProdutoLoja();

				$listCategoria = $controllerCatProdutoLoja->listarCatProdutoLoja();

				$cont = 0;

				while($cont < count($listCategoria)){ 

				?>

				<tr>
					<td><?=$listCategoria[$cont]->getTitulo();?></td>
					<td><?=$listCategoria[$cont]->getDesc();?></td>
					<td>
						<button style="margin: 2.5px auto" type="button" data-id="<?=$listCategoria[$cont]->getIdCatProduto();?>" class="btnBuscarCat" >Editar</button>
						<button style="margin: 2.5px auto" type="button" data-id ="<?=$listCategoria[$cont]->getIdCatProduto();?>" class="btnExluirCat">Excluir</button>
					</td>
				</tr>

				<?php

					$cont++;
				}
				?>
			</table>
		</div>
	</div>
</div>
	
<script>
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight){
		  panel.style.maxHeight = null;
		} else {
		  panel.style.maxHeight = panel.scrollHeight + "px";
		} 
	  });
	}
</script>