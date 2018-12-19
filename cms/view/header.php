<script>

 //Abrir e fechar o menu
        $(document).ready(function() {
                $(".icone_menu").click(function(){
                    $(".container_menu").toggle('slide');
                });

            $(".fechar_menu").click(function(){
                    $(".container_menu").toggle('slide');
                });
        });
//Abrir e fechar o menu

</script>

<?php

$url;
$caminho;

@session_start();

if($_SERVER['SERVER_NAME'] == 'www.alcateck.tk'){ // Para rodar no servidor

    //URL traz o caminho correto, pois o padrão MVC dificulta a linkagem de páginas
    $url = "http://".$_SERVER['SERVER_NAME']."/acme/";
	$_SESSION['requireUrl'] = $url;


    //Setando uma variavel de sessao que poderá ser acessada em todos os lugares
    //Caminho dos requires
    $caminho = $_SERVER['DOCUMENT_ROOT']."/acme/";
    $_SESSION['require'] = $caminho;

}else{ //Para rodar local
    //URL traz o caminho correto, pois o padrão MVC dificulta a linkagem de páginas
    $url = "http://".$_SERVER['SERVER_NAME']."/INF4T/alcateck/acme/";
	$_SESSION['requireUrl'] = $url;


    //Setando uma variavel de sessao que poderá ser acessada em todos os lugares
    //Caminho dos requires
    $caminho = $_SERVER['DOCUMENT_ROOT']."/INF4T/alcateck/acme/";
    $_SESSION['require'] = $caminho;

}
    if(!isset($_SESSION['require'])){
        header('location:'.$_SESSION['requireUrl'].'cms/login.php');
    }
	
	//Mandar pra login caso não funcione a autenticação
	if(!isset($_SESSION['usuario'])){
		header('location:'.$_SESSION['requireUrl'].'cms/login.php');
	}

	if($_SESSION['usuario'] == null){
		header('location:'.$_SESSION['requireUrl'].'cms/login.php');
	}

if (isset($_SESSION['nivel_usuario'])) {
	require_once($_SESSION['require'].'cms/controller/controllerNivel.php');
	$idUsuario = $_SESSION['nivel_usuario']['idUsuario'];
	
	$listNivel = new controllerNivel();
	$rsNivel = $listNivel->listarPermissao($idUsuario);
	
	$pagina = array();

	for($cont = 0; $cont < count($rsNivel); $cont++){
		$pagina[] = $rsNivel[$cont]->getPagina();
	}
	
}

?>

<header>
	
	<nav>
	  <ul>
		<?php
		if (in_array("Avaliações", $pagina)) {
		?>
		<li>
		  <i class="fal fa-thumbs-up fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/avaliacoes/avaliacoes.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/avaliacoes/avaliacoes.php'">Avaliações</h6>
		</li>
		<?php
		}
		if (in_array("Campanhas", $pagina)) {
		?>
		<li>
		  <i class="fal fa-images fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/campanha/campanhas.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/campanha/campanhas.php'">Campanhas</h6>
		</li>
		<?php
		}
		if (in_array("Conteudo", $pagina)) {
		?>
		<li>
		  <i class="fal fa-browser fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/conteudo/conteudo.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/conteudo/conteudo.php'">Conteudo</h6>
		</li>
		<?php
		}
		if (in_array("Curriculos", $pagina)) {
		?>
		<li>
		  <i class="fal fa-file-alt fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/trabalhe-conosco/curriculos.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/trabalhe-conosco/curriculos.php'">Curriculos</h6>
		</li>
		<?php
		}
		if (in_array("Cursos", $pagina)) {
		?>
		<li>
		  <i class="fal fa-graduation-cap fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/cursos/cursos.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/cursos/cursos.php'">Cursos</h6>
		</li>
		<?php
		}
		if (in_array("E-mail", $pagina)) {
		?>
		<li>
		  <i class="fal fa-envelope fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/email/emails.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/email/emails.php'">E-mail</h6>
		</li>
		<?php
		}
		if (in_array("Eventos", $pagina)) {
		?>
		<li>
		  <i class="fal fa-calendar fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/eventos/eventos.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/eventos/eventos.php'">Eventos</h6>
		</li>
		<?php
		}
		if (in_array("Loja", $pagina)) {
		?>
		<li>
		  <i class="fal fa-credit-card-blank fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/loja/loja.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/loja/loja.php'">Loja</h6>
		</li>
		<?php
		}
		if (in_array("Niveis", $pagina)) {
		?>
		<li>
		  <i class="fal fa-unlock-alt fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/usuarios/niveis.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/usuarios/niveis.php'">Niveis</h6>
		</li>
		<?php
		}
		if (in_array("Noticias", $pagina)) {
		?>
		<li>
		  <i class="fal fa-newspaper fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/noticia/noticias.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/noticia/noticias.php'">Noticias</h6>
		</li>
		<?php
		}
		if (in_array("Unidades", $pagina)) {
		?>
		<li>
		  <i class="fal fa-building fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/unidades/unidades.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/unidades/unidades.php'">Unidades</h6>
		</li>
		<?php
		}
		if (in_array("Usuarios", $pagina)) {
		?>
		<li>
		  <i class="fal fa-users fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/usuarios/usuarios.php'"></i> 
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/usuarios/usuarios.php'">Usuarios</h6>
		</li>
		<?php
		}
		if (in_array("Parceiros", $pagina)) {
		?>
		<li>
		  <i class="fal fa-handshake fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/parceiros/parceiros.php'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/view/parceiros/parceiros.php'">Parceiros</h6>
		</li>
		<?php
		}
		?>
	  	<li>
		  <i class="fal fa-sign-out fa-2x" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/index.php?logout'"></i>
		  <h6 class="titulo t-clr4" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/index.php?logout'">logout</h6>
		</li>
	  </ul>
	</nav>
	<div>
		<div class="icone_cms" onClick="window.location='<?= $_SESSION['requireUrl']?>cms/'" style="z-index: 400; cursor: pointer;"></div>
	</div>
	<div class="box_usuario">
       <h3 class="titulo " style=" float: right; display: block; position: relative; top: 50%; transform: translate(0,-50%); text-align: right; margin: 0px 40px 0px 0px;"> <?=$_SESSION['usuario']?></h3>
		<div class="icone_usuario">
			<img src="<?php echo($_SESSION['foto_user']);?>" style="width: 100%;height: 100%; border-radius: 100%;">
        </div>
    </div>
	<div class="container"><div class="menu-icon"><span></span></div></div>
</header>


<script>

(function($){
  
  $(".menu-icon").on("click", function(){
    	$(this).toggleClass("open");
    	$(".container").toggleClass("nav-open");
    	$("nav ul li").toggleClass("animate");
  });
  
})(jQuery);


</script>
