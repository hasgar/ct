@extends('layouts.app')



@section('meta')
  <title>Our Cakes</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="buy cake, free delivery, buy cake online, buy cake sharjah online, buy cake dubai, buy cake sharjah">
  <meta name="description" content="Buy Cakes in Dubai, Sharjah, Ajman online with free delivery">
  <meta name="author" content="CakeTree">
@endsection


@section('extra_css')

<link href="css/skins/square/grey.css" rel="stylesheet">
<link href="css/ion.rangeSlider.css" rel="stylesheet">
<link href="css/ion.rangeSlider.skinFlat.css" rel="stylesheet" >

@endsection


@section('header-class')

class="nav-top-bg"

@endsection

@section('content')
<div id="position">
    <div class="container">
        <ul>
          <li><a href="/">Home</a></li>
          <li>Dubai</li>
          <li>Cakes</li>
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
<ul class="nav nav-tabs">
                      <li class="active"><a class="cake-type-tabs" href="#normal" data-toggle="tab" aria-expanded="true"><i class=" icon-db-shape"></i> Regular Cakes</a></li>
                      <li class=""><a class="cake-type-tabs" href="#photo" data-toggle="tab" aria-expanded="false"><i class="icon-picture"></i> Photo Cakes</a></li>
                      <li class=""><a class="cake-type-tabs" href="#theme" data-toggle="tab" aria-expanded="false"><i class="icon-heart"></i> Theme Cakes</a></li>
                  </ul>

                  <div class="tab-content">
                      <div class="tab-pane active" id="normal">
                        <div class="row">

                          <div class="col-md-12">


                            <?php $count = 1;
                            foreach( $cakes as $cake )
                            {
                            if ($count%4 == 1)
                            {
                            echo '<div class="row">';
                            }
                            ?>
                            <div class="col-md-3 col-sm-3">
                              <a class="hide-this" href="{{strtolower(str_replace("-","+",str_replace(" ","+",$cake["name"])))}}-cake-{{$cake["id"]}}">{{$cake["name"]}}</a>
                                <a class="strip_list grid" href="#0" data-toggle="modal" data-target="#cake_popup" data-name="{{strtolower(str_replace("-","+",str_replace(" ","+",$cake["name"])))}}" data-price="{{$cake["amount"]}}" data-min="{{$cake["minimum_kg"]}}" data-id="{{$cake["id"]}}" data-type="normal">

                                  <div class="desc">
                                      <div class="col-md-12 cake-block">
                                          <img src="img/cakes/{{str_replace(" ","_",strtolower($cake["name"]))}}_{{$cake["id"]}}_small_1.jpg" class="img-responsive">
                                    </div>

                                    <h3 class="cake-name">{{$cake["name"]}}</h3>

                                    <div class="opening cake-price">@if ($cake["id"] == 13)<span class="old-price">125</span>@endif {{round($cake["amount"])}} AED</div>

                                  </div>
                                </a><!-- End strip_list-->
                              </div>
                            <?php
                            if ($count%4 == 0)
                            {
                            echo "</div>";
                            }
                            $count++;
                            }
                            if ($count%4 != 1) echo "</div>"; ?>




                            </div><!-- End col-md-9-->

                        </div><!-- End row -->    </div>
                      <div class="tab-pane" id="photo">
                        <div class="container margin_30">
                          <div class="main_title margin_mobile">
                                      <h2 class="nomargin_top">Make your Photo Cake</h2>
                                                    <div class="nomargin_top opening cake-price">Flavour + {{$photo_charge}} AED / Kg</div>
                                  </div>
                          <div class="row">
                              <div class="col-md-8 col-md-offset-2">
                                  <form action="/addCakeToCart" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="photo-cake-flavour" value="0" />
                                    <input type="hidden" name="type" value="photo" />
                                    <div class="row">
                                      <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <div class="col-md-6 col-sm-6 no-left-padding">
                                              <div class="form-group">
                                                <label>KG</label>
                                                  <select  class="form-control" id="kg" name="kg" autocomplete="off">
                                                    <option value="" selected disabled="">Select KG</option>
                                                    <option value="1">1</option>
                                                    <option value="1.5">1.5</option>
                                                    <option value="2">2</option>
                                                    <option value="2.5">2.5</option>
                                                    <option value="3">3</option>
                                                    <option value="3.5">3.5</option>
                                                    <option value="4">4</option>
                                                    <option value="4.5">4.5</option>
                                                    <option value="5">5</option>
                                                  </select>
                                               </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 no-right-padding">
                                              <div class="form-group">
                                                <label>Quantity</label>
                                                <select  class="form-control" id="quantity" name="quantity" autocomplete="off">
                                                  <option value="" selected disabled="">Select Quantity</option>
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
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label>Cake Flavour</label>
                                          <select type="text" class="form-control" required id="flavour" name="flavour" >
                                              <option value="" disabled selected>Select Flavour</option>
                                              @foreach ($theme_flavours as $flavour)
                                              <option value="{{$flavour["id"]}}" data-price="{{$flavour["amount"]}}">{{$flavour["name"]}} - {{$flavour["amount"]}} AED</option>
                                              @endforeach
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Message on cake</label>
                                            <textarea class="form-control" id="message" name="message" placeholder="Type your message here" autocomplete="off"></textarea>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                                          <h5>Eggless?</h5>
                                          <label><input name="eggless" type="radio" value="" class="icheck">Yes</label>
                                                            <label class="margin_left"><input name="eggless" type="radio" value="" class="icheck" checked>No</label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                                          <h5>Cheeseless?</h5>
                                          <label><input name="cheese" type="radio" value="" class="icheck" >Yes</label>
                                                            <label class="margin_left"><input name="cheese" type="radio" value="" class="icheck" checked>No</label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                                          <h5>Select your PHOTO</h5>
                                          <input name="photo" type="file" accept="image/*" required>
                                        </div>
                                      </div>
                                    </div><!-- End row  -->

                                                <hr style="border-color:#ddd;">
                                                <div class="text-center"><button class="btn_full_outline">BUY NOW</button></div>
                                  </form>
                                </div><!-- End col  -->
                            </div><!-- End row  -->
                        </div><!-- End container  -->
                        </div>
                      <div class="tab-pane" id="theme">
                        <div class="row">

                          <div class="col-md-12">


                            <?php $count = 1;
