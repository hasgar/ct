@extends('layouts.app')



@section('meta')
  <title>Home - Buy Cake Online UAE | Free Delivery</title>
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

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="home" data-parallax="scroll" data-image-src="img/sub_header_home.jpg" data-natural-width="1400" data-natural-height="550">
<div id="subheader">
    <div id="sub_content">
        <h2 class="home-heading">Cakes at your Doorstep</h1>
<p> Choose your emirate from below select box</p>
        <form method="post" action="">
            <div id="custom-search-input">
                <div class="input-group">
                <select class="search-query" onchange="location = this.value;">
                  <option value="" disabled selected>Select your emirate</option>
                  @foreach ($emirates as $emirate)
                    <option value="/buy-cake-{{str_replace(' ', '', strtolower($emirate['name']))}}">{{$emirate['name']}}</option>
                  @endforeach

                </select>

                </div>
            </div>
        </form>
    </div><!-- End sub_content -->
</div><!-- End subheader -->
<!--<div id="count" class="hidden-xs">
    <ul>
        <li><span class="number">2650</span> Restaurant</li>
        <li><span class="number">5350</span> People Served</li>
        <li><span class="number">12350</span> Registered Users</li>
    </ul>
</div>-->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

 <!-- Content ================================================== -->
     <div class="container margin_60">

     <div class="main_title">
        <h2 class="nomargin_top" style="padding-top:0">How it works</h2>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box_home" id="one">
                <span>1</span>
                <h3>Select the city</h3>
                <p>
                    Choose your city where the cake to get delivered.
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box_home" id="two">
                <span>2</span>
                <h3>Choose your cake</h3>
                <p>
                    We have more than 100s of cakes available.
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box_home" id="three">
                <span>3</span>
                <h3>Fill your details</h3>
                <p>
                    It's quick, easy and totally secure.
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box_home" id="four">
                <span>4</span>
                <h3>Delivery</h3>
                <p>
                    Enjoy your cake
                </p>
            </div>
        </div>
    </div><!-- End row -->

    <div id="delivery_time" class="hidden-xs">
        <strong><span>2</span><span>5</span></strong>
        <h4>The minutes that usually takes to deliver!</h4>
    </div>
    </div><!-- End container -->



<section class="parallax-window" data-parallax="scroll" data-image-src="img/bg_office.jpg" data-natural-width="1200" data-natural-height="600">
<div class="parallax-content">
    <div class="sub_content">
        <i class="icon_mug"></i>
        <h3>We also deliver to your office</h3>

    </div><!-- End sub_content -->
</div><!-- End subheader -->
</section><!-- End section -->
<!-- End Content =============================================== -->
@endsection



@section('extra_modal')


@endsection



@section('extra_js')


@endsection
