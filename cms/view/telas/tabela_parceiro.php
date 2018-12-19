<script>

    //Excluir dados
    
    
    
    function excluir(id){
        var retorno = confirm('Deseja realmente excluir ?');
        if(retorno == true){
        $.ajax({
                url:"../../router.php?controller=parceiro&modo=excluir&id="+id,
                type:"GET",
                success:function(dados){
                syncTela("../telas/tabela_parceiro.php",".content");
            }

      });
        
    }
        
        
    }
    //Consultar
        function buscar(id){
             $.ajax({
                url:"../../router.php?controller=parceiro&modo=buscar&id="+id,
                type:"GET",
                success:function(dados){
                    //Ao inves de abrir a modal abra a router pois ela possui o include da modal
                    openModal('../../router.php?controller=parceiro&modo=buscar&id='+id, 450, "auto");        
                }
             });
        }


</script>

<h1 class="titulo">Parceiros</h1>
<div class="container_table" style="width:50%">
    <!-- Abrir modal  passando como paramêtro a URL, width, height -->
    <button type="button" onclick="openModal('cadastrarParceiroModal.php',450, 'auto');" style="position: absolute; margin-top: -55px;">Adicionar</button>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Funções</th>
        </tr>

    <?php
          session_start();     
          require_once($_SESSION['require'].'cms/controller/controllerParceiro.php');

            $listP=  new controllerParceiro();

            $rsParceiro = $listP::listarParceiro();

            $cont = 0;

            while($cont < count($rsParceiro)){    


    ?>

    <tr>
        <td><?= $rsParceiro[$cont]->getNome();?></td>
        <td><?= $rsParceiro[$cont]->getDesc();?></td>
        <td style="padding: 5px 0px 5px 0px;">
            <button type="button" onclick="buscar(<?= $rsParceiro[$cont]->getIdParceiro();?>)">Editar</button>
            <button type="button" onclick="excluir(<?=$rsParceiro[$cont]->getIdParceiro();?>);">Excluir</button>	
        </td>
    </tr>

    <?php
            $cont++;
        }
    ?>

    </table>
</div>