<!-- 
        MODAL RESPONSÁVEL PELA VISUALIZAÇÃO DA AVALIAÇÃO DOS USUÁRIOS

      -->
<?php
if(isset($_GET['modo'])){
    if($_GET['modo']=="buscar"){
        $nome = $listAvaliacao->getNome();
        $avaliacao = $listAvaliacao->getAvaliacao();
        $comentario = $listAvaliacao->getComentario();
        $data = $listAvaliacao->getData();
    }
}


?>
<style>
    .info{
        width: 95%;
        height: 35x;
        background-color: gainsboro;
        float: left;
        margin-bottom: 20px;
        padding: 2%;
    }
    .biginfo{
        width: 95%;
        height: 190px;
        background-color: gainsboro;
        margin-bottom: 20px;
        float: left;
        padding: 2%;
    }
</style>
     <div class="header_modal">
         <div class="titulo_modal">Avaliação</div>
         <div class="botao_fechar" onclick="closeModal();">&times;</div>
         <div class="formulario_modal">
             <label>Nome</label>
             <div class="info">
                 <?php echo($nome);?>
             </div>
             <label>Avaliação</label>
             <div class="info">
                 <?php 
                    for ($j=1; $j <= $avaliacao; $j++) {
                 ?>
                     <img src="../img/estrela_amarela.png" style="float:left;">
                 <?php
                    }
                 for ($j=1; $j <= (5-$avaliacao); $j++) {
                 ?>
                     <img src="../img/estrela_cinza.png" style="float:left;">
                 <?php
                 }
                 ?>
             </div>
             <label>Comentário</label>
             <div class="biginfo">
                 <?php echo($comentario);?>
             </div>
             <label>Data</label>
             <div class="info">
                 <?php echo($data);?>
             </div>
            
             
         </div>
         
     </div> 