foreach( $theme_cakes as $cake )
{
  if ($count%4 == 1)
  {
       echo '<div class="row">';
  }
?>
<div class="col-md-3 col-sm-3">
    <a class="strip_list grid" href="#0" data-min="{{$cake["minimum_kg"]}}" data-toggle="modal" data-target="#cake_popup" data-name="{{strtolower(str_replace("-","+",str_replace(" ","+",$cake["name"])))}}" data-price="{{$cake["amount"]}}" data-id="{{$cake["id"]}}" data-type="theme">
        <div class="desc">
          <div class="col-md-12 cake-block">
              <img src="img/cakes/{{str_replace(" ","_",strtolower($cake["name"]))}}_{{$cake["id"]}}_small_1.jpg" class="img-responsive">
        </div>

        <h3 class="cake-name">{{$cake["name"]}}</h3>

        <div class="opening cake-price">Flavour + {{$cake["shaped_amount"]}} AED / Kg</div>

      </div>
    </a><!-- End strip_list-->
  </div>
  <?php
  if ($count%4 == 0)
  {
      echo "</div>";
  }
  $count++;
}
if ($count%4 != 1) echo "</div>"; ?>


                          </div><!-- End col-md-9-->

                        </div><!-- End row -->
                        </div>

                  </div>

</div><!-- End container -->
<!-- End Content =============================================== -->
@endsection



@section('extra_modal')

<div class="modal fade" id="cake_popup" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="/addCakeToCart" class="popup-form" id="myLogin" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="cake-id" value="0" />
          <input type="hidden" name="type" id="cake-type" value="0" />
          <select class="form-control form-white no-bottom-margin" name="flavour" id="theme-flavour">
            <option value="" disabled selected>Select Cake Flavour</option>
            @foreach ($theme_flavours as $flavour)
            <option data-price="{{$flavour["amount"]}}" value="{{$flavour["id"]}}">{{$flavour["name"]}} - {{$flavour["amount"]}} AED</option>
            @endforeach

          </select>
          <div class="col-md-6 col-sm-6 no-left-padding">
            <select  class="form-control" id="cake_kg" name="kg" autocomplete="off">
              <option value="" selected disabled="">Select KG</option>
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
              <option value="4.5">4.5</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="col-md-6 col-sm-6 no-right-padding">
            <select  class="form-control" id="quantity" name="quantity" autocomplete="off">
              <option value="" selected disabled="">Select Quantity</option>
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
					<textarea class="form-control form-white cake-msg" name="message" placeholder="Message on cake" rows="3" cols="50"></textarea>
          <div class="col-md-6 col-sm-6 no-left-padding filter_type" align="left">
          <ul class="nomargin">
							<li><label class="cake-option"><div class="icheckbox_square-grey"><input name="eggless" type="checkbox" class="icheck" ><ins class="iCheck-helper"></ins></div>Egg Less</label></li>
					</ul>
          </div>
          <div class="col-md-6 col-sm-6 no-right-padding filter_type" align="left">
          <ul class="nomargin">
							<li><label class="cake-option"><div class="icheckbox_square-grey"><input name="cheeseless" type="checkbox" class="icheck" ><ins class="iCheck-helper"></ins></div>Cheese Less</label></li>
					</ul>
          </div>
          <div class="row">
          <div class="col-md-6 col-sm-6">
  <a class="btn btn-submit view-cake-details" href="#">View Details</a>

        </div>
        <div class="col-md-6 col-sm-6">
          <button type="submit" class="btn btn-submit">Buy Now</button>
        </div>
        </div>
				</form>
			</div>
		</div>
	</div><!-- End modal -->


@endsection



@section('extra_js')

<script  src="js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>

@endsection
