var theWindow, bodyTag, htmlTag;
var responsiveStyle, responsiveState, getResponsiveState, performResponsive, performResponsiveBase, delai;

(function($) {
  // debounce function
  function debounce(callback, delay){
    var timer;
    return function(){
      var args = arguments;
      var context = this;
      clearTimeout(timer);
      timer = setTimeout(function(){
        callback.apply(context, args);
      }, delay)
    }
  }

  // function used with specific stylesheet, to synch responsive state in JS with css
  initResponsive = function() {
    if (!$('#responsive-stylesheet').length) bodyTag.append('<div id="responsive-stylesheet"/>');
    responsiveStyle = $('#responsive-stylesheet');
  };

  // read real responsive state from css
  getResponsiveState = function () {
    responsiveState = responsiveStyle.css('zIndex');
  };

  // responsive actions to do on each resize
  performResponsiveBase = function() {
    getResponsiveState();
    if (responsiveState==1002) {
      // -------------- medium screen
    } else if (responsiveState==1003) {
      // -------------- large screen
    } else if (responsiveState==1004) {
      // -------------- wide screen
    } else {
      // -------------- small screen
    }

  }

  // responsive stuff to do once
  performResponsive=function() {
    performResponsiveBase();
  }

  // on dom ready
  $(document).ready(function () {
    bodyTag =  $('body');
    theWindow = $(window);
    htmlTag =  $('html');
    delai = 250;

    // js ready
    bodyTag.addClass('js');

    // prepare responsive gymm
    initResponsive();

    // watch responsive
    theWindow.bind('resize orientationchange', debounce(function(e){
      performResponsiveBase();
    },delai));
    performResponsive();
  });
})(jQuery);
