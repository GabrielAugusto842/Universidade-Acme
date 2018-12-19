//Arquivo com funções em javaScript 

// variaveis de escopo
var ref = 0;
var estados = [];

//Function abrir a modal
function openModal(url, width, height) {
    //Setando o tamanho da modal  de acordo com os valores passados como parâmetros
        $('.modal').css("width",width);
        $('.modal').css("height",height);
        $('body').css("overflow","hidden");
        $('body').css("width","100%");
        $('body').css("height","100vh");

    $( ".container_modal" ).fadeIn( 1000 );
		$.ajax( {
			type: "POST",
			url: url,
			success: function ( dados ) {
				$( '.modal' ).html( dados );
			}
		} );

	}

//Abrir um modal com uma imagem
function openModalImg(src, alt) {

    //Setando o tamanho da modal  de acordo com os valores passados como parâmetros
    $('.modal').css("width",'auto');
    $('.modal').css("height",'auto');
    $('body').css("overflow","hidden");
    $('body').css("width","100%");
    $('body').css("height","100vh");
    $('body').css("position","fixed");

    $( ".container_modal" ).fadeIn( 1000 );

    var img = '<img class="img-full-modal" src = "'+ src +'" alt= "'+ alt +'">',
        btn ='<div class="btn-fechar-img-full-modal" onclick="closeModal();">&times;</div>';

    $( '.modal' ).html('<div>'+ btn + img +'</div>');


}


//Fechar modal
function closeModal(){
	$( ".container_modal" ).fadeOut( 1000 );
    $('body').css("overflow","inherit");
    $('body').css("position","inherit");
}


//Fechar modal e deleta fotos
function closeModalDltFoto(foto){

   var cont = 0 ;
   while(cont < foto.length){

        passarGet("../../function/functions.php?deletarArquivo&arquivo="+encodeURI(foto[cont]));
        cont++;
    }

    $( ".container_modal" ).fadeOut( 1000 );
    $('body').css("overflow","inherit");

}

//Tela asyncrona
function syncTela(url,container){

	$.ajax({
		type:"POST",
		url: url,
		success: function (dados){

			$(container).html(dados);
		}
	})

}

//Função para passar dados via GET
function passarGet(url){

    if (ref == 0){

        //Criação de container temporario para receber resposta da função
        var conteudo = document.querySelector('.main'),
            htmlTemporario = conteudo.innerHTML,
            htmlNovo = "<div id='#retornoGet' style='display: none'></div>";

        htmlTemporario = htmlNovo + htmlTemporario;

        conteudo.innerHTML = htmlTemporario;

        ref = 1;
    }

    //Efetua envio de dados via GET
    $.ajax({
        type:"POST",
        url: url,
        success: function(dados){
            $('#retornoGet').html(dados);
        }
    })

}

//Função responsavel por carregar e alimentar um select com a lista de cidades trazidos da API
function pegarCidade(id_estado){
    var request = new XMLHttpRequest();
    var cidades = [];
    request.open('GET', 'http://servicodados.ibge.gov.br/api/v1/localidades/estados/'+id_estado+'/municipios', true);
    request.onload = function(){
        var data = JSON.parse(this.response);
        data.forEach(cidade => {
            cidades.push(cidade.nome);
        });

        //Criação de container temporario para receber resposta da função
        var conteudo = document.querySelector('#slcCidade');

        var cont = 0 ;

        while(cont < cidades.length){

            var htmlTemporario = conteudo.innerHTML;
            var htmlNovo = "<option value='" + cidades[cont] + "'>" + cidades[cont] + "</option>";

            htmlTemporario = htmlNovo + htmlTemporario;

            conteudo.innerHTML = htmlTemporario;

            cont++;

        }
    }
    request.send();
}


