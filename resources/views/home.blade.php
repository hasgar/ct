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

<link href="layerslider/css/layerslider.css" rel="stylesheet">

@endsection


@section('header-class')


@endsection

@section('select-form')
<div align="center">
<form method="post" class="select-emirate-form">
    <div id="custom-search-input">
        <div class="input-group col-md-12 col-sm-12">
        <select class="form-control col-md-12 col-sm-12 select-emirate-select" onchange="location = this.value;">
          <option value="" disabled selected>Select your emirate</option>
          @foreach ($emirates as $emirate)
            <option value="/buy-cake-{{str_replace(' ', '', strtolower($emirate['name']))}}">{{$emirate['name']}}</option>
          @endforeach

        </select>

        </div>
    </div>
</form>
</div>

@endsection

@section('content')




<!-- SubHeader =============================================== -->

<div id="full-slider-wrapper">
<div id="layerslider" style="width:100%;height:600px;">
    <!-- first slide -->
    <div class="ls-slide" data-ls="slidedelay: 3000; transition2d:5;">
        <img src="img/slides/slider_1-min.jpg" class="ls-bg" alt="Slide background">
      <h3 class="ls-l slide_typo" style="top: 44%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" >We Also Deliver to Your <strong>Office</strong></h3>
        <p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;" >Order Now</p>

</div>

    <!-- second slide -->
<div class="ls-slide" data-ls="slidedelay: 3000; transition2d:5;">
        <img  src="img/slides/slider_2-min.jpg" class="ls-bg" alt="Slide background">

</div>

 <!-- third slide -->
 <div class="ls-slide" data-ls="slidedelay:3000; transition2d:5;" >
         <img src="img/slides/slider_3-min.jpg" class="ls-bg" alt="Slide background">
      <h3 class="ls-l slide_typo" style="top: 44%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" >Fast & Free Delivery</h3>
        <p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;" >Order Now</p>


    </div>


<div class="ls-slide" data-ls="slidedelay: 3000; transition2d:5;">
    <img src="img/slides/slider_5-min.jpg" class="ls-bg" alt="Slide background">
  <h3 class="ls-l slide_typo" style="top: 44%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" >Best Cakes, Best Price</h3>
    <p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;" >Order Now</p>

</div>

<div class="ls-slide" data-ls="slidedelay: 3000; transition2d:5;">
    <img src="img/slides/slider_6-min.jpg" class="ls-bg" alt="Slide background">
  <h3 class="ls-l slide_typo" style="top: 44%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" >SURPRISE YOUR SPECIAL PERSON</h3>
    <p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;" >Order Now</p>

</div>



</div>

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
<br><br>
    <div class="main_title">
              <h2 class="nomargin_top">Our features</h2>

          </div>





            <div class="row">
                <div class="col-md-4">
                    <div class="box_home" id="two">
                        <h3>CASH ON DELIVERY</h3>
                        <p>
                          No Upfront Payment, Easy and Secured
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box_home" id="three">
                        <h3>100% Satisfaction</h3>
                        <p>
                            We guarantee the quality and taste
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box_home" id="one">
                        <h3>Fast & Free Delivery</h3>
                        <p>
                            No Hassle, Its fast & Free!
                        </p>
                    </div>
                </div>

            </div><!-- End row -->
</div>

<section class="parallax-window" data-parallax="scroll" data-image-src="img/bg_office.jpg" data-natural-width="1200" data-natural-height="600">
<div class="parallax-content">
    <div class="sub_content">
        <i class="icon-back-in-time"></i>
        <h3>JUST 90 SECONDS<br>TO ORDER A CAKE</h3>

    </div><!-- End sub_content -->
</div><!-- End subheader -->
</section><!-- End section -->
<!-- End Content =============================================== -->
@endsection



@section('extra_modal')


@endsection



@section('extra_js')

<script src="layerslider/js/greensock.js"></script>
<script src="layerslider/js/layerslider.transitions.js"></script>
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
		'use strict';
        $('#layerslider').layerSlider({
            autoStart: true,
			responsive: true,
			responsiveUnder: 1280,
			layersContainer: 1170,
			navButtons:true,
			showCircleTimer:true,
			navStartStop:true,
            skinsPath: 'layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    });
</script>

@endsection
