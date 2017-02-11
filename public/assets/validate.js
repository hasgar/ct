/* <![CDATA[ */
/// Jquery validate newsletter
jQuery(document).ready(function(){
	$('#shipping').on('change', function() {
		// $("#timeslot").val("");
		// $('#select-shipping-type-first').hide();
		// $('.timeslots').hide();
		//
		// $('#timeslot > option').each(function(index, element) {
		//
    // 	if ($(element).data('type') == $('#shipping').val())
		// 		$(element).show();
		// });
		if ($("#shipping").val() != null) {
		if ($("#order_date").val() == $("#date-today").val()){
			$('#timeslot').empty();
			$("#today > #shipping-"+$('#shipping').val()).children().clone().appendTo("#timeslot");
		} else {
			$('#timeslot').empty();
			$("#other-days > #shipping-"+$('#shipping').val()).children().clone().appendTo("#timeslot");
		}
}
	})

$("#order_date").change(function() {
	if ($("#shipping").val() != null) {
	if ($("#order_date").val() == $("#date-today").val()){
	$('#timeslot').empty();
	$("#today > #shipping-"+$('#shipping').val()).children().clone().appendTo("#timeslot");
} else {
	$('#timeslot').empty();
	$("#other-days > #shipping-"+$('#shipping').val()).children().clone().appendTo("#timeslot");
}
}
 });



	$('#timeslot').on('change', function() {
			var delivery_charge = parseInt($('option:selected', this).data('price'));
			$(".delivery-charge").html(delivery_charge + " AED");
		//	var amount = $(".total-amount").html();
		//	var total = parseInt(amount.substring(0, amount.length - 4));
			var sub = $(".sub-total").html();
			var subTotal = parseInt(sub.substring(0, sub.length - 4));
			 $(".total-amount").html(subTotal + delivery_charge + " AED")

	})

$('.strip_list').on("click",function(){
	$("#cake_kg").attr("min",$(this).data('min'));
	if ($(this).data('type') == "theme") {
		$("#theme-flavour").prop('required',true);
		$("#theme-flavour").show();
	}
	else if ($(this).data('type') == "normal") {
		$("#theme-flavour").prop('required',false);
		$("#theme-flavour").hide();
	}
$("#cake-id").val($(this).data('id'));
$("#cake-type").val($(this).data('type'));
$(".view-cake-details").attr("href", $(this).data('name')+"-cake-"+$(this).data('id'));
$('#flavour').on('change', function() {
	$("#photo-cake-flavour").val($(this).val());
})
});
	$('#newsletter_2').submit(function(){

		var action = $(this).attr('action');

		$("#message-newsletter_2").slideUp(750,function() {
		$('#message-newsletter_2').hide();

		$('#submit-newsletter_2')
			.after('<i class="icon-spin4 animate-spin loader"></i>')
			.attr('disabled','disabled');


		$.post(action, {
			email_newsletter_2: $('#email_newsletter_2').val()
		},
			function(data){
				document.getElementById('message-newsletter_2').innerHTML = data;
				$('#message-newsletter_2').slideDown('slow');
				$('#newsletter_2 .loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit-newsletter_2').removeAttr('disabled');
				if(data.match('success') != null) $('#newsletter_2').slideUp('slow');

			}
		);

		});

		return false;

	});

});

/// Jquery validate review tour
jQuery(document).ready(function(){

	$('#review').submit(function(){

		var action = $(this).attr('action');

		$("#message-review").slideUp(750,function() {
		$('#message-review').hide();

		$('#submit-review')
			.after('<i class="icon-spin4 animate-spin loader"></i>')
			.attr('disabled','disabled');

		$.post(action, {
			restaurant_name: $('#restaurant_name').val(),
			name_review: $('#name_review').val(),
			email_review: $('#email_review').val(),
			food_review: $('#food_review').val(),
			price_review: $('#price_review').val(),
			punctuality_review: $('#punctuality_review').val(),
			courtesy_review: $('#courtesy_review').val(),
			review_text: $('#review_text').val(),
			verify_review: $('#verify_review').val()
		},

			function(data){
				document.getElementById('message-review').innerHTML = data;
				$('#message-review').slideDown('slow');
				$('#review .loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit-review').removeAttr('disabled');
				if(data.match('success') != null) $('#review').slideUp('slow');

			}
		);

		});

		return false;

	});

});

  /* ]]> */