//Função responsavel por carregar e alimentar um select com a lista de estados trazidos da API
function pegarEstado(id_estado){
    var estados = [];
    var request = new XMLHttpRequest();
    request.open('GET', 'https://servicodados.ibge.gov.br/api/v1/localidades/estados', true);
    request.onload = function(){
        var data = JSON.parse(this.response);
        data.forEach(estado => {
            estados.push(estado.id+":"+estado.sigla);
        });

         //Criação de container temporario para receber resposta da função
        var conteudo = document.querySelector('#slcEstado');

        var cont = 0 ;

        while(cont < estados.length){

            var htmlTemporario = conteudo.innerHTML;
            var htmlNovo = "<option class='optionEstado'" + (id_estado == estados[cont].substring(0,2) ? 'selected' : '') +" value='" + estados[cont].substring(0,2) + "'>" + estados[cont].substring(3) + "</option>";

            htmlTemporario = htmlNovo + htmlTemporario;

            conteudo.innerHTML = htmlTemporario;

            cont++;

        }
    }
    request.send();
}

//Função para submit de formulario
function enviarFormulario(formulario, url){
	//Submit do formulario Nossa Historia
	$("#" + formulario).submit(function(event) {
		 //Cancelar ação do submit
		  event.preventDefault();

			 //Inserir ou editar Evento
			$.ajax({
				url: url,
				type:"POST",
				data: new FormData($('#' + formulario)[0]),
				cache:false,
				contentType:false,
				processData:false,
				async:true,
				success:function(dados){
					alert(dados);
				}

		  });
	});
}

//Função para submit de formulario com retorno
function enviarFormularioV2(formulario, url){
	//Submit do formulario Nossa Historia
	$("#" + formulario).submit(function(event) {
		 //Cancelar ação do submit
		  event.preventDefault();

			 //Inserir ou editar Evento
			$.ajax({
				url: url,
				type:"POST",
				data: new FormData($('#' + formulario)[0]),
				cache:false,
				contentType:false,
				processData:false,
				async:true,
				success:function(dados){
					closeModal();
					syncTela("../telas/tabela_produto_loja.php",".content");
				}
		  });
	});
}


//Função respondavel por carregar a fot no formulario de forma assíncrona 
function pegarFoto(input, container, form){
	//Upload de foto
	$('#'+ input).live('change',function(){
		$('#' + container).html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

		$('#' + container).css('background-image','url("")');
		setTimeout(function(){
			$('#' + form).ajaxForm({
				target:'#' + container
			}).submit();
			// Adiciona url da foto
		},300);
	});
}

// Função para carregar a foto do banco  se o modo for editar e existir uma foto registrda
function loadOnEdit(container,foto,url,form){ 

        if(container.substr(-1) == "1"){
            form.txtFoto1.value = foto.replace(url,"");
        }if(container.substr(-1) == "2"){
            form.txtFoto2.value = foto.replace(url,"");
        }else{
            form.txtFoto.value = foto.replace(url,"");
        }

        document.getElementById(container).innerHTML = "<img src= '"+ foto +"'  height='100px' aling='center' alt='foto'>";
        $('#' + container).css('background-image','url("")');

}

//Função responsavel por fazer upload de arquivos para a pasta destinada e rotornar para o dormulario o caminho de onde o arquivo foi salvo
function pegarArquivo(input, container, form){
	//Upload de arquivo
	$('#'+ input).live('change',function(){
		$('#' + container).html('<img src="../img/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

		$('#' + container).css('background-image','url("")');
		setTimeout(function(){
			$('#' + form).ajaxForm({
				target:'#' + container
			}).submit();
			// Adiciona url da foto
		},300);
	});
}


//Função para excluir itens
 function excluir(id,url){
		
	var retorno = confirm("Deseja realmente excluir ?");
		
	if(retorno == true){
		$.ajax({
		   url: url + id,
		   type:"GET",
		   success:function(dados){
		   } 
		});
	}
}

//Função relacionada ao funcionamento do select personalizado
function selectElement(){
	
$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});
}