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

</script>

<h1 class="titulo">E-mails</h1>
<div class="container_table" style="width:80%">
    <!-- Abrir modal  passando como paramêtro a URL, width, height -->
    <button type="button" onclick="openModal('enviarEmailModal.php',600, 'auto');" style="position: absolute; margin-top: -55px;">Novo</button>
    <table>
        <tr>
            <th>Remetente</th>
            <th>Destinatario</th>
            <th>Assunto</th>
            <th>Conteudo</th>
            <th>Funções</th>
        </tr>

    <?php
//          session_start();
//          require_once($_SESSION['require'].'cms/controller/controllerUsuario.php');
//
//            $listUsuario =  new controllerUsuario();
//
//            $rsUsuario = $listUsuario::listarUsuario();
//
//            $cont = 0;
//
//            while($cont < count($rsUsuario)){ 

    ?>

    <tr>
        <td>aaa</td>
        <td>aaa</td>
        <td>aa</td>
        <td>aaa</td>
        <td style="padding: 5px 0px 5px 0px;">
            <button type="button" >Visualizar</button>
            <button type="button"  onclick="excluir()">Excluir</button>
        </td>
    </tr>

    <?php
//        $cont++;
//
//        }
    ?>
    </table>
</div>