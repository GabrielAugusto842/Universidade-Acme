// JavaScript Document

//Abrir Modal
//Function abrir a modal
function openModal(url, width, height) {
    //Setando o tamanho da modal  de acordo com os valores passados como parâmetros
        $('.modal').css("width",width);
        $('.modal').css("height",height);
        $('body').css("overflow","hidden");
        $('body').css("width","100%");
        $('body').css("position","fixed");
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
 //Fechar modal
function closeModal(){
    $( ".container_modal" ).fadeOut( 1000 );
    $('body').css("overflow","inherit");
    
    setTimeout(function(){
        $('body').css("position","inherit");
    },1010);
    $('body').css("height","auto");
} 

//PegarArquivo

function pegarArquivo(input, container, form){
	//Upload de arquivo
	$('#'+ input).live('change',function(){
		$('#' + container).html('<img src="img/elementos/gif/load.gif" alt="Carregando" id="img-up" height="100px" width="100px" style="overflow: hidden;"> ');

		$('#' + container).css('background-image','url("")');
		setTimeout(function(){
			$('#' + form).ajaxForm({
				target:'#' + container
			}).submit();
			// Adiciona url da foto 
		},300);
	});
}
