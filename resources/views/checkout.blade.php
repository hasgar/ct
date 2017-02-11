@extends('layouts.app')



@section('meta')

  <title>Checkout</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="buy cake, free delivery, buy cake online, buy cake sharjah online, buy cake dubai, buy cake sharjah">
  <meta name="description" content="Buy Cakes in Dubai, Sharjah, Ajman online with free delivery">
  <meta name="author" content="CakeTree">

@endsection



@section('extra_css')


    <link href="css/date_time_picker.css" rel="stylesheet">
    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">

@endsection


@section('header-class')

class="nav-top-bg"

@endsection

@section('content')



    <div id="position">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
  @if (count($errors) > 0)
  <blockquote class="styled">
  <ul class="error_points">
  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
    </blockquote>
    @endif
		<div class="row">
			<div class="col-md-3">

				<div class="box_style_2 hidden-xs info">
					<h4 class="nomargin_top">Delivery time <i class="icon_clock_alt pull-right"></i></h4>
					<p>
						We take 4 hours to deliver our Regular cakes, and its Completely Free.	</p>
					<hr>
					<h4>CASH ON DELIVERY <i class="icon_creditcard pull-right"></i></h4>
					<p>
				 We provide only Cash On Delivery to make you feel more secure and happy</p>
				</div><!-- End box_style_1 -->

				<div class="box_style_2 hidden-xs" id="help">
					<i class="icon_lifesaver"></i>
					<h4>Need <span>Help?</span></h4>
          <a href="tel://00971543354175" class="phone">+971543354175</a>
          <small>Saturday to Thursday 9.00am - 9.00pm</small>
				</div>

			</div><!-- End col-md-3 -->
      <form action="/placeOrder" method="post">
        {{ csrf_field() }}
			<div class="col-md-6">
				<div class="box_style_2" id="order_process">
					<h2 class="inner cake-details">Your order details</h2>
          <div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
    						<input type="text" class="form-control" id="your_name" name="your_name" placeholder="Your name" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
    						<input type="text" class="form-control" id="reciever_name" name="reciever_name" placeholder="Reciever name" required>
							</div>
						</div>
					</div>


					<div class="form-group">
						<input type="text" class="form-control" id="flat_no_builder" name="flat_no_builder" placeholder="Flat number and Builder Name" required>
					</div>


          <div class="form-group">
						<input type="text" id="street_address" name="street_address" class="form-control" placeholder="Street address" required>
					</div>

            <div class="form-group">
                <input type="text" id="landmark" name="landmark" class="form-control" placeholder="Landmark">
              </div>
          @unless (Auth::check())
					<div class="form-group">
						<input type="email" id="email" name="email_order" class="form-control" placeholder="Your email" required>
					</div>
          @endunless
          <div class="form-group">
						<input type="text" id="your_phone" name="your_phone" class="form-control" placeholder="Your Phone Number" required>
					</div>
          <div class="form-group">
            <input type="text" id="reciever_phone" name="reciever_phone" class="form-control" placeholder="Reciever Phone Number">
          </div>


					<hr>
          <input type="hidden" value="{{$dt}}" id="date-today"/>
          <div class="row">
              <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                      <label><i class="icon-calendar-7"></i> Select a date</label>
                      <input name="order_date" id="order_date" class="date-pick form-control" data-date-format="yyyy-mm-dd" type="text" required>
                  </div>
              </div>
              <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                      <label><i class="icon-location"></i> Emirate</label>
                      <select class="form-control" name="emirate" required id="emirate">
                        @foreach ($emirates as $emirate)
                          <option value="{{$emirate['id']}}">{{$emirate['name']}}</option>
                        @endforeach

                        </select>
                  </div>
              </div>
          </div>
            <div class="row">
              <div class="col-md-6 col-sm-6">
          <div class="form-group">
								<label><i class="icon-th-thumb-empty"></i> Shipping Type</label>
                <select class="form-control" required name="shipping" id="shipping">
                  <option value="" disabled selected>Select Shipping type</option>

                            @foreach ($shipping as $ship)
                              <option value="{{$ship['id']}}" data-price="{{$ship['extra_amount']}}">{{$ship['name']}}</option>
                            @endforeach
                </select>
					</div>
	</div>
  <div class="col-md-6 col-sm-6">
          <div class="form-group">
								<label><i class="icon-clock"></i>  Timeslot</label>
                <select class="form-control" required name="timeslot" id="timeslot">
                            <option value="" disabled selected>Select Time slot</option>
                        </select>

