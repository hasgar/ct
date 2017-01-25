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
