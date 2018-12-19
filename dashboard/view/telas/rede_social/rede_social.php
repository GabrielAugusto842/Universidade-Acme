<?php

@session_start();

?>

<div id="container-posts">
<?php

require_once($_SESSION['require']."/dashboard/controller/controllerPost.php");
require_once($_SESSION['require']."/dashboard/controller/controllerComentario.php");
require_once($_SESSION['require']."/dashboard/controller/controllerCurtida.php");
	
$qtdCurtida = 0;

$controllerPost = new controllerPost();
$rsPost = $controllerPost->listarPost($_SESSION['aluno']["idRede"]);

for($cont = 0; $cont < count($rsPost); $cont++ ){
	$idPost = $rsPost[$cont]->getIdPost();
	
	$controllerCurtida = new controllerCurtida();
	$rsCurtida = $controllerCurtida->buscarCurtidaByPost($idPost);

	if (isset($idPost)){
//		$qtdCurtida = $rsCurtida->getQtdCurtida();
//		$qtdCurtida = $idPost;
	}

?>

	<div class="box-1">
		<i class="fal fa-ellipsis-h fa-2x t-clr4" style="position: absolute; right: 50px;"></i>
		<div style="position: absolute; right: 35px; margin-top: 65px;">
				<div class="row" style="margin: -30px 0px 0pc 25px;">
					<div class="col-100">
						<i class="fal fa-heart fa-1x icon"></i>
					</div>
					<div class="col-100" style="margin-left: -15px">
						<label id="label-txtComentario-<?= $rsPost[$cont]->getIdPost() ?>" for="txtComentario-<?= $rsPost[$cont]->getIdPost() ?>">
							<i class="fal fa-comment fa-1x icon"></i>
						</label>
					</div>
				</div>
			</div>
		<div class="row default-margin">
			<div class="col-100">
				<div class="row default-margin">
					<div class="col">
						<img src="<?= $rsPost[$cont]->getFotoUsuario() != "" ? $_SESSION['requireUrl'].$rsPost[$cont]->getFotoUsuario() : 'https://cdn.blog.psafe.com/blog/wp-content/uploads/2017/09/perfil-fake.jpg' ;?>" class="perfil foto-mini-2x" alt="usuario">
					</div>
					<div class="col perfil nome-mini" style="margin-left: 10px;"><?= $rsPost[$cont]->getNomeUsuario();?></div>
				</div>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid  rgba(239,105,25,0.1); padding: 15px 0px 15px 10px;">
			<div class="col-90 pergunta" style="padding: 0px 20px 0px 20px; box-sizing: border-box;">
				<?= $rsPost[$cont]->getTexto();?>
			</div>
		</div>
		<div id="container-comentarios-post-<?= $rsPost[$cont]->getIdPost()?>">
			
			<?php
			
				$controllerComentario = new controllerComentario();
				$rsComentario = $controllerComentario->listarComentario($rsPost[$cont]->getIdPost());
			 	$contComentario = 0;
				while($contComentario < @count($rsComentario)){
					
			?>
			
			<div class="row">
				<div class="col-05" style="margin-left: 5px;">
					<img src="<?= $rsComentario[$contComentario]->getFoto() != "" ? $_SESSION['requireUrl'].$rsComentario[$contComentario]->getFoto() : 'https://cdn.blog.psafe.com/blog/wp-content/uploads/2017/09/perfil-fake.jpg' ;?>" class="perfil foto-mini-1x" alt="perfil">
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
				<div class="col-90 centralizarX">
					<form class="formComentario" name="formComentario"  autocomplete="off" data-id-post="<?= $rsPost[$cont]->getIdPost() ?>">
						<input type="text" name="txtComentario" id="txtComentario-<?= $rsPost[$cont]->getIdPost() ?>" class="txtComentario" placeholder="Adicionar comentario" style="padding: 6px 10px; margin-left: 5px;">
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
			$("#post").load("view/telas/rede_social/rede_social.php");
			//Limpa formulario frmPublicarRede
			$("#box-postar").load("view/telas/rede_social/postar.php");
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
				console.log($container.id);
				$($container).load("view/telas/rede_social/rede_social.php #" + $container.id, function(){ //recarrega comentarios 
					$("#post").load("view/telas/rede_social/rede_social.php"); //Atualiza posts
					$("#box-postar").load("view/telas/rede_social/postar.php"); //Limpa formulario frmPublicarRede
					/*Manten foco no campo de comentario*/
					var label = "#label-txtComentario-"+id;
					setTimeout(function(){
						$(label).trigger("click");
					},300);
				});
			}
		});
	});
</script>