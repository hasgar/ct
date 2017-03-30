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

<form action="addSlider" method="POST" enctype='multipart/form-data'>
               {{ csrf_field() }}
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
          <div class="form-group">
							<label>Slider Title</label>
							<input type="text" name="title" value="" class="form-control" placeholder="Enter slider title">
						</div>
            <div class="form-group">
                <label>Slider Description</label>
                <input type="text" name="description" value="" class="form-control" placeholder="Enter slider description">
              </div>

              <div class="form-group">
  							<label>Slider Image</label>
  							<input type="file" name="image"  class="form-control" >
  						</div>

</div>
					<hr class="styled_2">

					<div class="wrapper_indent" style="padding-left:0px">
						<div class="add_more_cat"><button type="submit" class="btn_1" style="float:right">Add Slider</button></div>
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



  }
</script>

@endsection
