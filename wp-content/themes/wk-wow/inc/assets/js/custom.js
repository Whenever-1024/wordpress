
/*--------------------------------------------------------
    Top Button
--------------------------------------------------------*/
jQuery(document).ready(function($){
    var offset = 100;
    var speed = 250;
    var duration = 500;
        $(window).scroll(function(){
            if ($(this).scrollTop() < offset) {
                      $('.topbutton') .fadeOut(duration);
            } else {
                      $('.topbutton') .fadeIn(duration);
            }
        });
     $('.topbutton').on('click', function(){
            $('html, body').animate({scrollTop:0}, speed);
            return false;
            });
});

/*--------------------------------------------------------
    Jarallax Active Code
 --------------------------------------------------------*/

;(function($){
    "use strict";

    $(document).ready(function(){   
        if ($.fn.jarallax) {
            $('.jarallax').jarallax({
                speed: 0.5
            });
        }

    });

    /* Hamburger
-----------------------------------------------------------------------------------------
*/
var keys = {
  tab:    9,
  enter:  13,
  esc:    27,
  space:  32,
  left:   37,
  up:     38,
  right:  39,
  down:   40
};

$.noConflict();
jQuery( document ).ready(function( $ ) {
  
  // When focused on hamburger/close button AND menu is expanded, move focus to end of list on shift-tab
  $('[href="#pageContainerMainNavMobile"]').on('keydown', function(e) {
    if (e.keyCode === keys.tab && $(this).attr('aria-expanded') == 'true') {
    if (e.shiftKey) {
      e.preventDefault();
      $('#pageContainerMainNavMobile li:last-child a').focus();
    }
    }
  });
  
});   

    jQuery(window).load(function (e) {
       'use strict';

       /* Preloader */
       $(".status").fadeOut();
       $(".preloader").delay(20).fadeOut("slow");

}); /* END WIDNOW LOAD */

})(jQuery);

/*--------------------------------------------------------
   Mobile menu focus trapping 
 --------------------------------------------------------*/
jQuery( document ).ready( function( $ ) {
  var $menu_elements = $( 'button.navbar-toggler, nav.navbar a.nav-link, nav.navbar .nav-callout-button a' );
 
  // Rewrite the elements to listen to tab and shift tab, and focus on each other.
  $menu_elements.keydown( function( e ) {
    if ( $( this ).attr( 'focus_locked' ) != 'true' )
      return;
    var code = e.keyCode || e.which;
    if ( code != 9 )
      return;

    var $current_element = $( this );

    // Let the focus go to the submenu item if this is a submenu parent.
    if ( $current_element.attr( 'aria-expanded' ) == 'true' )
      return;
 
    e.preventDefault();
    var counter;
    for( counter = 0; counter < $menu_elements.length ; counter++ ) {
      if( $current_element[0 ] == $menu_elements[ counter ] )
        break;
    }
 
    // Tab forwards
    if ( ! e.shiftKey ) {
      if ( counter == $menu_elements.length - 1 )
        // This is the last element. Select first.
        $menu_elements.first().focus();
      else
        $menu_elements[ counter + 1 ].focus();
    }
    else
    {
      // Tab backwards!
      if ( counter > 0 )
        $menu_elements[ counter - 1 ].focus();
      else
      {
        // First element. Select last.
        $menu_elements.last().focus();
      }
    }
 
  } );
 
  var $navbar_toggler = $( 'button.navbar-toggler' );
  // Lock the focus to the elements within.
  $navbar_toggler.click( function( e ) {
    if ( $navbar_toggler.attr( 'aria-expanded' ) != 'true' ) {
      $menu_elements.attr( 'focus_locked', true );
      // We need a tiny, tiny timeout to allow for the element to focus.
      setTimeout( function() {
        $menu_elements.first().focus();
      }, 10 );
    }
    else
    {
      $menu_elements.removeAttr( 'focus_locked' );
      $( this ).blur();
    }
  } );
} );


