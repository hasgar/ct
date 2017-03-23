@extends('layouts.app')



@section('meta')
  <title>Admin dashboard | Free Delivery</title>
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
	<div class="container margin_60">
		<div id="tabs" class="tabs" style="
    margin-top: 160px;
">
			<nav>
				<ul>
					<li><a href="#section-1" class="icon-profile"><span>USERS</span></a>
					</li>
					<li><a href="/adminHome" class="icon-menut-items"><span>ORDERS</span></a>
					</li>
					<li><a href="/viewCakes" class="icon-users"><span>CAKES</span></a>
					</li>
				</ul>
			</nav>
			<div class="content">

				<section id="section-1">

          <div class="indent_title_in">
						<i class="icon_document_alt"></i>
						<h3>Users</h3>
						</div>

            <div class="row">

              <div class="col-md-12 col-sm-12">
                <div class="wrapper_indent">
                  <table class="table table-striped notifications">
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td style="width:5%">
                          <i class="icon_pencil-edit_alt"></i>
                        </td>
                        <td style="width:65%">
                          <B>{{$user['name']}}</B> - {{$user['phone']}}
                        </td>
                        <td style="width:35%">
                          </td>
                      </tr>
                      @endforeach


                    </tbody>
                  </table>

                </div>

              </div><!-- End row -->
            </div><!-- End wrapper_indent -->
            {{ $users->links() }}
				</section><!-- End section 1 -->

				<section id="section-2">



				</section><!-- End section 2 -->

				<section id="section-3">




            <div class="indent_title_in">
              <i class="icon_document_alt"></i>
              <h3>Users</h3>
              </div>

              <div class="row">

                <div class="col-md-12 col-sm-12">
                  <div class="wrapper_indent">
                    <table class="table table-striped notifications">
                      <tbody>



                      </tbody>
                    </table>

                  </div>

                </div><!-- End row -->
              </div><!-- End wrapper_indent -->

				</section><!-- End section 3 -->

			</div><!-- End content -->
		</div>
	</div><!-- End container  -->
	<!-- End Content =============================================== -->


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
