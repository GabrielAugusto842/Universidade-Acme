<div class="formulario_modal">
    <form id="frmEmailAlunos" name="frmEmailAlunos">
        <div class="row">
            <div class="col-100">
                 <label for="txtAssunto">Assunto:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <input type="text" id="txtAssunto" name="txtAssunto" value="<?=$nome?>" placeholder="Digite o assunto do e-mail..." required>
            </div>
        </div>
       <div class="row">
            <div class="col-100">
                 <label for="txtAssunto">Mensagem:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <textarea id="txtCorpo" name="txtCorpo" placeholder="Digite o sua mensagem..." style="height: 150px"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                 <input type="submit" name="btnEnviar" id="btnSalvar" value="Enviar">
            </div>
        </div>
        
    </form>
</div>