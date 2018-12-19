<script>
    function buscar(id){
        $.ajax({
                url:"../../router.php?controller=avaliacao&modo=buscar&id="+id,
                type:"GET",
                success:function(dados){
                    //Ao inves de abrir a modal abra a router pois ela possui o include da modal
                    openModal('../../router.php?controller=avaliacao&modo=buscar&id='+id, 600, 800);               
                }
             });
    }
    
    function excluir(id){
        
        var retorno = confirm('Deseja realmente excluir ?');
        
        if(retorno == true){
            
            $.ajax({
            url: "../../router.php?controller=avaliacao&modo=excluir&id="+id,
            type:"GET",
            success:function(){
               syncTela("../telas/tabela_avaliacao.php",".content");
            }
            
        });
            
        }
    }
	function ativar(id, status) {
		$.ajax({
			url:"../../router.php?controller=avaliacao&modo=ativar&id="+id+"&status="+status,
			type:"GET",
			success:function(dados){
				syncTela("../telas/tabela_avaliacao.php",".content");
			}
		});
	}


</script>


<h1 class="titulo">Avaliações</h1>
 <div class="container_table" style="width:95%">
     
     <table>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Avaliação</th>
            <th>Comentario</th>
            <th>Funções</th>
        </tr>

     <?php
         session_start();
         require_once($_SESSION['require'].'cms/controller/controllerAvaliacao.php');

         $listAvaliacao =  new controllerAvaliacaoPrimaria();

         $rsAvaliacao = $listAvaliacao::listarAvaliacao();

         $cont = 0;

         while($cont < count($rsAvaliacao)){
     ?>
         
    <tr>
        <td><?=$rsAvaliacao[$cont]->getNome();?></td>
        <td><?=$rsAvaliacao[$cont]->getEmail();?></td>
        <td>
            <?php
			 $nomeBotao = null;
			 if ($rsAvaliacao[$cont]->getStatus())
				 $nomeBotao = "Desativar";
			 else
				 $nomeBotao = "Ativar";
			 
             $nbd = $rsAvaliacao[$cont]->getAvaliacao();//Número de estrelas do banco de dados
             for ($j=1; $j <= $nbd; $j++) {
             ?>
                 <i class="fal fa-star" style="color: rgba(239,105,25,0.68); margin: 0px 0px;"></i>
             <?php
             }
             for ($j=1; $j <= (5-$nbd); $j++) {
             ?>
                 <i class="fal fa-star" style="color: lightgray; margin: 0px 0px;"></i>
             <?php
             }
             ?>
        </td>
        <td><?=$rsAvaliacao[$cont]->getComentario();?></td>
        <td>
			<button type="button" onClick="ativar(<?=$rsAvaliacao[$cont]->getIdAvaliacao()?>, <?=$rsAvaliacao[$cont]->getStatus()?>)"><?=$nomeBotao?></button>
            <button type="button" onclick="excluir(<?=$rsAvaliacao[$cont]->getIdAvaliacao();?>)">
			Excluir</button>
            
            <button type="button" onclick="buscar(<?=$rsAvaliacao[$cont]->getIdAvaliacao();?>);">Visualizar</button>
            <!--        <img src="" class="funcoes">-->
        </td>
    </tr>
         
     <?php
             $cont++;
         }
     ?>
     </table>
 </div>
