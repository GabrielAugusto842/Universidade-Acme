<script>
    function excluir(id){

        var retorno = confirm('Deseja realmente excluir ?');
        
        if(retorno == true){

            $.ajax({
                url:"../../router.php?controller=campanha&modo=excluir&id="+id,
                type:"GET",
                success:function(){
                    syncTela("../telas/tabela_campanha.php",".content");
                }

            });
        }
    }

    function buscar(id){
        $.ajax({
           url:"../../router.php?controller=campanha&modo=buscar&id="+id,
           type:"GET",
		   success:function(){
			   openModal("../../router.php?controller=campanha&modo=buscar&id="+id,600,'auto');
            }
        });
    }
</script>

<h1 class="titulo">Campanhas</h1>
<div class="container_table" style="width:80%">
    <!-- Abrir modal  passando como paramêtro a URL, width, height -->
    <button type="button" onclick="openModal('cadastrarCampanhaModal.php', 600, 'auto');" style="position: absolute; margin-top: -55px;">Adicionar</button>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>foto</th>
            <th>Operação</th>
        </tr>


    <?php

        session_start();
        require_once($_SESSION['require'].'cms/controller/controllerCampanha.php');
        $controllerCampanha =  new controllerCampanha();

        $rsCampanha = controllerCampanha::listarCampanha();

        $cont = 0;

        while($cont < count($rsCampanha)){

    ?>
    <!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
    <tr>
        <td><?=$rsCampanha[$cont]->getNome();?></td>
        <td><?=$rsCampanha[$cont]->getDesc();?></td>
        <td><img src="<?=$_SESSION['requireUrl'].$rsCampanha[$cont]->getFoto()?>" onClick="openModalImg('<?=$_SESSION['requireUrl'].$rsCampanha[$cont]->getFoto();?>','<?=$rsCampanha[$cont]->getNome();?>')" style="width: 100px; border-radius: 5px; padding: 3px;" alt="<?=$rsCampanha[$cont]->getNome();?>"></td>
        <td style="padding: 5px 0px 5px 0px;">
            <button type="button" onclick="buscar(<?=$rsCampanha[$cont]->getIdCampanha()?>)">Editar</button>
            <button type="button" onclick="excluir(<?=$rsCampanha[$cont]->getIdCampanha()?>)">Excluir</button>
        </td>

    </tr>
    <?php
        $cont++;

        }
    ?>
        </table>
</div>
