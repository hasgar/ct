@extends('layouts.app')



@section('meta')
  <title>CakeTreeOnline.com – About Us</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="bakery in UAE, themed cakes in the UAE, cake online, caramel cake, chocolate cake, christening cakes, birthday cakes for boys and order cake online">
  <meta name="description" content="Meet Cake Tree! The Smarter Way to buy a Cake? We offer a rather extensive selection of seductive and silky recipes, and a large showcase of some of the best themed cakes in the UAE so whatever the occasion is, we guarantee to make it special.">
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
              <p>What if you could cut the trips to your local brick and mortar bakery in UAE and have a luscious cake delivered right to your doorstep? Have you been disappointed upon learning your favorite cake isn’t available at your local cake shop? Or you need a few cakes delivered fast to your next corporate function?</p>
              <p>Meet Cake Tree! The Smarter Way to buy a Cake? We offer a rather extensive selection of seductive and silky recipes, and a large showcase of some of the best themed cakes in the UAE so whatever the occasion is, we guarantee to make it special. </p>
              <h3>5 Reasons to Choose Cake Tree</h3>
              <p>&#10003; <b>Hasslefree Experience</b> – what’s sets us apart from the competition is the sheer convenience of ordering cake online including a delicious caramel cake, chocolate cake and a myriad of christening cakes and birthday cakes for boys. </p>
              <p>&#10003; <b>Extensive selection</b> – our vast portfolio will leave you spoilt for choice and includes regular cakes such as black forest cake, unique photo cakes and theme cakes for birthdays and corporate houses.</p>
              <p>&#10003; <b>No upfront payment</b> – simply select your city and cake, fill in your details and pay for the cake when it arrives. It’s really that easy!</p>
              <p>&#10003; <b>Fast and free delivery </b> – “You can't have your cake and eat it too”. We beg to differ! All you pay for is the price of the cake and we’ll get it to you at no extra cost.
</p>
              <p>&#10003; <b>Guaranteed satisfaction</b> – with a wealth of experience, we know cakes and look forward to exceeding your expectations.
</p>
    <p>Whether you desire cake for that special someone or milestone or want to indulge in a tantalizing cake recipe yourself, order cake online Cake Tree, and we’ll guarantee to make your sweet tooth scream with joy!  </p>

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
