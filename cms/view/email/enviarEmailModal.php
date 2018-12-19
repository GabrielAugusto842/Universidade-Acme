<script>
	
	$(document).ready(function(){
		$("#slcPagina").change(function(){

			var pagina = formSlc.slcPagina.value;

			if(pagina == "aluno"){
				syncTela("../telas/email/aluno.php",".contentEmail");
			}else if(pagina == "curso"){
				syncTela("../telas/email/curso.php",".contentEmail");
			}else if(pagina == "turma"){
				syncTela("../telas/email/turma.php",".contentEmail");
			}else if(pagina == "outro"){
				syncTela("../telas/email/outro.php",".contentEmail");
			}
		});
	});
	
</script>
 <div class="header_modal">
     <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Enviar e-mail</h1>
     </div>
     <div class="botao_fechar" onclick="closeModal();">&times;</div>
 </div>
<div>
    <div style="width: 300px; margin: 0px auto">
       <div class="row">
            <div class="col-100">
                <label for="slcPagina" style="text-align: center; width: 100%; padding-left: 0px">Selecionar publico:</label>
           </div>
        </div>
        <form id="formSlc" name="formSlc">
            <div class="row">
                <div class="col-100">
                    <select name="slcPagina" id="slcPagina">
                        <option value="aluno">Alunos</option>
                        <option value="curso">Curso</option>
                        <option value="turma">Turma</option>
                        <option value="outro">Outro</option>
                    </select> 
               </div>
            </div> 
        </form>  
    </div>
    <div style="height: auto; margin: 0px auto" class="contentEmail">
        <script>syncTela("../telas/email/aluno.php",".contentEmail");</script>
    </div>
</div>