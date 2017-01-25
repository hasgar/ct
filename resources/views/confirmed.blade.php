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
					<p>
						Lorem ipsum dolor sit amet, nostrud nominati vis ex, essent conceptam eam ad. Cu etiam comprehensam nec. Cibo delicata mei an, eum porro legere no.
					</p>
				</div>
				<h4>Summary</h4>
				<table class="table table-striped nomargin">
				<tbody>
				<tr>
					<td>
						<strong>1x</strong> KitKat Chocolate
					</td>
					<td>
						<strong class="pull-right">99 AED</strong>
					</td>
				</tr>

				<tr>
					<td>
						 Delivery Charge
					</td>
					<td>
						<strong class="pull-right">10 AED</strong>
					</td>
				</tr>
				<tr>
					<td class="total_confirm">
						 TOTAL
					</td>
					<td class="total_confirm">
						<span class="pull-right">109 AED</span>
					</td>
				</tr>
				</tbody>
				</table>
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
