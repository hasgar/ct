@extends('layouts.app')



@section('meta')
  <title>Order Confirmed!</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="buy cake, free delivery, buy cake online, buy cake sharjah online, buy cake dubai, buy cake sharjah">
  <meta name="description" content="Buy Cakes in Dubai, Sharjah, Ajman online with free delivery">
  <meta name="author" content="CakeTree">
@endsection



@section('extra_css')


@endsection


@section('header-class')

class="nav-top-bg"

@endsection

@section('content')

<!-- Content ================================================== -->
<div class="container margin_60_35 top-padding-220">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="box_style_2">
				<h2 class="inner">Order confirmed!</h2>
				<div id="confirm">
					<i class="icon_check_alt2"></i>
					<h3>Thank you!</h3>
	<h4>Your Order ID: {{ Session::get('orderId') }} {{ Session::forget('orderId') }}</h4>
  <p>Please note it for future reference</p>
				</div>
			<a href="/cakes" class="btn_full">Buy another cake</a>
      <a class="btn_full_outline" href="/"><i class="icon-right"></i> Back to home</a>
			</div>
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->


@endsection



@section('extra_modal')


@endsection



@section('extra_js')


@endsection
