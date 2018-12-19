<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Conteudo</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<link rel="stylesheet" type="text/css" href="../css/header.css"> 
<link rel="stylesheet" type="text/css" href="../css/tables.css">
<link rel="icon" href="../img/icons/favicon.png">
<script src="../js/jquery.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<meta charset="utf-8">
<script>
	
	$(document).ready(function(){
		
		$(".custom-select").click(function(){

			var pagina = formSlc.slcPagina.value;

			if(pagina == "sobre"){
				syncTela("../telas/conteudo/paginas/sobre.php",".content");
			}else if(pagina == "vestibular"){
				syncTela("../telas/conteudo/paginas/vestibular.php",".content");
			}else if(pagina == "avaliacao"){
				syncTela("../telas/conteudo/paginas/avaliacao.php",".content");
			}else if(pagina == "trabalhec"){
				syncTela("../telas/conteudo/paginas/trabalhe_conosco.php",".content");
			}else if(pagina == "inicio"){
				syncTela("../telas/conteudo/paginas/inicio.php",".content");
			}
		});
	});
	
</script>
</head>
    
<body>
   <?php require_once('../header.php');?>
    <div class="main">
        <!--Inicio do conteúdo-->
        <div>
           <h1 class="titulo">Conteudo</h1>
			<div style="width: 300px; margin: 20px auto">
			   <div class="row">
					<div class="col-100">
						<label for="slcPagina" style="text-align: center; width: 100%; padding-left: 0px">Selecionar página:</label>
				   </div>
				</div>
				<form id="formSlc" name="formSlc">
					<div class="row">
						<div class="col-100">
							<select name="slcPagina" id="slcPagina" class="custom-select" placeholder="Paginas">
								<option value="avaliacao">Avaliação</option>
								<option value="inicio">Inicio</option>
								<option value="sobre">Sobre</option>
								<option value="trabalhec">Trabalhe Conosco</option>
								<option value="vestibular">Vestibular</option>
							</select> 
					   </div>
					</div> 
				</form>  
			</div>
			<div style=" width: 900px; height: auto; margin: 0px auto" class="content">
				<script>syncTela("../telas/conteudo/paginas/avaliacao.php",".content");</script>
			</div>
        </div>
        <!--FIM do conteúdo-->
    </div>
    <?php
        require_once("../footer.php");
    ?>
	<script>
		//Function com atribuiçõe do select costumizado // Esencial para funcionamento
		selectElement();
		
	</script>
</body>
</html>
