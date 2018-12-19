<?php
 require_once("sessao.php");

   require_once($_SESSION['require']."cms/controller/conteudo/controllerTrabalheConosco.php");
    $controllerTrabalhe = new controllerTrabalheConosco();

//INICIO
	$list = $controllerTrabalhe->buscarTrabalheConosco(7);
	$conteudoIni = explode(";",$list->getConteudo());
	$background = $_SESSION['requireUrl'].$list->getFoto();

//QUADRO 1
	$quadro1 = $controllerTrabalhe->buscarTrabalheConosco(8);
	$conteudoQuadro1 = explode(";",$quadro1->getConteudo());

	$fotoQuadro1 = $_SESSION['requireUrl'].$quadro1->getFoto();
		
//QUADRO 2
	$quadro2 = $controllerTrabalhe->buscarTrabalheConosco(9);
	$conteudoQuadro2 = explode(";",$quadro2->getConteudo());

	$fotoQuadro2 = $_SESSION['requireUrl'].$quadro2->getFoto();

//QUADRO 3
	$quadro3 = $controllerTrabalhe->buscarTrabalheConosco(10);
	$conteudoQuadro3 = explode(";",$quadro3->getConteudo());

	$fotoQuadro3 = $_SESSION['requireUrl'].$quadro3->getFoto();

//QUADRO 4
	$quadro4 = $controllerTrabalhe->buscarTrabalheConosco(11);
	$conteudoQuadro4 = explode(";",$quadro4->getConteudo());

	$fotoQuadro4 = $_SESSION['requireUrl'].$quadro4->getFoto();

//QUADRO 5
	$quadro5 = $controllerTrabalhe->buscarTrabalheConosco(12);
	$conteudoQuadro5 = explode(";",$quadro5->getConteudo());

	$fotoQuadro5 = $_SESSION['requireUrl'].$quadro5->getFoto();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trabalhe Conosco</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script src="js/function.js" type="text/javascript"></script>
<script>
    
 $(document).ready(function(){

    $("#btnModal").click(function(){
        openModal('telas/modal_trabalhe.php', 1000, 700);
    })
     
     /*isset($_GET['modo']) ? "loadOnEdit()" : ""*/
     
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
    
<body id="bg_tbl_conosco" class="bg-fullsc" style="background-image: url(<?=$background?>)">
    
    
    <!--Modal-->
  <div class="container_modal">
       <div class="modal trabalhe"></div>
   </div>
     <?php
        require_once("header.php");
    ?>
    <section class="container">
         <div style="position: fixed; width: 700px;">
            <h2 class="subTitulo txt-color4" style="margin: -60px 0px 0px 0px; text-align: center"><?=$conteudoIni[0]?></h2>
            <h4 class="subTitulo txt-color3" style="margin: 20px 0px 0px 0px; text-align: center"><?=$conteudoIni[1]?></h4>
             <input type="button" id="btnModal" class="button center" value="Enviar curriculo" style="margin-top: 20px;">
        </div>
        <div class="blocos" style="position: relative; left: 800px; width: 300px;">
            <div>
                <img src="<?=$fotoQuadro1?>" title="Trabalhe Conosco" alt="Trabalhe Conosco" class="img_quadro">
                <h4 class="subTitulo txt-color4" style="text-align: center;"><?=$conteudoQuadro1[0]?></h4>
                <h5 class="subTitulo txt-color1"><?=$conteudoQuadro1[1]?></h5>
            </div>
            <div>
                <img src="<?=$fotoQuadro2?>" title="Trabalhe Conosco" alt="Trabalhe Conosco" class="img_quadro">
                <h4 class="subTitulo txt-color4" style="text-align: center;"><?=$conteudoQuadro2[0]?></h4>
                <h5 class="subTitulo txt-color1"><?=$conteudoQuadro2[1]?></h5>
            </div>
			<div>
                <img src="<?=$fotoQuadro3?>" title="Trabalhe Conosco" alt="Trabalhe Conosco" class="img_quadro">
                <h4 class="subTitulo txt-color4" style="text-align: center;"><?=$conteudoQuadro3[0]?></h4>
                <h5 class="subTitulo txt-color1"><?=$conteudoQuadro3[1]?></h5>
            </div>
         	<div>
                <img src="<?=$fotoQuadro4?>" title="Trabalhe Conosco" alt="Trabalhe Conosco" class="img_quadro">
                <h4 class="subTitulo txt-color4" style="text-align: center;"><?=$conteudoQuadro4[0]?></h4>
                <h5 class="subTitulo txt-color1"><?=$conteudoQuadro4[1]?></h5>
            </div>
			<div>
                <img src="<?=$fotoQuadro5?>" title="Trabalhe Conosco" alt="Trabalhe Conosco" class="img_quadro">
                <h4 class="subTitulo txt-color4" style="text-align: center;"><?=$conteudoQuadro5[0]?></h4>
                <h5 class="subTitulo txt-color1"><?=$conteudoQuadro5[1]?></h5>
            </div>
         
        </div>
    </section>
    <?php require_once('footer.html'); ?>
</body>
    
<script type="text/javascript" src="js/main.js"></script>
</html>
