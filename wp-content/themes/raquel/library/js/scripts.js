/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();

   AOS.init();


  if( jQuery('.swiper-cards').length > 0 ) {
    var swiper = new Swiper(".swiper-cards", {
      slidesPerView: 1,
      spaceBetween: 5,
      centeredSlides: true,  
      initialSlide: 1,  
      loop: true,
      autoplay: {
        delay: 15000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".pagination-card",
        clickable: true,      
      },
      navigation: {
        nextEl: ".next-top",
        prevEl: ".prev-top",
      },
      breakpoints: {
        640: {
            slidesPerView: 1,
          spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
      },
    });
  }

  const items = document.querySelectorAll('.multilenguaje li');
  items.forEach((item) => {
      item.addEventListener('click', () => {
          items.forEach((el) => el.classList.toggle('activo')); // Cambia la clase entre los elementos
      });
  });


  if( jQuery('.swiper-gallery').length > 0 ) {
    var swiper = new Swiper(".swiper-gallery", {
      slidesPerView: 1,
      spaceBetween: 5,   
      centeredSlides: true,  
      initialSlide: 1,  
      loop: true, 
      autoplay: {
        delay: 15000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".pagination-gallery",
        clickable: true,      
      },
      navigation: {
        nextEl: ".next-gallery",
        prevEl: ".prev-gallery",
      },
      breakpoints: {
        640: {
            slidesPerView: 1,
          spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
      },
    });
  }

  
  if( jQuery('.swiper-banner-home').length > 0 ) {
    var swiper = new Swiper(".swiper-banner-home", {
      spaceBetween: 0,
      // effect: "fade",
      autoplay: {
        delay: 7500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".pagination-home",
        clickable: true,      
      },
      navigation: {
        nextEl: ".next-home",
        prevEl: ".prev-home",
      },    
    });
  } 


  jQuery(".anchor").click(function( e ) {
      e.preventDefault();
      e.stopPropagation();
      $target = $(this);
      jQuery('html, body').animate({
          scrollTop: jQuery($target.attr('href')).offset().top
      }, 1000);
  });

    // Menú hamburguesa
    if( jQuery('#nav-toogle').length > 0 ) {
        jQuery('#nav-toogle').click(function() {        
            jQuery(this).toggleClass('open');        
            jQuery('body').toggleClass('open-nav-xs');
        });
    };

    if( jQuery('header nav li a').length > 0 ) {
        jQuery('header nav li a').click(function() {  
            jQuery('body').removeClass('open-nav-xs');      
            jQuery('#nav-toogle').removeClass('open');
        });
    };



    // Menu responsive type accordion
    if (screen.width < 769) {
        jQuery('header nav ul li a').click(function(){
            var isOpen = jQuery(this).next().is(':visible');
            
            // Cierra todos los elementos desplegables excepto el que se está tocando
            jQuery('header nav ul li ul').not(jQuery(this).next()).slideUp();
            
            // Agrega o remueve la clase "current" según el estado del elemento desplegable
            jQuery('header nav ul li').removeClass('current');
            if (!isOpen) {
                jQuery(this).parent().addClass('current');
            }
            
            // Alterna el estado del elemento desplegable asociado al enlace clicado
            jQuery(this).next().slideToggle();
        });
    }


    


}); /* end of as page load scripts */


