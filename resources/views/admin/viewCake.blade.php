@extends('layouts.app')



@section('meta')
  <title>Admin dashbord | Free Delivery</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

@endsection



@section('extra_css')

<link href="css/skins/square/grey.css" rel="stylesheet">
<link href="css/admin.css" rel="stylesheet">
<link href="css/bootstrap3-wysihtml5.min.css" rel="stylesheet">
<link href="css/dropzone.css" rel="stylesheet">

@endsection


@section('header-class')

class="nav-top-bg"

@endsection

@section('content')



	<!-- Content ================================================== -->
	<div class="container margin_60"  style="background-color: white;">


				<section id="section-2">

          <form action="editCake" method="POST" enctype='multipart/form-data'>
                         {{ csrf_field() }}
                         <input type="hidden" name="cake_id" value="{{$cake['id']}}">
					<div class="wrapper_indent" style="margin-top:200px">
            @if (count($errors) > 0)
            <blockquote class="styled">
            <ul class="error_points">
            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
              </blockquote>
              @endif
            <div class="col-md-8" style="padding-left:0px">
						<div class="form-group">
							<label>Cake Name</label>
							<input type="text" name="name" value="{{$cake['name']}}" class="form-control" placeholder="Enter cake name">
						</div>
</div>
<div class="col-md-4" >
<div class="form-group">
  <label>Amount</label>
  <input type="text" name="amount" id="amount" data-shaped="{{$cake['shaped']}}" value="@if($cake['is_shaped'] == "1") 35 @else {{$cake['amount']}} @endif" @if($cake['is_shaped'] == "1") readonly="readonly" @endif class="form-control" placeholder="Enter cake amount">
</div>
</div>
<div class="col-md-4" style="padding-left:0px">
						<div class="form-group">
              <label>Is this Theme Cake?</label> <br>
              <label>
                <input type="radio"  id="is_shaped" value="1" name="is_shaped" @if($cake['is_shaped'] == 1) checked @endif class="icheck is_shaped"><b>Yes</b></label>
              <label class="margin_left">
                <input type="radio"  id="is_shaped" value="0" name="is_shaped" @if($cake['is_shaped'] != 1) checked @endif  class="icheck is_shaped"><b>No</b></label>

            </div>

</div>
<div class="col-md-4">
            <div class="form-group">
              <label>Is this cake available for Photo cake?</label> <br>
              <label>
                <input type="radio" name="is_photo_avail" value="1"  @if($cake['is_photo_avail'] == 1) checked @endif class="icheck"><b>Yes</b></label>
              <label class="margin_left">
                <input type="radio" name="is_photo_avail" value="0" @if($cake['is_photo_avail'] != 1) checked @endif  class="icheck"><b>No</b></label>

            </div>
            </div>
<div class="col-md-4">
            <div class="form-group">
              <label>Is this cake available for Theme cake?</label> <br>
              <label>
                <input type="radio" name="is_shaped_avail" value="1" @if($cake['is_shaped_avail'] == 1) checked @endif class="icheck"><b>Yes</b></label>
              <label class="margin_left">
                <input type="radio" name="is_shaped_avail"  value="0" @if($cake['is_shaped_avail'] != 1) checked @endif  class="icheck"><b>No</b></label>

            </div>
            </div>
            <div class="col-md-8" style="padding-left:0px">
  						<div class="form-group">
  							<label>Description</label>
  							<input type="text" name="description" value="{{$cake['description']}}" class="form-control" placeholder="Enter cake description">
  						</div>
              </div>
              <div class="col-md-4" style="padding-right:0px">
    						<div class="form-group">
    							<label>Minimum KG</label>
    							<select name="minimum_kg" class="form-control" >
                    <option value="{{$cake['minimum_kg']}}">{{$cake['minimum_kg']}} KG</option>
                    <option value="1">1 KG</option>
                    <option value="2">2 KG</option>
                    <option value="3">3 KG</option>
                    <option value="4">4 KG</option>
                    <option value="5">5 KG</option>
                    <option value="6">6 KG</option>
                    <option value="7">7 KG</option>
                    <option value="8">8 KG</option>
                    <option value="9">9 KG</option>
                    <option value="10">10 KG</option>
                  </select>
    						</div>
                </div>
<div class="row">
              <div class="col-md-4">
              <div class="form-group">
              <img width="200" src="img/cakes/<?php echo str_replace(" ","_",strtolower($cake['name']))."_".$cake['id']."_small_1.jpg"; ?>" />

              </div></div>

              <div class="col-md-8">
              <div class="form-group">
  							<label>Change Image</label>
  							<input type="file" name="photos"  class="form-control" >
  						</div></div>
            </div>

</div>
					<hr class="styled_2">

					<div class="wrapper_indent" style="padding-left:0px">
						<div class="add_more_cat"><button type="submit" class="btn_1" style="float:right">Update</button>  </div>
					</div><!-- End wrapper_indent -->

				<!-- End section 2 -->

</div>
</section>

</div>
@endsection



@section('extra_modal')


@endsection



@section('extra_js')

<script src="js/tabs.js"></script>
<script>
  new CBPFWTabs(document.getElementById('tabs'));
</script>

<script src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript">
  $('.wysihtml5').wysihtml5({});
</script>
<script src="js/dropzone.min.js"></script>
<script>
  if ($('.dropzone').length > 0) {
    Dropzone.autoDiscover = false;
    $("#photos").dropzone({
      url: "upload",
      addRemoveLinks: true
    });

    $("#logo_picture").dropzone({
      url: "upload",
      maxFiles: 1,
      addRemoveLinks: true
    });

    $(".menu-item-pic").dropzone({
      url: "upload",
      maxFiles: 1,
      addRemoveLinks: true
    });
  }
</script>

@endsection
