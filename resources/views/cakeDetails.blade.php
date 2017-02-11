@extends('layouts.app')



@section('meta')
  <title>Buy {{$cake["name"]}} UAE Online | Free Delivery</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="{{$cake["name"]}} buy online dubai, {{$cake["name"]}} buy online ajman, {{$cake["name"]}} buy online sharjah, free delivery, buy cake, buy cake online, buy cake sharjah online, buy cake dubai, buy cake sharjah">
  <meta name="description" content="{{$cake["name"]}} buy online Dubai Sharjah Ajman with free delivery">
  <meta name="author" content="CakeTree">
@endsection



@section('extra_css')

    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">

    <!-- Gallery -->
    <link href="css/slider-pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection


@section('header-class')

class="nav-top-bg"

@endsection

@section('content')


<div id="position">
    <div class="container">
        <ul>
            <li><a href="/index.html">Home</a></li>
            <li><a href="/grid_list.html">Dubai</a></li>
            <li>{{$cake["name"]}}</li>
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

  <div class="col-md-8">
    <div class="box_style_2">
      <h2 class="inner cake-details">{{$cake["name"]}} <span class="cake-price-top">- <?php if($cake["is_shaped"] == true) echo "Regular +"; ?> {{round($cake["amount"])}} AED</span> <i class="icon_info_alt pull-right"></i></h2>

                <img src="img/cakes/{{str_replace(" ","_",strtolower($cake["name"]))}}_{{$cake["id"]}}_large_1.jpg" class="img-responsive" />
                @if ($cake["description"])
                <h3>Description</h3>
    <p class="cake-description"><?php echo $cake["description"]; ?></p>
      @endif
    </div><!-- End box_style_1 -->
  </div>


  <div class="col-md-4">

    <div class="box_style_2 bg-box">
      <h2 class="inner">Buy this cake <i class="icon_cog pull-right"></i></h2>
      <form action="/addCakeToCart" method="POST" class="popup-form margin-buy-10" id="myLogin">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="cake-id" value="{{$cake['id']}}" />
        <input type="hidden" name="type" id="cake-type" value="{{$type}}" />
        @if ($cake["is_shaped"])
        <select class="form-control form-white no-bottom-margin" name="flavour" required>
          <option value="" disabled selected>Select Cake Flavour</option>
          @foreach ($theme_flavours as $flavour)
          <option data-price="{{round($flavour["amount"])}}" value="{{$flavour["id"]}}">{{$flavour["name"]}} - {{round($flavour["amount"])}} AED</option>
          @endforeach
        </select>
        @endif

        <div class="col-md-6 col-sm-6 no-left-padding">
          <select  class="form-control form-white" id="kg" name="kg" autocomplete="off">
            <option value="" selected disabled="">Select KG</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="col-md-6 col-sm-6 no-right-padding">
          <select  class="form-control form-white" id="quantity" name="quantity" autocomplete="off">
            <option value="" selected disabled="">Select Qty</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          </div>
        <textarea class="form-control form-white cake-msg" placeholder="Message on cake" name="message"  rows="3" cols="50"></textarea>
        <div class="col-md-6 col-sm-6 no-left-padding filter_type" align="left">
        <ul class="nomargin">
            <li><label class="cake-option"><div class="icheckbox_square-grey"><input type="checkbox" name="eggless"  class="icheck" ><ins class="iCheck-helper"></ins></div>Egg Less</label></li>
        </ul>
        </div>
        <div class="col-md-6 col-sm-6 no-right-padding filter_type" align="left">
        <ul class="nomargin">
            <li><label class="cake-option"><div class="icheckbox_square-grey"><input type="checkbox" class="icheck" name="cheeseless" ><ins class="iCheck-helper"></ins></div>Cheese Less</label></li>
        </ul>
        </div>
        <button type="submit" class="btn btn-submit">Buy Now</button>
      </form>
    </div>

    <div class="box_style_2 hidden-xs" id="help">
      <i class="icon_lifesaver"></i>
      <h4>Need <span>Help?</span></h4>
      <a href="tel://00971543354175" class="phone">+971543354175</a>
      <small>Saturday to Thursday 9.00am - 9.00pm</small>
    </div>
  </div>

</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->



@endsection



@section('extra_modal')


@endsection



@section('extra_js')

<script src="js/jquery.sliderPro.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function( $ ) {
		$( '#Img_carousel' ).sliderPro({
			width: 960,
			height: 500,
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: false,
			smallSize: 500,
			startSlide: 0,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	});
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#delivery-date" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script>

@endsection
