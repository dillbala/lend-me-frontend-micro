$(document).ready(function(){
    $(".button a").click(function(){
        $(".overlay").fadeToggle(0);
       $(this).toggleClass('btn-open').toggleClass('btn-close');
	       $('.btn-open').click(function(){
	    	$('.click-overlay').addClass('body-overlay');
	    	$('body').addClass('noscroll');
	    	});
	       $('.btn-close').click(function(){
	    	$('.click-overlay').removeClass('body-overlay');
	    	$('body').removeClass('noscroll');
	    	});
    });
    $('.btn-open').click(function(){
    	$('.click-overlay').addClass('body-overlay');
    	$('body').addClass('noscroll');
    });
});
$('.overlay').on('click', function(){
    $(".overlay").fadeToggle(0);   
    $(".button a").toggleClass('btn-open').toggleClass('btn-close');
    open = false;
});

/*calculator*/
    $(document).ready(function(){
        $('.calculator img').click(function(){
            $('.home-calculator').addClass('calculator-open');
        });
        $('#close').click(function(){
           $('.home-calculator').removeClass('calculator-open');
        });
        $('.container').click(function(){
           $('.home-calculator').removeClass('calculator-open');
        });
    });
/*calculator*/
/* multitab */
$(document).ready(function(){
	$('.nav-tabs a').click(function(){
		$(this).tab('show');
	});
});
/*multitabe*/

$(document).ready(function(){
	  var offset = $('.header').offset();
		$(window).scroll(function(){
		  		 $('.header').addClass('fixed');
		  if($(document).scrollTop() < 50){
		         $('.header').removeClass('fixed');
		  }
		});
	});
$(document).ready(function(){
    $('#myCarousel').carousel({
      interval:84000000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click','.nav a',function(){
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel',function(e){
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});


/* how it works*/
 $(document).ready(function(){
            $('.slider-amount').jRange({
                from: 100,
                to: 5000,
                step: 100,
                scale: [100,'','','','','','','','',1000,'','','','','','','','','',2000,'','','','','','','','','',3000,'','','','','','','','','',4000,'','','','','','','','','',5000],
                showScale: true,
                format: '%s',
                width: 450,
                showLables:true
            });

            $('.slider-days').jRange({
                from: 7,
                to: 30,
                step: 1,
                scale: [7,'','','','','','',14,'','','','','','',21,'','','','','','','','',30],
                showScale: true,
                format: '%s',
                width: 450,
                showLables:true
            });

            var amount = parseInt($("#slider-amount").val(), 10);
            var days = parseInt($("#slider-days").val(), 10);
            var day = 0;
            var total_amount = 0;

            $('#slider-amount').on('change',function(){
                amount = parseInt($( "#slider-amount" ).val(), 10);
                statement();
            });
            $('#slider-days').on('change',function(){
                days = parseInt($( "#slider-days" ).val(), 10);
                statement();
            });

          var statement = function(){
            if(days==7){
              day = 1;
              total();
              $("#amount").text(amount);
              $("#interest").text((amount * days * 0.002).toFixed(2));
            }
            else if(days>=8 && days<=14){
              day = 2;
              total();
              $("#amount").text(amount);
              $("#interest").text(((amount * 7  * 0.002) + (amount * (days-7) * 0.004)).toFixed(2));
              
            }
            else if(days>=15 && days<=21){
              day = 3;
              total();
              $("#amount").text(amount);
              $("#interest").text(((amount * 7 * 0.002) + (amount * 7 * 0.004) + (amount * (days-14) * 0.006)).toFixed(2));
              
            }
            else if(days>=22 && days<=30){
              day = 4;
              total();
              $("#amount").text(amount);
              $("#interest").text(((amount * 7 * 0.002) + (amount * 7 * 0.004) + (amount * 7 * 0.006) + (amount * (days-21) * 0.008 )).toFixed(2));
             
            }
            else{
              total();
            }
          }

          var total = function(){
              switch(day){
                case 1:
                    total_amount = amount * days * 0.002 + amount;
                    $("#total_amount").text(total_amount);
                    break;
                case 2:
                    total_amount = (amount * 7  * 0.002) + (amount * (days-7) * 0.004) + amount;
                    $("#total_amount").text(total_amount);
                    break;
                case 3:
                    total_amount = (amount * 7 * 0.002) + (amount * 7 * 0.004) + (amount * (days-14) * 0.006)+amount;
                    $("#total_amount").text(total_amount);
                    break;
                case 4:
                    total_amount = (amount * 7 * 0.002) + (amount * 7 * 0.004) + (amount * 7 * 0.006) + (amount * (days-21) * 0.008 )+ amount;
                    $("#total_amount").text(total_amount);
                    break;
              }
            }

            statement();
});
/* how it works*/

/* home-calculator*/

/*home-calculator*/

/* frequently asked questions */
$(document).ready(function(){

$('.nav-tabs-dropdown').each(function(i, elm) {
    
    $(elm).text($(elm).next('ul').find('li.active a').text());
    
});
  
$('.nav-tabs-dropdown').on('click', function(e) {

    e.preventDefault();
    
    $(e.target).toggleClass('open').next('ul').slideToggle();
    
});

$('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {

    e.preventDefault();
    
    $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());
      
});
// $("#faq-page .nav-tabs li.active").css("border-right","0px !important;");
});
/* frequently asked questions */