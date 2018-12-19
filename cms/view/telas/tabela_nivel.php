<script>

    //Excluir dados
    function excluir(id){
        $.ajax({
            url:"../../router.php?controller=nivel&modo=excluir&id="+id,
            type:"GET",
            success:function(dados){
                syncTela("../telas/tabela_nivel.php",".content");
            }

      });
        
    }
    //Consultar
        function buscar(id){
             $.ajax({
                url:"../../router.php?controller=nivel&modo=buscar&id="+id,
                type:"GET",
                success:function(dados){
                    //Ao inves de abrir a modal abra a router pois ela possui o include da modal
                    openModal('../../router.php?controller=nivel&modo=buscar&id='+id, 450, "auto");               
                }
             });
        }


</script>

<h1 class="titulo">Niveis</h1>
<div class="container_table" style="width:50%">
    <!-- Abrir modal  passando como paramêtro a URL, width, height -->
    <button type="button" onclick="openModal('cadastrarNivelModal.php',450, 'auto');" style="position: absolute; margin-top: -55px;">Adicionar</button>
    <table>
        <tr>
            <th>Nome</th>
            <th>Privilégios</th>
            <th>Funções</th>
        </tr>

    <?php
          session_start();     
          require_once($_SESSION['require'].'cms/controller/controllerNivel.php');

            $listNivel =  new controllerNivel();

            $rsNivel = $listNivel::listarNivel();

            $cont = 0;

            while($cont < count($rsNivel)){    


    ?>

    <tr>
        <td><?=$rsNivel[$cont]->getNome();?></td>
        <td>paginas</td>
        <td style="padding: 5px 0px 5px 0px;">
            <button type="button" onclick="buscar(<?=$rsNivel[$cont]->getIdNivel();?>)">Editar</button>
            <button type="button" <?=$rsNivel[$cont]->getIdNivel() == 1 ? "disabled" : ""?>  onclick="excluir(<?=$rsNivel[$cont]->getIdNivel();?>)">Excluir</button>	
        </td>
    </tr>

    <?php
            $cont++;
        }
    ?>

    </table>
</div>