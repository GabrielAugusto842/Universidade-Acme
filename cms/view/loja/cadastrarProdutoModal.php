<!-- 
        MODAL RESPONSÁVEL POR CADASTRAR OS PRODUTOS DA LOJA

      -->
<?php
    //Efetuando cadastro
    $btn = "Cadastrar";
    //URL de inserção
    $urlModo = "../../router.php?controller=produtoloja&modo=inserir";
	$img = "";


if(isset($_GET['modo'])){
    if($_GET['modo'] == "buscar"){
        
        $idProduto = $listProdutoLoja->getIdProduto();
        $titulo = $listProdutoLoja->getTitulo();
        $desc = $listProdutoLoja->getDesc();
        $preco2 = $listProdutoLoja->getPreco();
		$preco = "R$".number_format($preco2, 2, ",", ".");
        $img = $listProdutoLoja->getImg();
        $categoria = $listProdutoLoja->getIdCategoria();
       
    //URL de edição
    $urlModo = "../../router.php?controller=produtoloja&modo=editar&id=".$idProduto;
    $btn = "Editar";
  }
}
?>   

<script>
	
	$(document).ready(function(){
		
		
		//Carrega foto do banco no formulario se existir 
		setInterval(<?= $img != "" ? "loadOnEdit('container-foto','".$_SESSION['requireUrl'].$img."','".$_SESSION['requireUrl']."',formProduto)" : "console.log('')"?>,300);
		//Caregar foto no formulario 
		pegarFoto("flFoto", "container-foto", "formProdutoFoto");

		enviarFormularioV2("formProduto","<?= $urlModo ?>");

		});

</script>
     <div class="header_modal">
         <div class="titulo_modal">
		 	<h1 class="titulo" style="margin: 0px">Cadastrar Produto</h1>
		 </div>
         <div class="botao_fechar" onclick="closeModal();">&times;</div>
     </div>
    <div class="formulario_modal">
		<form action="../../controller/function/functions.php?uploadFotoAjax&form=formProduto&nomeFt=flFoto&local=<?= urlencode('img/conteudo/loja/produtos/')?>" method="post" id="formProdutoFoto" name="formProdutoFoto" enctype="multipart/form-data">
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
        <form id="formProduto" enctype="multipart/form-data">
			<div class="row">
				<div class="col-100">
					<label for="txtTitulo">Nome:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<input type="text" name="txtTitulo" id="txtTitulo" value="<?=@$titulo?>" placeholder="Digite o nome do produto...">
					<input name="txtFoto" type="text" hidden="" required>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<label for="txtPreco">Valor:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<input type="text" name="txtPreco" id="txtPreco" value="<?=@$preco?>" placeholder="Digite o valor...">
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					 <label for="txtCatProduto">Categoria:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<select name="txtCatProduto" id="txtCatProduto">
						
                <?php
	
                    session_start();
                    require_once($_SESSION['require'].'cms/controller/controllerCatProdutoLoja.php');
                    $listCatProdutoLoja =  new controllerCatProdutoLoja();
                    $rsCatProdutoLoja = $listCatProdutoLoja::listarCatProdutoLoja();

                    $cont = 0;
                    while($cont < count($rsCatProdutoLoja)){ 

                     if($categoria == $rsCatProdutoLoja[$cont]->getIdCatProduto()) 
                     {
                         $selecionar = "selected"; //selecionar o combobox na hora de editar
                     }else{
                         $selecionar = "";
                     }
                ?>
                <option <?=$selecionar?> value="<?=$rsCatProdutoLoja[$cont]->getIdCatProduto()?>"><?=$rsCatProdutoLoja[$cont]->getTitulo();?></option>
                <?php
                        $cont++;
                    }
                ?>
           	 		</select>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<label for="txtDesc">Descrição:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
					<textarea name="txtDesc" id="txtDesc" placeholder="Digite uma descrição do produto..."><?=@$desc?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-100">
				    <input type="reset" name="" value="Limpar" style="margin-left: 10px">
            		<input type="submit" name="" value="<?=$btn?>">
				</div>
			</div>
        </form>
    </div> 