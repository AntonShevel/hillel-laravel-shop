
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function($) {
  $('input[name="delivery"]').on('click', function(){
    if ($('#nova_poshta').prop("checked")){
      $('#np-map').slideDown('fast');
      $('#city').attr('required', 'true')
    }
    else{
      $('#np-map').slideUp('fast');
      $('#city').removeAttr('required');
    }
  });

  $('input[name="otdelenie"]').css({
    width: $('#npw-map-open-button').outerWidth() + 'px'
  });
  $(document).on('click', '#npw-cities option', function(e){
    var city = $(this).val();
    $('#city').val(city);
  });
  $(document).on('click', '.npw-details-title', function(e){
    var department = $(this).html();
    $('#department').val(department);
    $('#npw-map-close-button').click();
  });
  $(document).on('click', '#npw-map-sidebar-ul .npw-list-city', function(e){
    var city = $(this).html();
    $('input#city').val(city);
  });
  $('#checkout').submit(function(event) {
    if ($('#nova_poshta').prop("checked") === false){
      $('input#city').val('');
      $('input#department').val('');
    }
  });
});
