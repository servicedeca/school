(function ($) {

  Drupal.behaviors.SchoolInit = {
    attach: $(function() {
      $(window).load(function() {
        $('#slider').nivoSlider();
      });
    })
  }
}(jQuery));