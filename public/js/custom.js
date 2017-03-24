$('.search-query').on('change', function() {
  showLoader()
})


function showLoader() {
  $('#preloader').show()
  $('.sk-spinner').show()
  $("html").css("overflow", "hidden");
  $("body").css("overflow", "hidden");
}

function hideLoader() {
  $('#preloader').show()
  $('.sk-spinner').show()
}
$('input[type=radio][name=is_shaped]').change(function() {

   if($('#is_shaped').is(':checked')) {
     $('#amount').val($('#amount').data('shaped'));
     $('#amount').prop("readonly", true);
   } else {
     $('#amount').val("");
     $('#amount').prop("readonly", false);
   }
});
