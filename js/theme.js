/**
* File theme.js
*/

( function( $ ) {

  $(document).ready(function () {
    // navigation enhancements
    $('[name="site-toggler"]').change(function () {
      var currentClass = this.value;
      if(currentClass.indexOf("opened")>-1) {
        $('body').addClass(currentClass);
      } else {
        $('body').removeClass(function (index, css) {
          return $.grep(css.split(/ +/), function(v){
            return v.match(/-opened$/);
          }).join(' ');
        });
      }
    });
  });
} )( jQuery );
