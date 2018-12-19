<?php  
    $nome;

    //Efetuando cadastro
    $btn = "Cadastrar";
    $nome = "";
    //URL de inserção
    $urlModo = "../../router.php?controller=nivel&modo=inserir";

    //Atualizando informações caso a variavel modo seja buscar
    if(isset($_GET['modo'])){
      if($_GET['modo'] == "buscar"){   
        $idNivel = $listNivel->getIdNivel();
        $nome = $listNivel->getNome();

        //URL de edição
        $urlModo = "../../router.php?controller=nivel&modo=editar&id=".$idNivel;
        $btn = "Editar";
      }
}
?>

<script>
    $(document).ready(function() {
		
		var modo = "<?= $urlModo ?>";
		
		//Envia formulario de forma assincrona
		 $("#formNivel").formSubmit(modo,function(){
			 //Efetua reload de tela de forma assincrona
			 $(".content").loadFrom("../telas/tabela_nivel.php");
			 closeModal();
		 });
    });
</script>

 <div class="header_modal">
     <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Nivel</h1>
     </div>
     <div class="botao_fechar" onclick="closeModal();">&times;</div>
 </div>
<div class="formulario_modal">
    <form id="formNivel">
        
        <div class="row">
            <div class="col-100">
                 <label for="txtNome">Nome:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtNome" name="txtNome" value="<?=$nome?>" placeholder="Digite o nome do nivel..." required>
            </div>
        </div>
		<div class="row" style="margin-bottom: 10px;">
            <div class="col-100">
                <label>Privilégios:</label>
            </div>
        </div>
		<div style="overflow: auto; height: 250px; margin-bottom: 20px;">
		<?php
    
            session_start();
                    
            require_once($_SESSION['require'].'cms/controller/controllerPagina.php');
                    
            $controllerPagina = new controllerPagina();        
            $listPagina = $controllerPagina->listarPagina();
              
            $cont  = 0;
            while($cont < count($listPagina)){
            
        ?>
		
		
			<div class="row">
				<div class="col-30">
					<label for="chk<?="chk".$listPagina[$cont]->getNome()?>" style="color: rgba(239,105,25,0.88);"><?= utf8_encode($listPagina[$cont]->getNome()) ?></label>
				</div>
				<div class="col-10">
					<label class="chk">
						<input id="<?= "chk".$listPagina[$cont]->getNome()?>" name="<?= utf8_encode("chk".$listPagina[$cont]->getNome()) ?>" type="checkbox">
						<span class="chk1"></span>
					</label>
				</div>
			</div>
		
		
		<?php
				$cont++;
				
			}
		
		?>
		</div>
        <div class="row">
            <div class="col-100">
                <input type="reset" name="btbLimapra" value="Limpar" style="margin-left: 10px;">
                <input type="submit" name="btnSalvar" id="btnSalvar" value="<?= $btn ?>">
            </div>
        </div>
    </form>
</div> 
    