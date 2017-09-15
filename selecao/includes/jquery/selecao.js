jQuery(document).ready(function($) {
  $('.tela') .hide()
$('a[href^="#"]').on('click', function(event) {
$('.tela') .hide()
    var target = $(this).attr('href');

    $('.tela'+target).toggle();

});
});