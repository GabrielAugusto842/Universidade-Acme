<script>
    $(document).ready(function(){
       
        //PegarArquivo
         pegarArquivo("flArquivo", "container-arquivo", "formTrabalheArquivo");

            //Submit do formulario
        $("#formTrabalhe").submit(function(event) {
            //Cancelar ação do submit
            event.preventDefault();

            //Inserir ou editar Trabalhe
            $.ajax({
                url:"cms/router.php?controller=trabConosco&modo=inserir",
                type:"POST",
                data: new FormData($('#formTrabalhe')[0]),
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
<h3 class="subTitulo txt-color4" style="text-align: center; margin: 20px 0px 0px 0px;">Trabalhe Conosco</h3>
<div id="fechar" onClick="closeModal();" style="position: relative; right: -950px; top: -50px; color: white; font-size: 40px; cursor: pointer">&times;</div>
<div class="row" style="position: relative; top:40%; transform: translate(-0%,-50%); width: 70%; margin: 0px auto">
    <form action="cms/controller/function/functions.php?uploadArquivoAjax&form=formTrabalhe&nomeArq=flArquivo&local=<?= urlencode('cms/view/arquivos/curriculos/')?>" method="post" id="formTrabalheArquivo" name="formTrabalheArquivo" enctype="multipart/form-data">
        <div class="row">
            <div class="col-100">
                 <label for="flArquivo" class="container-arquivo" id="container-arquivo"></label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="file" class="flArquivo" id="flArquivo" name="flArquivo">
            </div>
        </div>
    </form>
    <form name="formTrabalhe" id="formTrabalhe">
       <div class="row" style="padding: 20px;">
           <div class="col-100">
               <input type="text" name="txtNome" placeholder="Digite seu nome...">
               <input type="text" name="txtArquivo" hidden required>
           </div>
           <div class="col-100" style="margin: 10px 0px 0px 0px ;">
               <input type="email" name="txtEmail" placeholder="Digite seu e-mail...">
           </div>
           <div class="row">
               <div class="col-50">
                   <input type="text" name="txtDtNasc" required placeholder="__/__/____">

               </div>
               <div class="col-50">
                   <input type="text" name="txtTelefone" placeholder="Digite seu telefone...">
               </div>
           </div>
            <div class="col-100" style="margin: 10px 0px 0px 0px ;">
               <textarea name="txtDesc" placeholder="Por que quer trabalhar conosco ? "></textarea>
           </div>
            <div class="col-100-b-full" style="margin: 10px 0px 0px 0px ;">
               <input type="submit" name="btnSubmit" value="ENVIAR">
           </div>
       </div>
    </form>
</div>