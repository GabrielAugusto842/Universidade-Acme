<?php
    @session_start();
    require_once("sessao.php");

   require_once($_SESSION['require']."cms/controller/conteudo/controllerAvaliacao.php");
    $controllerAval = new controllerAvaliacao();

//INICIO
    $list = $controllerAval->buscarAvaliacao(1);
    $conteudo = explode(";", $list->getConteudo());

	$background = $_SESSION['requireUrl'].$list->getFoto();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Avaliações</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/function.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        
        $("#btnModal").click(function(){
            openModal('telas/modal_avaliacao.php', 1000, 600);
        })
        
       $("#visu_aval").click(function(){
           $("#bloco_avaliacoes").css("height","auto");
       });
    });
    
</script>
<style>
	
	#menu_line{
    height: 4px;
    width: 50px;
    background-color: #db5728;;
    position: absolute;
    top:50%;
    left: 50%;
    transform: translate(-50%,-50%);
    transition: all .3s;
    border-radius: 4px;
}
	
	#menu_line::before{
    content: "";
    height: 4px;
    width: 40px;
    background-color: #db5728;;
    position: absolute;
    margin-top: 10px;
    transition: all .3s;
    border-radius: 4px;
}

#menu_line::after{
    content: "";
    height: 4px;
    width: 40px;
    background-color: #db5728;;
    position: absolute;
    margin-top: -10px;
    transition: all .3s;
    border-radius: 4px;
}
	.area-aluno{
		color: #db5728;
	}
	
</style>
</head>
    
<body>
    <!--Modal-->
    <div class="container_modal">
       <div class="modal avaliacao"></div>
   </div>
    <!-- Inicio header -->
    <?php
        require_once("header.php");
    ?>
    <header id="header_avaliacao" class="bg-fullsc" style="background-image: url(<?=$background?>)">
      <h3 class="subTitulo txt-color4" style="text-align: center; margin: 40px 0px 0px 0px "><?=$conteudo[0]?></h3>
      <h4 class="subTitulo txt-color3" style="text-align: center; margin: 40px 0px 0px 0px "><?=$conteudo[1]?></h4>
      <h5 class="subTitulo center txt-color3"  style=" text-align: center;  margin-top: 20px; width: 500px;"><?=$conteudo[2]?></h5>
      <section class="container">
          <div id="bloco_avaliacoes" class="contentent-col" style="margin: 30px 0px 0px 0px;">
                
              <?php
              
              require_once($_SESSION['require']."cms/controller/controllerAvaliacao.php");

             $listAvaliacao =  new controllerAvaliacaoPrimaria();

             $rsAvaliacao = $listAvaliacao::listarAvaliacao();

             $cont = 0;
              
              while($cont < count($rsAvaliacao)){
              	if ($rsAvaliacao[$cont]->getStatus()){
              
              ?>
              <article class="bloco col-31" style="height: 180px">
<!--
			FOTO DA AVALIAÇÃO NÃO FOI POSSIVEL COLOCAR
                  <div class="col-40" style="height: 100%;">
                      <div class="perfil">
                      </div>
                  </div>
-->
                  <div class="col-100">
                      <h4 class="subTitulo" style=" margin: 20px 0px 0px 20px"><?=$rsAvaliacao[$cont]->getNome()?></h4>
                      <div class="contentent-col" style="margin: 5px 0px 0px 10px">
                          <?php 
                            for($i = 0; $i < ($rsAvaliacao[$cont]->getAvaliacao()); $i++){
                          ?>
                          <div class="icon-pequeno star bloco-float" style="margin: 0px 0px 0px 5px"></div>
                          
                          <?php
                            }
                          ?>
                      </div>
                      <h5 class="subTitulo quebra-col" style=" margin: 5px 0px 0px 20px"><?=$rsAvaliacao[$cont]->getComentario()?></h5>
                  </div>
              </article>
              <?php
			  	  }
              $cont++;
              }
              
              ?>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.305 24.567" class="icon-medio center animated pulse infinite" id="visu_aval"style="display: block;">
            <defs>
                <style>.a{fill:none;stroke:#000;stroke-width:2px; transition: 1s;} svg.icon-medio:hover .a{fill:none;stroke:#db5728;stroke-width:2px; transition: 1s;}</style>
            </defs>
            <path class="a" d="M1544.314,3317.282l22.446,22.445-22.446,22.446" transform="translate(3362.88 -1543.606) rotate(90)"/>
            </svg>
      </section>
    </header>
    <!--Fim header-->
    <!--Inicio Inscreva-se-->
    <section>
       <h5 class="subTitulo center txt-color3"  style="text-align: center;  margin-top: 20px; width: 500px;">Clique no botão abaixo para nos dar seu feedback e avaliação</h5>
    </section>
    <input type="button" id="btnModal" class="button" style="margin: 20px auto 40px auto" value="AVALIAR">
    <!--Fim Inscreva-se-->
    <?php require_once('footer.html'); ?> 
</body>
    
<script type="text/javascript" src="js/main.js"></script>
</html>
