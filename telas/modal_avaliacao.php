<script>
// Função de pintar as estrelas para avaliação
$(document).ready(function() {
  $('.star-icon').each(function() {
	$(this).hover(function() {
	  $(this).prevAll().addBack().css("color", "#FFDF00");
	}, function() {
	  if (!$(this).parent().attr("data-rating")) {
		$(this).prevAll().addBack().css("color", "grey");
	  } else {
		$(this).siblings().addBack().each(function(index) {
		  index + 1 <= $(this).parent().attr("data-rating") ? 
			$(this).css("color", "#FFDF00") : $(this).css("color", "grey");
		});
	  }
	}).click(function () {
	  $(this).parent().attr("data-rating", $(this).prevAll().length + 1);
	});
  });
});
	
	
	
	$(document).ready(function(){
            //Submit do formulario
        $("#form").submit(function(event) {
            //Cancelar ação do submit
            event.preventDefault();

            //Inserir ou editar Trabalhe
            $.ajax({
                url:"cms/router.php?controller=avaliacao&modo=inserir",
                type:"POST",
                data: new FormData($('#form')[0]),
                cache:false,
                contentType:false,
                processData:false,
                async:true,
                success:function(dados){
                    closeModal();
                }

            });
        });
        
    });


</script>

<h3 class="subTitulo txt-color1" style="text-align: center; margin: 20px 0px 0px 0px; -webkit-text-stroke-width: .5px; -webkit-text-stroke-color: rgba(242,133,68,0.70);">Página de Avaliação</h3>
<div id="fechar" onClick="closeModal();" style="position: relative; right: -950px; top: -50px; color: white; font-size: 40px; cursor: pointer">&times;</div>
<div class="row" style="position: relative; top:50%; transform: translate(-0%,-50%);">
<form id="form">
   <div class="col-60">
	   
       <div class="row" style="padding: 20px;">
           <div class="col-100">
               <input type="text" name="txtNome" placeholder="Digite seu nome...">
           </div>
           <div class="col-100" style="margin: 10px 0px 0px 0px ;">
               <input type="email" name="txtEmail" placeholder="Digite seu e-mail...">
           </div>
            <div class="col-100" style="margin: 10px 0px 0px 0px ;">
               <textarea placeholder="Conte a todos oque acha de nós... " name="txtComentario"></textarea>
           </div>
            <div class="col-100-b-full" style="margin: 10px 0px 0px 0px ;">
               <input type="submit" name="btnSubmit" value="ENVIAR">
           </div>
       </div>
   </div>
   <div class="col-40">
       <div style="position: relative; top:50%; transform: translate(-0%,-50%);">
           <div class="bloco" style="width: 85%; background-color: rgba(242,133,68,0.30) "> 
			   
			   <span style="font-size:20px;">Sua avaliação</span>
			<div class="rating-container" data-rating="0">
			
				  <label for="estrela1" class="material-icons star-icon">&#9733;</label>
				  <input type="radio" name="star" value="1" id="estrela1">

				  <label for="estrela2" class="material-icons star-icon">&#9733;</label>
				  <input type="radio" name="star" value="2" id="estrela2">

				  <label for="estrela3" class="material-icons star-icon">&#9733;</label>
				  <input type="radio" name="star" value="3" id="estrela3">

				  <label for="estrela4" class="material-icons star-icon">&#9733;</label>
				  <input type="radio" name="star" value="4" id="estrela4">

				  <label for="estrela5" class="material-icons star-icon">&#9733;</label>
				  <input type="radio" name="star" value="5" id="estrela5">

			
			</div>
		   
		   </div>
       </div>
   </div>
	</form>
</div>
