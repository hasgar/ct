<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
  @yield('meta')

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
<meta name="google-site-verification" content="nMmm05VwyjReL2FIfWUO-m3YM8jdG9lJcYpn-NT-lDw" />
    <!-- GOOGLE WEB FONT -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Great+Vibes%7CBuda:300%7CCinzel" media="all">
    <!-- BASE CSS -->
    <link href="css/base_2.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('extra_css')
</head>

<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

	<div id="preloader">
        <div class="sk-spinner sk-spinner-wave" id="status">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div><!-- End Preload -->
<header @yield('header-class')>
    @include('layouts.header')

    @yield('content')


    <!-- Footer ================================================== -->
    <footer class="no-top-padding">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="http://www.facebook.com/caketreeuae" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="http://www.instagram.com/caketree.uae" target="_blank"><i class="icon-instagram"></i></a></li>
                    </ul>
                    <p>
                        © CakeTree 2017
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    </footer>
    <!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="/login" method="POST" class="popup-form" id="myLogin">
           {{ csrf_field() }}
                	<div class="login_icon"><i class="icon_lock_alt"></i></div>
					<input type="text" class="form-control form-white" name="email" placeholder="Email">
					<input type="password" class="form-control form-white" name="password" placeholder="Password">
					<!-- <div class="text-left">
						<a href="#">Forgot Password?</a>
					</div> -->
					<button type="submit" class="btn btn-submit">Login</button>
				</form>
			</div>
		</div>
	</div><!-- End modal -->

<!-- Register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="/register" method="POST" class="popup-form" id="myRegister">
           {{ csrf_field() }}
                	<div class="login_icon"><i class="icon_lock_alt"></i></div>
					<input type="text" class="form-control form-white" placeholder="Full Name" name="name">
                    <input type="email" class="form-control form-white" name="email" placeholder="Email">
                    <input type="password" class="form-control form-white" name="password" placeholder="Password"  id="password1">
                    <input type="text" class="form-control form-white" name="password_confirmation" placeholder="Confirm password"  id="password2">
                    <div id="pass-info" class="clearfix"></div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="accept_2" id="check_2" name="check_2" />
							<label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Register</button>
				</form>
			</div>
		</div>
	</div><!-- End Register modal -->

  @yield('extra_modal')

<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<script src="assets/validate.js"></script>
<script src="js/custom.js"></script>

@yield('extra_js')
</body>
</html>
