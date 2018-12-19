// Plugin em jquery desenvolvido por Alcateck. - WolfJquery Beta 0.2

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
						callback(elemento);
					}
				});
			});
		});
	};
	
})(jQuery);


(function($){
	//Descarrega arquivo dentro de elemento, com callback
	$.fn.loadFrom = function( conf ,callback = function(){}){
		
		var elemento = $(this);
		
		return this.each (function(){
			
			
			if(typeof(conf) == "string"){
				
				$.ajax({
					url: conf,
					type: "POST",
					success: function(resposta){
						$(elemento).html(resposta);
						callback(elemento);
					}
				});
				
			}else if(typeof(conf) == "object"){
				
				var opcoes = $.extend({ url: "", interval: 0, target: 0 },conf);
				
				//Target
				if(opcoes.target == 0){
					
					//Interval
					if(opcoes.interval == 0){
						$.ajax({
							url: opcoes.url,
							type: "POST",
							success: function(resposta){
								$(elemento).html(resposta);
								callback(elemento);
							}
						});

				   }else{ //Interval

					  opcoes.interval = opcoes.interval * 1000

					   setInterval(function(){
						   $.ajax({
								url: opcoes.url,
								type: "POST",
								success: function(resposta){
									$(elemento).html(resposta);
									callback(elemento);
									console.log("foi")
								}
							});
					   },opcoes.interval);	
					}
				}else{ //Target
					
					opcoes.target = "#" + opcoes.target;
					
					//Interval
					if(opcoes.interval == 0){
						$.ajax({
							url: opcoes.url,
							type: "POST",
							success: function(resposta){
								
								var $elemento = opcoes.target;
								
								$novoElemnto = $('<div>').attr("id", "div-temporaria-loadFrom"); //Elemento de manipulação temporario
								$('html').append($novoElemnto);
								$('#div-temporaria-loadFrom').html(resposta); //Descarregar resultado nele

								$(opcoes.target).removeAttr("id").attr("id","id-temporario-loadFrom"); //Renomeia id elemento target para evitar conflito
								
								//Filtra conteudo
								$('#div-temporaria-loadFrom').append("<script> $('#div-temporaria-loadFrom').html($('"+ opcoes.target +"').html()) </script>");
								
								$('#id-temporario-loadFrom').removeAttr("id").attr("id",opcoes.target.substring(1)).html($('#div-temporaria-loadFrom').html());

								$('#div-temporaria-loadFrom').remove(); //Remove Div de manipulação
								
								callback(elemento);
								
							}
						});

				   }else{ //Interval

					  opcoes.interval = opcoes.interval * 1000

					   setInterval(function(){
						   $.ajax({
								url: opcoes.url,
								type: "POST",
								success: function(resposta){
									
									var $elemento = opcoes.target;

									$novoElemnto = $('<div>').attr("id", "div-temporaria-loadFrom"); //Elemento de manipulação temporario
									$('html').append($novoElemnto);
									$('#div-temporaria-loadFrom').html(resposta); //Descarregar resultado nele

									$(opcoes.target).removeAttr("id").attr("id","id-temporario-loadFrom"); //Renomeia id elemento target para evitar conflito

									//Filtra conteudo
									$('#div-temporaria-loadFrom').append("<script> $('#div-temporaria-loadFrom').html($('"+ opcoes.target +"').html()) </script>");

									$('#id-temporario-loadFrom').removeAttr("id").attr("id",opcoes.target.substring(1)).html($('#div-temporaria-loadFrom').html());

									$('#div-temporaria-loadFrom').remove(); //Remove Div de manipulação

									callback(elemento);
									
								}
							});
					   },opcoes.interval);	
					}
				}
			}		
		});
	};
	
})(jQuery);