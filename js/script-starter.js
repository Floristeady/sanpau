/*
	Any site-specific scripts you might have.
*/

jQuery(window).load(function() {
	  jQuery('#home-slider').flexslider({
	    animation: "fade",
	    animationLoop: true,
	    controlNav: true,
	    directionNav: false,
	    start: function(slider){
		    jQuery('#home-slider').animate({
			   opacity: 1 
		    });
		    
		    if (!('.flexslider ul.slides li:only-child')){
			    jQuery('.flex-active-slide .text-inner').delay(500).animate({
				   margin: '200px 0 0',
				   opacity: 1 
			    }, 400);
		    } else {
			     jQuery('.slides li .text-inner').delay(500).animate({
				   margin: '200px 0 0',
				   opacity: 1 
			    }, 400);
		    }
	    },
	    after: function(slider) {
		    jQuery('.flex-active-slide .text-inner').delay(500).animate({
			   margin: '200px 0 0',
			   opacity: 1 
		    }, 400);
	    }
	  });
	  
});

/* Iniciando Superfish para menu desplegable */
jQuery(document).ready(function(){ 
    /*jQuery("ul#menu-menu-principal").superfish({
        delay:       100,                            // one second delay on mouseout 
        animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
        speed:       'fast',                          // faster animation speed 
        autoArrows:  false,                           // disable generation of arrow mark-up 
        dropShadows: true                            // disable drop shadows 
        
    });*/ 
    
    jQuery('.page-list-grey').parents('#main-inner').css( "background-color", "#414042" );
    
    //ajax contact
   /*var hash = window.location.hash.substr(1);
	var href = $('#home-contact a').each(function(){
		var href = $(this).attr('href');
		if(hash==href.substr(0,href.length-5)){
			var toLoad = hash+'#content article';
			$('#box-contact').load(toLoad);
		}											
	});*/

    jQuery('.open-modal a').click(function(){
     
	    var toLoad = $(this).attr('href')+'#content article';
	    jQuery('#box-contact').hide('fast',loadContent);
	    jQuery('#load').remove();
	    jQuery('#box-contact').append('<span id="load">LOADING...</span>');
	    jQuery('#load').fadeIn('normal');
	    //window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
	    function loadContent() {
	        jQuery('#box-contact').load(toLoad,'',showNewContent())
	    }
	    function showNewContent( response, status, xhr) {
	        jQuery('#box-contact').show('normal',hideLoader());
	        if(status == "success") {
                        alert("Successfully loaded the content!");
             }
	        jQuery('#box-contact').find('article').append('<a href="#" class="close-reveal-modal">Close</a>');
	    }
	    function hideLoader() {
	        jQuery('#load').fadeOut('normal');
	    }
	    jQuery('.wpcf7-submit').attr('disabled', 'disabled');
	    return false;
     
    });
       
       /*  
    jQuery('#home-contact a').click(function(e) {
    	e.preventDefault();
        jQuery('#box-contact').foundation('reveal', 'open', {
          url: jQuery(this).attr('href'),
          dataType: 'html',
          success: function(html) {
	        var div = jQuery('#content article', jQuery(html)).addClass('done');
	        jQuery('#box-contact').html(div);
	        console.log(div);  
			}
		 
        });
        
        return false;
      });
       */ 
      
	  jQuery('.open-modal a').click(function(e) {
	  	jQuery('#box-contact').foundation('reveal', 'open');
	  });
	  
	  
	   
	  $('.wpcf7-submit').click(function(){
	    var toLoad = $(this).attr('href')+'#content article';
	    console.log( jQuery(".wpcf7-response-output").html());     
     });
	  
	  jQuery('.wpcf7-submit').click(function(event) {//IF THE SUBMIT IS PRESSED
	   
	    event.preventDefault ? event.preventDefault() : event.returnValue = false;
	    
		jQuery(document).ajaxComplete(function() {//AJAX RESPONSES
		console.log( jQuery(".wpcf7-response-output").html()); //ALERTS THE OUTPUT
		});
	  });
	  
});



