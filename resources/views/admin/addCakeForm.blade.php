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

<form action="addCake" method="POST" enctype='multipart/form-data'>
               {{ csrf_field() }}
					<div class="wrapper_indent" style="margin-top:200px">
            <div class="col-md-8" style="padding-left:0px">
						<div class="form-group">
							<label>Cake Name</label>
							<input type="text" name="name" value="" class="form-control" placeholder="Enter cake name">
						</div>
</div>
<div class="col-md-4" >
<div class="form-group">
  <label>Amount</label>
  <input type="text" name="amount" value="" class="form-control" placeholder="Enter cake amount">
</div>
</div>
<div class="col-md-4" style="padding-left:0px">
						<div class="form-group">
              <label>Is this Theme Cake?</label> <br>
              <label>
                <input type="radio" name="is_shaped" checked  class="icheck"><b>Yes</b></label>
              <label class="margin_left">
                <input type="radio" name="is_shaped" class="icheck"><b>No</b></label>

            </div>
</div>
<div class="col-md-4">
            <div class="form-group">
              <label>Is this cake available for Photo cake?</label> <br>
              <label>
                <input type="radio" name="is_photo_avail" checked="" class="icheck"><b>Yes</b></label>
              <label class="margin_left">
                <input type="radio" name="is_photo_avail"  class="icheck"><b>No</b></label>

            </div>
            </div>
<div class="col-md-4">
            <div class="form-group">
              <label>Is this cake available for Theme cake?</label> <br>
              <label>
                <input type="radio" name="is_shaped_avail"  checked  class="icheck"><b>Yes</b></label>
              <label class="margin_left">
                <input type="radio" name="is_shaped_avail" class="icheck"><b>No</b></label>

            </div>
            </div>
  						<div class="form-group">
  							<label>Description</label>
  							<input type="text" name="description" value="" class="form-control" placeholder="Enter cake description">
  						</div>


              <div class="form-group">
  							<label>Cake Image</label>
  							<input type="file" name="photos"  class="form-control" >
  						</div>

</div>
					<hr class="styled_2">

					<div class="wrapper_indent" style="padding-left:0px">
						<div class="add_more_cat"><button type="submit" class="btn_1" style="float:right">Add Cake</button></div>
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
