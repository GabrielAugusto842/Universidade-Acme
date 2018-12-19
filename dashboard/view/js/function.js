// JavaScript Document

function getDefaultNotf(){
	
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": true,
	  "progressBar": true,
	  "positionClass": "toast-bottom-right",
	  "preventDuplicates": true,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
}

//função responsavel por fazer o acordion funcionar
function startAccordion(){
	
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

//Função para abrir modal
function openModal(url, width, height) {
    //Setando o tamanho da modal  de acordo com os valores passados como parâmetros
	$('.modal').css("width",width);
	$('.modal').css("height",height);
	$('body').css("overflow","hidden");
	$('body').css("width","100%");
	$('body').css("height","100vh");

    $( ".container_modal" ).fadeIn( 1000 );
	$.ajax({
		type: "POST",
		url: url,
		success: function ( dados ) {
			$( '.modal' ).html( dados );
		}
	});
}

// Função para fechar modal
function closeModal(){
	$( ".container_modal" ).fadeOut( 1000 );
    $('body').css("overflow","inherit");
    $('body').css("position","inherit");
}

//Função para deixar tela asyncrona
function syncTela(url,container){

	$.ajax({
		type:"POST",
		url: url,
		success: function (dados){

			$(container).html(dados);
		}
	});
}

/*Pre-load foto*/

function preLoadIMG(preeloadGIF,trigger,target){
	
    $(trigger).change(function() {
		
		var classTraget = $(target).attr("class");
		 classTraget = classTraget.split(" ")
	     classTraget = classTraget[0];
		
		$(target).css("background", "url(" + preeloadGIF + ") center / cover no-repeat");
		
		try{
			var arquivo = $(this)[0].files[0];

			var reader = new FileReader();

			reader.onload = function(e) {
				setTimeout(function(){
					 $(target).css("background", "url(" + e.target.result + ") center / cover no-repeat");
				},200);

			}
			
			try{
				reader.readAsDataURL(arquivo);
			}catch(e){
				$(target).removeClass(classTraget).addClass(classTraget);
			}
		}catch(e){
			$(target).removeClass(classTraget).addClass(classTraget);
			console.log(e);
		}
     
	});
}

function getCidade(id){
			
			var listaCidades = "";

			$('#slcCidade').html('');

			$.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + id +"/municipios",function(e){
				for(var cont=0; cont < e.length; cont++){

					listaCidades += '<li><a data-value="' + e[cont].id + '">' + e[cont].nome + '</a></li>';

				}

				$('#slcCidade').html(listaCidades);

			});

			
		}