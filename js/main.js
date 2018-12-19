/*Menu*/

$(document).ready(function(){
    $('#menu_icon').click(function(){
        $('#main_menu').css("left","0px");
        function showMenu(){
            $("#main_menu").css("-webkit-clip-path","polygon(0 0,100% 0,100% 100%,0% 100%)");
            $("#menu_icon").animate({right:'-100'},300);
        }
        setTimeout(showMenu,100);
    })

    $('#close').click(function(){
        $("#main_menu").css("-webkit-clip-path","polygon(0 0,0% 0,100% 100%,0% 100%)");
        function hideMenu(){
             $("#main_menu").css("left","-300px");
             $("#menu_icon").animate({right:'50'},300);
        }

        setTimeout(hideMenu,300);

        function originalLayout(){
        $("#MainMenu").css("-webkit-clip-path","polygon(0 0, 100% 0, 0% 100%, 0% 100%)");
        }
        setTimeout(originalLayout,600);

    });
})



/*Slide*/

var slides =$('.slide');

var flag =0;

slides.first().before(slides.last());

setInterval(show,4000);

function show (){
    slides = $('.slide');
    var activeSlide = $('.active');
    slides.last().after(slides.first());

    activeSlide.removeClass('active').next('.slide').addClass('active');

    if(flag==0){
        $('.box').css({'-webkit-clip-path':"polygon(0% 100%,100% 100%,100% 90%,85% 95%, 10% 78%, 7% 11%, 90% 5%,85% 95%,100% 95%,100% 0%,0% 0%,0% 100%)"})
        flag = 1;
    }else{
        $('.box').css({'-webkit-clip-path':"polygon(0% 100%,100% 100%,100% 80%,93% 85%,8% 95%,15% 6%,89% 22%,93% 85%,100% 80%,100% 0%,0% 0%,0% 100%)"});
        flag = 0;
    }
}

/*Slide Home*/

$(document).ready(function(){
    $("#c2").click(function(){
        $("#menu ul li:nth-child(1)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(3)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(4)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(2)").css('box-shadow','0 0 0 3px rgba(0,0,0,1), 0 0 0 5px rgba(255,84,0,1.00)'); 
        
        setTimeout(function(){
            showSlide(2);
        },700);
        
        slideMove();
    }); 
    
    $("#c3").click(function(){
        $("#menu ul li:nth-child(1)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(2)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(4)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(3)").css('box-shadow','0 0 0 3px rgba(0,0,0,1), 0 0 0 5px rgba(255,84,0,1.00)'); 
        
        setTimeout(function(){
            showSlide(3);
        },700);
        
        slideMove();
    });
    
    $("#c4").click(function(){
        $("#menu ul li:nth-child(1)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(2)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(3)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(4)").css('box-shadow','0 0 0 3px rgba(0,0,0,1), 0 0 0 5px rgba(255,84,0,1.00)'); 
        
        setTimeout(function(){
            showSlide(4);
        },700);
        
        slideMove();
    });
    
    $("#c1").click(function(){
        $("#menu ul li:nth-child(2)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(3)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(4)").css('box-shadow','none'); 
        $("#menu ul li:nth-child(1)").css('box-shadow','0 0 0 3px rgba(0,0,0,1), 0 0 0 5px rgba(255,84,0,1.00)'); 
        
        setTimeout(function(){
            showSlide(1);
        },700);
        
        slideMove();
    });
    
    
    function showSlide($n)
    {
        $("#sld img").attr('src','img/conteudo/home/bg '+$n+'.jpg');
    }
    
    function slideMove()
    {
        $("#blackLayer").animate({left:'-150%'},1300,'swing',function(){
            $("#blackLayer").css('left','100%'); 
        });
        
        $("#redLayer").animate({left:'-170%'},1400,'swing',function(){
            $("#redLayer").css('left','100%'); 
        });
    }
});
    