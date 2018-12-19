<?php

@session_start();

?>

<div id="container-posts">
<?php

require_once($_SESSION['require']."/dashboard/controller/controllerPost.php");
require_once($_SESSION['require']."/dashboard/controller/controllerComentario.php");

$controllerPost = new controllerPost();
$rsPost = $controllerPost->listarPost($_SESSION['aluno']["idRede"]);

for($cont = 0; $cont < count($rsPost); $cont++ ){


?>

	<div class="box-1">
		<i class="fal fa-ellipsis-h fa-2x t-clr4" style="position: absolute; right: 50px;"></i>
		<div class="row default-margin">
			<div class="col-100">
				<div class="row default-margin">
					<div class="col-10">
						<img src="https://cdn.blog.psafe.com/blog/wp-content/uploads/2017/09/perfil-fake.jpg" class="perfil foto-mini-2x" alt="usuario">
					</div>
					<div class="col-90 perfil nome-mini"><?= $rsPost[$cont]->getNomeUsuario();?></div>
				</div>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid  rgba(239,105,25,0.1); padding: 15px 0px 15px 10px;">
			<div class="col-100 pergunta" style="padding: 0px 20px 0px 20px; box-sizing: border-box;">
				<?= $rsPost[$cont]->getTexto();?>
			</div>
		</div>
		<div id="container-comentarios-post-<?= $rsPost[$cont]->getIdPost()?>">
			
			<?php
			
				$controllerComentario = new controllerComentario();
				$rsComentario = $controllerComentario->listarComentario($rsPost[$cont]->getIdPost());
			 	$contComentario = 0;
				while($contComentario < count($rsComentario)){
					
			?>
			
			<div class="row">
				<div class="col-05" style="margin-left: 5px;">
					<img src="https://cdn.blog.psafe.com/blog/wp-content/uploads/2017/09/perfil-fake.jpg" class="perfil foto-mini-1x" alt="perfil">
				</div>
				<div class="col-90 resposta">
					<?= $rsComentario[$contComentario]->getComentario(); ?>
				</div>
			</div>
			
			<?php
					$contComentario++;
				}
			
			?>
			
			<div class="row">
				<div class="col-05">
					<img src="https://cdn.blog.psafe.com/blog/wp-content/uploads/2017/09/perfil-fake.jpg" class="perfil foto-mini-1x" alt="perfil">
				</div>
				<div class="col-95">
					<form class="formComentario" name="formComentario" data-id-post="<?= $rsPost[$cont]->getIdPost() ?>">
						<input type="text" name="txtComentario" class="txtComentario" placeholder="comentar" style="padding: 6px 10px; margin-left: 5px;">
					</form>
				</div>
			</div>
		</div>
	</div>

<?php

    }

?>
</div>
<script>	

	$(function(){
		//Publica um novo post, Submit de frmPublicarRede
		$("#frmPublicarRede").formSubmit("router.php?controller=postRedeSocial&modo=inserir&matricula=<?= $_SESSION['aluno']["matricula"] ?>&idRede=<?= $_SESSION['aluno']["idRede"]  ?>",function(){
			//Atualiza posts
			$("#post").loadFrom("view/telas/rede_social.php");
			//Limpa formulario frmPublicarRede
			$("#box-postar").loadFrom({url:"view/home.php", target:"box-postar"});
		});
		
		//Submit do txtTexto usando enter
		$("#txtTexto").keypress(function(e){
			if(e.wich == 13 || e.keyCode == 13){
				e.preventDefault();
				$("#btnPublicarRede").trigger("click");
			}
		});
		
		//Submit do txtTexto usando enter
		$(".formComentario .txtComentario").keypress(function(e){
			if(e.wich == 13 || e.keyCode == 13){ //Pega click do enter, dentro do input
				e.preventDefault();
				
				var $form = $(this).parent(), id = $form.attr("data-id-post");//Pega formulario
				//Seta ação no submit				
				$form.formSubmit("router.php?controller=comentarioRedeSocial&modo=inserir&matricula=<?= $_SESSION['aluno']["matricula"] ?>&post=" + id);
				$form.submit(); //Efetua submit
				var $container = $(this).parents()[3]; //Pega container pai
				$($container).loadFrom({url:"view/telas/rede_social.php", target:$container.id}); //recarrega comentarios 
			}
		});
	});
</script>