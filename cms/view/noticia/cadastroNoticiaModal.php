    <!--
        MODAL RESPONSÁVEL POR CADASTRAR AS NOTICIAS
      -->
<?php
    //Efetuando cadastro
    $btn = "Cadastrar";
    //URL de inserção
    $urlModo = "../../router.php?controller=noticia&modo=inserir";

if(isset($_GET['modo'])){
    if($_GET['modo'] == "buscar"){
    $idNoticia = $listNoticia->getIdNoticia();
    $titulo = $listNoticia->getTitulo();
    $desc = $listNoticia->getDesc();
    $foto = $listNoticia->getFoto();
    $inicio = $listNoticia->getInicio();
    $termino = $listNoticia->getTermino();

    //URL de edição
    $urlModo = "../../router.php?controller=noticia&modo=editar&id=".$idNoticia;
    $btn = "Editar";
  }
}
?>

<script>
$(document).ready(function() {
    $("#formNoticia").submit(function(event) {
         //Cancelar ação do submit
          event.preventDefault();

        //Inserir ou editar Nivel
            $.ajax({
                url:"<?=$urlModo?>",
                type:"POST",
                data: new FormData($('#formNoticia')[0]),
                cache:false,
                contentType:false,
                processData:false,
                async:true,
                success:function(dados){
                    closeModal();
                    syncTela("../telas/tabela_noticia.php",".content");
                }

              });
        });
    });

</script>

     <div class="header_modal">
         <div class="titulo_modal">Cadastrar Noticia</div>
         <div class="botao_fechar" onclick="closeModal();">&times;</div>
     </div>
    <div class="formulario_modal">
        <form id="formNoticia">
            <label>Titulo</label>
            <input type="text" name="txtTitulo" value="<?=@$titulo?>">
            <label>Descrição</label>
            <textarea name="txtDesc" value="<?=@$desc?>"></textarea>
            <label>Foto</label>
            <input type="text" name="txtFoto" value="<?=@$foto?>">
            <input type="reset" name="" value="Limpar" class="button">
            <input type="submit" name="" value="<?=$btn?>" class="button">
        </form>
    </div>
