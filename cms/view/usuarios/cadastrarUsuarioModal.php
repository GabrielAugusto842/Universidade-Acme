<!-- MODAL RESPONSÁVEL POR CADASTRAR/EDITAR OS USUARIOS -->
<?php

    //Variaveis de escopo de Classe
    @session_start();

	// Variaveis de escopo
	$idUsuario = "";
	$nome = "";
	$usuario = "";
	$email = "";
	$senha = "";
	$foto = "";
	$nivel = "";

    $btn = "Cadastrar"; //Altera o nome do botão Submit // Cadastro
    $urlModo = "../../router.php?controller=usuario&modo=inserir"; //URL de inserção

    if(isset($_GET['modo'])){

        if($_GET['modo'] == "buscar"){

            $idUsuario = $listUsuario->getIdUsuario();
            $nome = $listUsuario->getNome();
            $usuario = $listUsuario->getUsuario();
            $email = $listUsuario->getEmail();
            $senha = $listUsuario->getSenha();
            $foto = $_SESSION['requireUrl'].$listUsuario->getFoto();
            $nivel = $listUsuario->getIdNivel();


            //Alterando variaveis para edição
            $urlModo = "../../router.php?controller=usuario&modo=editar&id=".$idUsuario;
            //URL de edição
            $btn = "Editar";
      }
    }
?>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script>

    //Variaveis de escopo JS
    var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

    function loadOnEdit(foto){ // Função para carrehar a foto do banco  se o modo for editar
         //Instancia variavel Url no editar ela precisa ser chamada pois ao fechar a janela é passada na função fechar e excluir img
         var fotoUrl = []; //Variavel Array com caminho de fotos a excluir

        document.getElementById('container-foto-usuario').innerHTML = "<img src= '<?= $foto ?>'  height='95px' aling='center' alt='foto'>";
        $('#container-foto-usuario').css('background-image','url("")');
        formUsuario.txtFoto.value = '<?=  str_replace($_SESSION['requireUrl'],"",$foto)?>';
    }

    $(document).ready(function() {

        <?= isset($_GET['modo']) ? "loadOnEdit()" : ""?>

        //Submit do formulario
        $("#formUsuario").submit(function(event) {
            //Cancelar ação do submit
            event.preventDefault();

            var cont = 0 ;
            while(cont < fotoUrl.length){

                passarGet("../../controller/function/functions.php?deletarArquivo&arquivo="+encodeURI(fotoUrl[cont]));
                cont++;
            }

            //Inserir ou editar Nivel
            $.ajax({
                url:"<?=$urlModo?>",
                type:"POST",
                data: new FormData($('#formUsuario')[0]),
                cache:false,
                contentType:false,
                processData:false,
                async:true,
                success:function(dados){
                    closeModal();
                    syncTela("../telas/tabela_usuario.php",".content");
                }

            });
        });

        //Upload de foto
		$('#flFoto').live('change',function(){
			$('#container-foto-usuario').html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

			$('#container-foto-usuario').css('background-image','url("")');
			 setTimeout(function(){
				$('#formUsuarioFoto').ajaxForm({
					target:'#container-foto-usuario'
				}).submit();
                // Adiciona url da foto
                fotoUrl.push(formUsuario.txtFoto.value);

			},300);
		});

        });

</script>

 <div class="header_modal">
     <div class="titulo_modal">
         <h1 class="titulo" style="margin: 0px">Cadastrar Usuario</h1>
     </div>
     <div class="botao_fechar" onclick="closeModal();">&times;</div>
 </div>
<div class="formulario_modal">
    <form action="../../controller/function/functions.php?uploadFotoAjax&form=formUsuario&nomeFt=flFoto&local=<?= urlencode('cms/view/img/usuarios/')?>" method="post" id="formUsuarioFoto" name="formUsuarioFoto" enctype="multipart/form-data">
        <div class="row">
            <div class="col-100">
                 <label for="flFoto" class="container-foto-usuario" id="container-foto-usuario"></label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="file" id="flFoto" name="flFoto">
            </div>
        </div>
    </form>
    <form id="formUsuario" name="formUsuario">
	 <div class="row">
            <div class="col-100">
                 <label for="txtNivel">Nivel:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <select id="txtNivel" name="txtNivel" class="custom-select" placeholder="Selecione um nivel">
                <?php

                    session_start();
                    require_once($_SESSION['require'].'cms/controller/controllerNivel.php');
                    $listNivel =  new controllerNivel();
                    $rsNivel = $listNivel::listarNivel();

                    $cont = 0;
                    while($cont < count($rsNivel)){

                        //selecionar o combobox na hora de editar
                        $nivel == $rsNivel[$cont]->getIdNivel() ? $selecionar = "selected" : $selecionar = "";
                        
                ?>

                     <option <?=$selecionar?> value="<?=$rsNivel[$cont]->getIdNivel();?>"><?=$rsNivel[$cont]->getNome();?></option>

               <?php
                        $cont++;
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                 <label for="txtNome">Nome:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtNome" name="txtNome" value="<?=$nome?>" placeholder="Digite seu nome..." required>
                <input name="txtFoto" type="text" hidden="" required>
            </div>
        </div>

        <div class="row">
            <div class="col-50">
                 <label for="txtUsuario">Usuario:</label>
            </div>
            <div class="col-50">
                 <label for="txtEmail">E-mail:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <input type="text" id="txtUsuario" name="txtUsuario" value="<?=$usuario?>" placeholder="Digite seu nome de usuario..." required>
            </div>
            <div class="col-50">
                <input type="email" id="txtEmail" name="txtEmail" value="<?=$email?>" placeholder="Didite seu e-mail..." required>
            </div>
        </div>

        <div class="row">
            <div class="col-50">
                 <label for="txtSenha">Senha:</label>
            </div>
            <div class="col-50">
                 <label for="txtReSenha">Repetir senha:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <input type="password" id="txtSenha" name="txtSenha" placeholder="Digite sua senha..." required>
            </div>
            <div class="col-50">
                <input type="password" id="txtReSenha" name="txtReSenha" placeholder="Repita sua senha..." required>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-100">
                <input type="reset" name="btbLimapra" value="Limpar" style="margin-left: 10px;">
                <input type="submit" name="btnSalvar" id="btnSalvar" value="<?= $btn ?>">
            </div>
        </div>
    </form>
</div>

<script>
	//Function com atribuiçõe do select costumizado // Esencial para funcionamento
	selectElement();
</script>
