
<script>
    
    function excluir(id){
        
        var retorno = confirm('Deseja realmente excluir ?');
        
        if(retorno == true){
            
            $.ajax({
            url: "../../router.php?controller=evento&modo=excluir&id="+id,
            type:"GET",
            success:function(){
                syncTela("../telas/tabela_evento.php",".content");
            }
            
        });
            
        }
    }
    
    function buscar(id){
        $.ajax({
           url:"../../router.php?controller=evento&modo=buscar&id="+id,
           type:"GET",
		   success:function(){
			   openModal("../../router.php?controller=evento&modo=buscar&id="+id,600,'auto');
            }
        });
    }
</script>
<h1 class="titulo">Eventos</h1>
<div class="container_table" style="width:90%">
<!-- Abrir modal  passando como paramêtro a URL, width, height -->
<button type="button" onclick="openModal('cadastrarEventoModal.php', 600, 'auto');" style="position: absolute; margin-top: -55px;">Adicionar</button>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Data de inicio</th>
            <th>Data de termino</th>
            <th>Operação</th>
        </tr>


    <?php
          session_start();
          require_once($_SESSION['require'].'cms/controller/controllerEvento.php');

            $listEvento =  new controllerEvento();

            $rsEvento = $listEvento::listarEvento();

            $cont = 0;

            while($cont < count($rsEvento)){ 

    ?>
    <!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
    <tr>
        <td><?=$rsEvento[$cont]->getNome();?></td>
        <td><?=$rsEvento[$cont]->getDesc();?></td>
        <td><img src="<?=$_SESSION['requireUrl'].$rsEvento[$cont]->getFoto();?>" onClick="openModalImg('<?=$_SESSION['requireUrl'].$rsEvento[$cont]->getFoto();?>','<?=$rsEvento[$cont]->getNome();?>')" style="width: 100px; border-radius: 5px; padding: 3px;" alt="<?=$rsEvento[$cont]->getNome();?>"></td>
        <td><?=$rsEvento[$cont]->getInicio();?></td>
        <td><?=$rsEvento[$cont]->getTermino();?></td>
        <td>
            <button type="button" onclick="buscar(<?=$rsEvento[$cont]->getIdEvento();?>)">Editar</button>
            <button type="button" onclick=" excluir(<?=$rsEvento[$cont]->getIdEvento();?>)">Excluir</button>
        </td>

    </tr>
    <?php
        $cont++;

        }
    ?>
        </table>
</div>
