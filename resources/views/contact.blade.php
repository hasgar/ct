@extends('layouts.app')



@section('meta')
  <title>Contact Us</title>
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
        	<div class="box_style_2">
            	<h2 class="inner">Customer support</h2>
                <p><a href="tel://00971543354175" class="phone"><i class="icon-phone-circled"></i>  +971543354175</a></p>
                <p class="nopadding"><a href="mailto:contact@caketreeonline.com"><i class="icon-mail-3"></i> contact@caketreeonline.com</a></p>
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
						<input type="text" class="form-control" id="email" name="email" placeholder="Your email" required>
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
