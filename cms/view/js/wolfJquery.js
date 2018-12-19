// Plugin em jquery desenvolvido por Alcateck. - WolfJquery v1

//Encapsulamento para evitar conflito com outras funções já existentente em Jquery 
(function($){
	//Envio de formulario de forma assíncrona, com callback
	$.fn.formSubmit = function(url = "" ,callback = function(){}){
		
		return this.each (function(){
			//Necessario para não se perder a referência do objeto
			var elemento = $(this);
			
			$(this).submit(function(e){
				e.preventDefault();
				
				$.ajax({
					url: url,
					type: "POST",
					data: new FormData($(elemento)[0]),
					cache: false,
					contentType:false,
					processData:false,
					async:true,
					success: function(resposta){
						callback();
					}
				});
			});
		});
	};
	
})(jQuery);


(function($){
	//Descarrega arquivo dentro de elemento, com callback
	$.fn.loadFrom = function(url = "" ,callback = function(){}){
		
		var elemento = $(this);
		
		return this.each (function(){
			
			$.ajax({
				url: url,
				type: "POST",
				success: function(resposta){
					$(elemento).html(resposta);
					callback();
				}
			});
		});
	};
	
})(jQuery);