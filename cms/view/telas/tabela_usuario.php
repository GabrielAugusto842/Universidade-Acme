<script>
    function excluir(id){
        
        var retorno = confirm('Deseja realmente excluir ?');
        
        if(retorno == true){
            $.ajax({
                url:"../../router.php?controller=usuario&modo=excluir&id="+id,
                type:"GET",
                success:function(){
                    syncTela("../telas/tabela_usuario.php",".content");
                }
            });
        }
    }
    
    function buscar(id){
        $.ajax({
           url:"../../router.php?controller=usuario&modo=buscar&id="+id,
           type:"GET",
            success:function(){
                openModal("../../router.php?controller=usuario&modo=buscar&id="+id,600,'auto');
            }
        });
    }
	
	function ativar(id, status) {
		$.ajax({
			url:"../../router.php?controller=usuario&modo=ativar&id="+id+"&status="+status,
			type:"GET",
			success:function(dados){
				syncTela("../telas/tabela_usuario.php",".content");
			}
		});
	}

</script>

<h1 class="titulo">Usuarios</h1>
<div class="container_table" style="width:80%">
    <!-- Abrir modal  passando como paramêtro a URL, width, height -->
    <button type="button" onclick="openModal('cadastrarUsuarioModal.php',600, 'auto');" style="position: absolute; margin-top: -55px;">Adicionar</button>
    <table>
        <tr>
            <th>Nome</th>
            <th>Usuario</th>
            <th>E-mail</th>
            <th>Nivel</th>
            <th>Funções</th>
        </tr>

    <?php
          	@session_start();
          	require_once($_SESSION['require'].'cms/controller/controllerUsuario.php');
			require_once($_SESSION['require'].'cms/controller/controllerNivel.php');

            $listUsuario =  new controllerUsuario();

            $rsUsuario = $listUsuario::listarUsuario();

            $cont = 0;
			$nivel = "";

            while($cont < count($rsUsuario)){ 
				$nomeBotao = null;
				$idNivel = $rsUsuario[$cont]->getIdNivel();
				if ($rsUsuario[$cont]->getAtivo())
					$nomeBotao = "Desativar";
				else
					$nomeBotao = "Ativar";
				
				$listNivel = new controllerNivel();
				$rsNivel = $listNivel->buscarNivel($idNivel);
				
				if (isset($idNivel)){
					$nivel = $rsNivel->getNome();
				}
    ?>

    <tr>
        <td><?=$rsUsuario[$cont]->getNome();?></td>
        <td><?=$rsUsuario[$cont]->getUsuario();?></td>
        <td><?=$rsUsuario[$cont]->getEmail();?></td>
        <td><?=$nivel;?></td>
        <td style="padding: 5px 0px 5px 0px;">
			<button type="button" <?=$rsUsuario[$cont]->getIdUsuario() == 1 ? "disabled" : ""?> onClick="ativar(<?=$rsUsuario[$cont]->getIdUsuario()?>, <?=$rsUsuario[$cont]->getAtivo()?>)"><?=$nomeBotao?></button>
            <button type="button" onclick="buscar(<?=$rsUsuario[$cont]->getIdUsuario();?>)">Editar</button>
            <button type="button" <?=$rsUsuario[$cont]->getIdUsuario() == 1 ? "disabled" : ""?> onclick="excluir(<?=$rsUsuario[$cont]->getIdUsuario();?>)">Excluir</button>
        </td>
    </tr>

    <?php
        $cont++;

        }
    ?>
    </table>
</div>