<script>

    
    //TODO: PASSAR CONTROLLER E ID PARA COISAR AS COISA TUDO
    function excluir(id, controller){

        var retorno = confirm('Deseja realmente excluir ?');

        if(retorno == true){

            $.ajax({
            url: "../../router.php?controller="+controller+"&modo=excluir&id="+id,
            type:"GET",
            success:function(dados){
                syncTela("../telas/tabelas_curso.php",".content");
            }
        });

        }
    }

    function buscar(id, controller){
        $.ajax({
           url:"../../router.php?controller="+controller+"&modo=buscar&id="+id,
           type:"GET",
		   success:function(){
			   openModal("../../router.php?controller="+controller+"&modo=buscar&id="+id,600,'auto');
            }
        });
    }
</script>


<h1 class="titulo">Curso</h1>

	<!-- Formação -->
	<div class="container_accordion" style="width: 800px;">
		<button class="accordion">Formação</button>
		<div class="panel"><!-- Abrir modal  passando como paramêtro a URL, width, height -->
			<button type="button" onclick="openModal('cadastrarFormacaoModal.php', 600, 'auto');" style=" margin-top: 20px;">Adicionar</button>
			<div class="container_table" style="width:100%; margin-top: 20px;">
				<table>
					<tr>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Funçoes</th>
					</tr>


				<?php
					  @session_start();
					  require_once($_SESSION['require'].'cms/controller/controllerFormacao.php');

						$listFormacao =  new controllerFormacao();

						$rsFormacao = $listFormacao->listarFormacao();

						$cont = 0;

						while($cont < count($rsFormacao)){

				?>
				<!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
				<tr>
					<td><?=$rsFormacao[$cont]->getNome();?></td>
					<td><?=$rsFormacao[$cont]->getDesc();?></td>
					<td>
						<button type="button" onclick="buscar(<?=$rsFormacao[$cont]->getIdFormacao();?>,'formacao')">Editar</button>
						<button type="button" onclick=" excluir(<?=$rsFormacao[$cont]->getIdFormacao();?>, 'formacao')">Excluir</button>
					</td>

				</tr>
				<?php
					$cont++;
                             
					}
				?>
					</table>
			</div>

		</div>
	</div>
<!-------------------------------------------------  FORMAÇÃO   --------------------------------------------------------------------->

	<!-- Categoria -->
	<div class="container_accordion" style="width: 800px;">
		<button class="accordion">Categoria</button>
		<div class="panel">
			<button type="button" onclick="openModal('cadastrarCategoriaModal.php', 600, 'auto');" style=" margin-top: 20px;">Adicionar</button>
			<div class="container_table" style="width:100%; margin-top: 20px;">
			<!-- Abrir modal  passando como paramêtro a URL, width, height -->
				<table>
					<tr>
						<th>Nome</th>
						<th>Operação</th>
					</tr>


				<?php
					//TODO: fazer listara as categorias, da erro e não faço ideia oq é
					  @session_start();
					  require_once($_SESSION['require'].'cms/controller/controllerCatCurso.php');

						$listCat = new controllerCatCurso();

						$rsCatCurso = $listCat->listarCatCurso();

						$cont = 0;

						while($cont < count($rsCatCurso)){

				?>
				<!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
				<tr>
					<td><?=$rsCatCurso[$cont]->getNome();?></td>
					<td>
						<button type="button" onclick="buscar(<?=$rsCatCurso[$cont]->getIdCategoriaCurso();?>, 'catcurso')">Editar</button>
						<button type="button" onclick=" excluir(<?=$rsCatCurso[$cont]->getIdCategoriaCurso();?>, 'catcurso')">Excluir</button>
					</td>

				</tr>
				<?php
					$cont++;

					}
				?>
					</table>
			</div>

		</div>
	</div>

	<!-- Curso  -->
	<div class="container_accordion" style="width: 800px;">
		<button class="accordion">Cursos</button>
		<div class="panel">
			<button type="button" onclick="openModal('cadastrarCursoModal.php', 800, 'auto');" style=" margin-top: 20px;">Adicionar</button>
			<div class="container_table" style="width:100%; margin-top: 20px;">
			<!-- Abrir modal  passando como paramêtro a URL, width, height -->
				<table>
					<tr>
						<th>Nome</th>
						<th>Objetivo</th>
						<th>Funçoes</th>
					</tr>


				<?php
					  @session_start();
					  require_once($_SESSION['require'].'cms/controller/controllerCurso.php');

						$listCurso =  new controllerCurso();

						$rsCurso = $listCurso->listarCurso();

						$cont = 0;

						while($cont < count($rsCurso)){

				?>
				<!-- É preciso setar os valores de width em porcentagem pois as tabelas variam de tamanho -->
				<tr>
					<td><?=$rsCurso[$cont]->getNome();?></td>
					<td><?=$rsCurso[$cont]->getObjetivo();?></td>
					<td>
						<button type="button" onclick="buscar(<?=$rsCurso[$cont]->getIdCurso();?>, 'curso')">Editar</button>
						<button type="button" onclick=" excluir(<?=$rsCurso[$cont]->getIdCurso();?>, 'curso')">Excluir</button>
					</td>

				</tr>
				<?php
					$cont++;

					}
				?>
					</table>
			</div>

		</div>
	</div>

<script>
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight){
		  panel.style.maxHeight = null;
		} else {
		  panel.style.maxHeight = panel.scrollHeight + "px";
		} 
	  });
	}
</script>


