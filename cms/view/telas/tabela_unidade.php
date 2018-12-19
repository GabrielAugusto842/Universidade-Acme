<?php

$cont = 0;

?>
<script>
	
	function vefUnidades(){
			var unidades= $(".container_table table tr").length;
		
			if( unidades >= 4){
				$("#btnAdicionar").prop("disabled", true)
			}	
		}
	
    function excluir(id){

        var retorno = confirm('Deseja realmente excluir ?');

        if(retorno == true){

            $.ajax({
                url: "../../router.php?controller=unidade&modo=excluir&id="+id,
                type:"GET",
                success:function(dados){
                    syncTela("../telas/tabela_unidade.php",".content");
					vefUnidades();
            }
        });

        }
    }

    function buscar(id){
        $.ajax({
           url:"../../router.php?controller=unidade&modo=buscar&id="+id,
           type:"GET",
		   success:function(dados){
			   openModal("../../router.php?controller=unidade&modo=buscar&id="+id,600,'auto');
            }
        });
    }
	
	$(document).ready(function(){
		
		vefUnidades();
		
	})
	
</script>
<h1 class="titulo">Unidades</h1>
<div class="container_table" style="width:80%">
<!-- Abrir modal  passando como paramêtro a URL, width, height -->
<button type="button" onclick="openModal('cadastrarUnidadeModal.php', 600, 'auto');" style="position: absolute; margin-top: -55px;" id="btnAdicionar" >Adicionar</button>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Endereço</th>
            <th>Operação</th>
        </tr>


    <?php
          @session_start();
          require_once($_SESSION['require'].'cms/controller/controllerUnidade.php');

            $listUnidade =  new controllerUnidade();

            $rsUnidade = $listUnidade->listarUnidade();

            while($cont < count($rsUnidade)){

    ?>
    <!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
    <tr>
        <td><?=$rsUnidade[$cont]->getNome();?></td>
        <td><?=$rsUnidade[$cont]->getDesc();?></td>
        <td><img src="<?=$_SESSION['requireUrl'].$rsUnidade[$cont]->getFoto();?>" onClick="openModalImg('<?=$_SESSION['requireUrl'].$rsUnidade[$cont]->getFoto();?>','<?=$_SESSION['requireUrl'].$rsUnidade[$cont]->getNome();?>')" style="width: 100px; border-radius: 5px; padding: 3px;" alt="<?=$rsUnidade[$cont]->getNome();?>"></td>
        <td><?=$rsUnidade[$cont]->getEndereco();?></td>
        <td>
            <button style="margin: 2.5px auto" type="button" onclick="buscar(<?=$rsUnidade[$cont]->getIdUnidade();?>)">Editar</button>
            <button style="margin: 2.5px auto" type="button" onclick=" excluir(<?=$rsUnidade[$cont]->getIdUnidade();?>)">Excluir</button>
        </td>

    </tr>
    <?php
        $cont++;

        }
    ?>
        </table>
</div>
