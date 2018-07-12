/**
* File theme.js
*/

( function( $ ) {

  $(document).ready(function () {
    console.log("letsgo");
    // navigation enhancements
    $('[name="site-navigation-toggler"]').change(function () {
      if(this.value=="opened") {
        $('body').addClass('nav-opened');
      } else {
        $('body').removeClass('nav-opened');
      }
    });
  });
} )( jQuery );
