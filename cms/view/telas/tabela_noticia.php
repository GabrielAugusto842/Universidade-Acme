<script>
    function excluir(id){

        var retorno = confirm('Deseja realmente excluir ?');
        
        if(retorno == true){

            $.ajax({
                url:"../../router.php?controller=noticia&modo=excluir&id="+id,
                type:"GET",
                success:function(){
                    syncTela("../telas/tabela_noticia.php",".content");
                }

            });
        }
    }

    function buscar(id){
        $.ajax({
           url:"../../router.php?controller=noticia&modo=buscar&id="+id,
           type:"GET",
		   success:function(){
			   openModal("../../router.php?controller=noticia&modo=buscar&id="+id,600,'auto');
            }
        });
    }
</script>

<h1 class="titulo">Noticias</h1>
<div class="container_table" style="width:90%">
    <!-- Abrir modal  passando como paramêtro a URL, width, height -->
    <button type="button" onclick="openModal('cadastrarNoticiaModal.php', 600, 'auto');" style="position: absolute; margin-top: -55px;">Adicionar</button>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>foto</th>
            <th>Data de Inicio</th>
            <th>Data de Termino</th>
            <th>Operação</th>
        </tr>


    <?php

        session_start();
        require_once($_SESSION['require'].'cms/controller/controllerNoticia.php');
        $controllerNoticia =  new controllerNoticia();

        $rsNoticia = controllerNoticia::listarNoticia();

        $cont = 0;

        while($cont < count($rsNoticia)){

    ?>
    <!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
    <tr>
        <td><?=$rsNoticia[$cont]->getTitulo();?></td>
        <td><?=$rsNoticia[$cont]->getDesc();?></td>
        <td><img src="<?=$_SESSION['requireUrl'].$rsNoticia[$cont]->getFoto()?>" onClick="openModalImg('<?=$_SESSION['requireUrl'].$rsNoticia[$cont]->getFoto();?>','<?=$rsNoticia[$cont]->getTitulo();?>')" style="width: 100px; border-radius: 5px; padding: 3px;" alt="<?=$rsNoticia[$cont]->getTitulo();?>"></td>
        <td><?=$rsNoticia[$cont]->getInicio();?></td>
        <td><?=$rsNoticia[$cont]->getTermino();?></td>
        <td style="padding: 5px 0px 5px 0px;">
            <button type="button" onclick="buscar(<?=$rsNoticia[$cont]->getIdNoticia()?>)">Editar</button>
            <button type="button" onclick="excluir(<?=$rsNoticia[$cont]->getIdNoticia()?>)">Excluir</button>
        </td>

    </tr>
    <?php
        $cont++;

        }
    ?>
        </table>
</div>
