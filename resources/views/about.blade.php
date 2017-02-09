@extends('layouts.app')



@section('meta')
  <title>About Us</title>
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
<div class="container margin_60_35 contact-content">
  @if (count($errors) > 0)
  <blockquote class="styled">
  <ul class="error_points">
  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
    </blockquote>
    @endif
	<div class="row" id="contacts">
    	<div class="col-md-6 col-sm-6">
        	<div class="box_style_2 about-us">
            	<h2 class="inner">About Us</h2>
              <p>Someone once said, a party without a cake is just a meeting. And how we agree to it.</p>
              <p>Tired of going through a million places to find that one perfect cake? Looking for the perfect cake to be delivered to surprise your friend? As cliché as it sounds, your find ends here at 'Cake Tree'.</p>
              <p>Cake Tree features carefully crafted cakes from the best in the business in and around UAE. We make sure our cakes looks great ( after all it has to be insta-worthy, right) and tastes even better. Top chefs, best ingredients, made with lots of love - our cakes are sure to be devoured by the young and old alike.</p>
              <p>You can choose from our vast menu of the regular cakes plus a few of our super hit innovative flavours. Our website, one of the best in terms of being user friendly helps with processing your orders in the best possible manner. Quick and easy - try it to see for yourself.
</p>
<p>At Cake Tree, we promise quality and prompt customer care. Because we know how important a deliciously gorgeous cake is!</p>
<p>Efficiently packed, free and hassle - free door to door delivery makes your last minute party plans easier and delicious.
</p>
<p>Let's get the party started!</p>
              </div>
    	</div>

        <div class="col-md-6 col-sm-6">
        	<div class="box_style_2">
            <form action="/SendMessage" method="post" />
            	<h2 class="inner">Message Box</h2>
{{ csrf_field() }}
              <div class="form-group">
                <label>Name</label>
              						<input type="text" class="form-control" id="name" name="name" placeholder="Your name" required="">
              					</div>

                        <div class="form-group">
                          <label>Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Your email" required="">
					</div>


          <div class="form-group">

								<label>Message</label>
								<textarea class="form-control contact-btn" style="height:60px" placeholder="Your message" name="message" id="message" autocomplete="off"></textarea>

						</div>

            <div class="form-group">

  								<button type="submit" class="btn btn-submit">Submit</button>
  						</div>
            </div>
    	</div>
    </div><!-- End row -->
</div>

@endsection



@section('extra_modal')


@endsection



@section('extra_js')


@endsection
