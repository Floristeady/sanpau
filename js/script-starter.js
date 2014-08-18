/*
Any site-specific scripts you might have.
*/


if (window.jQuery) {  
	$('#home-slider .slides li').css('display','none');
    $('#home-slider .text-inner').css('opacity','0');
} 
	
jQuery(function ($) {

	/************************* 
	Variables
	**************************/


	var browserwidth;
	var desktopwidth = 1024; // resolución mínima desktop
	var mobilewidth = 767; // resolución máxima móviles 

	//Si no soporta archivos en formato SVG
	if (!Modernizr.svg) {
	  $("a.logo img").attr("src", "wp-content/themes/sanpau/images/default/logotipo_sanpau.png");
	  $('img[src$=".svg"]').hide();
	}

	/************************* 
	Ejecución
	**************************/
	
	$(window).load(function() {
		getbrowserwidth();	
	    cssfix();
	    boxcontact();
	   
	   if (browserwidth >= mobilewidth) {
	  	 menudesplegable();
	   }
	    
	   $('#home-slider').flexslider({
	    animation: "fade",
	    animationLoop: true,
	    controlNav: true,
	    directionNav: false,
	    start: function(slider){
		     $('#home-slider').animate({
			   opacity: 1 
		    });
		    
		    if (!('.flexslider ul.slides li:only-child')){
			     $('.flex-active-slide .text-inner').delay(500).animate({
				   margin: '200px 0 0',
				   opacity: 1 
			    }, 400);
		    } else {
			      $('.slides li .text-inner').delay(500).animate({
				   margin: '200px 0 0',
				   opacity: 1 
			    }, 400);
		    }
	    },
	    after: function(slider) {
		     $('.flex-active-slide .text-inner').delay(500).animate({
			   margin: '200px 0 0',
			   opacity: 1 
		    }, 400);
	    }
	  });
	  
	});  

	/************************* 
	Functiones
	**************************/
	
	// Obtiene anchura del browser (no se usa el método nativo de jquery porque da valor inexacto en algunos browsers)
	function getbrowserwidth(){
		browserwidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth || 0;
		//console.log(browserwidth);
		return browserwidth;
	}
	
	function menudesplegable(){
	    $("ul#menu-menu-principal").superfish({
	        delay:       100,                            // one second delay on mouseout 
	        animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
	        speed:       'fast',                          // faster animation speed 
	        autoArrows:  false,                           // disable generation of arrow mark-up 
	        dropShadows: true                            // disable drop shadows 
	        
	    }); 
    }
    
    function cssfix() {
    	$('.page-list-grey').parents('#main-inner').css( "background-color", "#414042" );
    	$('#home-bottom .right ul li:last-child').css({ 
    		background: 'none',
    		borderBottom: 'none'
    	});
    	
    	$('#home-bottom .right ul li:first-child').css( "border-top", "none" );
    	$('#list-icons li:last-child span').css( "border", "none" );
    	$('#list-simple li:last-child span').css( "border", "none" );
    }
    
    function boxcontact(){     
		$('.open-modal a').click(function(e) {
			$('#box-contact').foundation('reveal', 'open');
		});
		
		var $findError = $('#box-contact').find('.wpcf7-response-output');
		if ( $findError.hasClass('wpcf7-validation-errors')){
			$('#box-contact').foundation('reveal', 'open');
		} else if ( $findError.hasClass('wpcf7-mail-sent-ok')) {
			$('#box-contact').foundation('reveal', 'open');
			$('#box-contact').find('.entry-content .row').hide();
		}
	}

});

