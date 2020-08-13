import jQuery from 'jquery/dist/jquery.min';

(function($) {
  'use strict';

  $(window).on('scroll', function() {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
      $('#sticky-header').removeClass('sticky');
      $('#back-top').fadeIn(500);
    }
    else {
      $('#sticky-header').addClass('sticky');
      $('#back-top').fadeIn(500);
    }
  });

  $('.browserupgrade').hide();

})(jQuery);
