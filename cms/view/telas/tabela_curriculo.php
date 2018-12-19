
<script>

    function excluir(id){

        var retorno = confirm('Deseja realmente excluir ?');

        if(retorno == true){

            $.ajax({
                url: "../../router.php?controller=trabConosco&modo=excluir&id="+id,
                type:"GET",
                success:function(){
                    syncTela("../telas/tabela_curriculo.php",".content");
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
			   alterarEstado(id);
            }
        });
    }
</script>
<h1 class="titulo">Curriculos</h1>
<div class="container_table" style="width:80%">
<!-- Abrir modal  passando como paramêtro a URL, width, height -->
    <table>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Curriculo</th>
            <th>Operação</th>
        </tr>


    <?php
          @session_start();
          require_once($_SESSION['require'].'cms/controller/controllerTrabalhe.php');

          $listCurriculo =  new controllerTrabalhe();

          $rsCurriculo = $listCurriculo->listarTrabConosco();
		
          $cont = 0;

          while($cont < count($rsCurriculo)){

    ?>
    <!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
    <tr>
        <td><?=$rsCurriculo[$cont]->getNome();?></td>
        <td><?=$rsCurriculo[$cont]->getEmail();?></td>
        <td><?=$rsCurriculo[$cont]->getTelefone();?></td>
        <td style="padding: 5px 0px;">
            <button type="button" onclick="window.open('<?=$_SESSION['requireUrl'].$rsCurriculo[$cont]->getCurriculo();?>', '_blank');">Visualizar Curriculo</button>
        </td>
        <td style="padding: 5px;">
            <button type="button" onclick="window.open('<?=$_SESSION['requireUrl'].$rsCurriculo[$cont]->getCurriculo();?>', '_blank');">Visualizar</button>
            <button type="button" onclick=" excluir(<?=$rsCurriculo[$cont]->getIdTrabConosco();?>)">Excluir</button>
        </td>

    </tr>
    <?php
        	$cont++;

        }
    ?>
        </table>
</div>