<div class="hide-this" id="today">
  @foreach ($shipping as $ship)
  <div class="hide-this" id="shipping-{{$ship['id']}}">
  @foreach ($timeslots as $timeslot)
  @if ($timeslot["shipping_type_id"] == $ship["id"])
    <option class="timeslots" <?php if($timeslot["hide"]) echo "disabled"; ?> value="{{$timeslot['id']}}" data-price="{{$timeslot['extra_amount']}}" data-from="{{$timeslot['extra_amount']}}" data-to="{{$timeslot['extra_amount']}}" data-type="{{$timeslot['shipping_type_id']}}">{{$timeslot['timeslot']}} - <?php if ($timeslot['extra_amount'] == 0) echo "FREE"; else echo $timeslot['extra_amount']." AED"; ?></option>
  @endif
  @endforeach
</div>
  @endforeach
</div>
<div class="hide-this" id="other-days">
  @foreach ($shipping as $ship)
  <div class="hide-this" id="shipping-{{$ship['id']}}">
  @foreach ($timeslots as $timeslot)
  @if ($timeslot["shipping_type_id"] == $ship["id"])
    <option class="timeslots" value="{{$timeslot['id']}}" data-price="{{$timeslot['extra_amount']}}" data-from="{{$timeslot['extra_amount']}}" data-to="{{$timeslot['extra_amount']}}" data-type="{{$timeslot['shipping_type_id']}}">{{$timeslot['timeslot']}} - <?php if ($timeslot['extra_amount'] == 0) echo "FREE"; else echo $timeslot['extra_amount']." AED"; ?></option>
  @endif
  @endforeach
</div>
  @endforeach

</div>
					</div>
</div>
          </div>

					<hr>
					<div class="row">
						<div class="col-md-12">

								<label>Notes for the restaurant</label>
								<textarea class="form-control" style="height:60px" placeholder="Ex. Allergies, cash change..." name="notes" id="notes"></textarea>

						</div>
					</div>
				</div><!-- End box_style_1 -->
			</div><!-- End col-md-6 -->

			<div class="col-md-3" id="sidebar">
            	<div class="theiaStickySidebar">
				<div id="cart_box">
					<h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
					<table class="table table_summary">
					<tbody>


            @for ($i = 0; $i<count($items);$i++)
            <tr>
						<td class="cake-name-cart">
							<a href="/removeFromCart/{{$items[$i]["_id"]}}" class="remove_item"><i class="icon_minus_alt"></i></a> <strong>{{$items[$i]["quantity"]}}x</strong><?php if($items[$i]["type"] == "photo") echo '<i class="icon-picture"></i>'; if($items[$i]["type"] == "theme") echo '<i class="icon-heart"></i>'; ?> {{ CakeController::getCakeNameById($items[$i]["id"]) }}
						</td>
            <td>
							<strong class="pull-right"><?php if($items[$i]["type"] == "theme") { echo CartController::getItemAmount($items[$i]["id"],$items[$i]["quantity"],$items[$i]["kg"],$items[$i]["type"],$items[$i]["flavour_id"]); } else { echo CartController::getItemAmount($items[$i]["id"],$items[$i]["quantity"],$items[$i]["kg"],$items[$i]["type"]); } ?> AED</strong>
						</td>
					</tr>
            @endfor


					</tbody>
					</table>
					<hr>
					<table class="table table_summary">
					<tbody>
					<tr>
						<td>
							 Subtotal <span class="pull-right sub-total">{{ CartController::getTotalAmount() }} AED</span>
						</td>
					</tr>
					<tr>
						<td>
							 Delivery charge <span class="pull-right delivery-charge">0 AED</span>
						</td>
					</tr>
					<tr>
						<td class="total">
							 TOTAL <span class="pull-right total-amount">{{ CartController::getTotalAmount() }} AED</span>
						</td>
					</tr>
					</tbody>
					</table>
					<hr>
          <div class="form-group">
								<label>Payment Type</label>
								<select required class="form-control" name="payment_type" id="payment_type">
									<option value="cod" selected >Cash on Delivery</option>
									<option value="online" disabled>Online Payment</option>
								</select>
					</div>
					<button type="submit" class="btn_full">Place Order</button>
					<a class="btn_full_outline" href="/cakes"><i class="icon-right"></i> Add other items</a>
				</div>
      </div>
			</div>
</form>
		</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->


@endsection



@section('extra_modal')


@endsection



@section('extra_js')


<script src="js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
      additionalMarginTop: 80
    });
</script>

<!-- Date and time pickers -->
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-timepicker.js"></script>


<script>
  $('input.date-pick').datepicker('setDate', 'today');
  $('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})
</script>

@endsection
