<!-- Header ================================================== -->

<div class="container nav-pc">
    <div class="row">

      <div class="col-md-5 col-sm-5 col-xs-5 margin-top-40 nav-pc">
        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
        <div class="main-menu">
            <div id="header_menu">
                <img src="img/logo.png" alt="" data-retina="true">
            </div>
            <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
             <ul>

                    <li><a href="/about-us"><i class="icon-star-filled"></i> About</a></li>

                <li><a href="/contact-us"><i class="icon-phone-squared"></i> Contact</a></li>
                <li><a href="/cakes"><i class="icon-heart"></i> Our Cakes</a></li>

            </ul>
        </div><!-- End main-menu -->
      </div>
        <div class="col-md-2 col-sm-2 col-xs-2 " align="center">
            <a href="/" id="logo">
            <img src="img/caketree_logo.png" alt="caketree logo" data-retina="true" class="hidden-xs center-logo margin-top-13 img-responsive">
            <img src="img/logo_mobile.png" alt="caketree logo" data-retina="true" class="margin-top-7 hidden-lg hidden-md hidden-sm">
            </a>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5 margin-top-40" align="left">
        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
        <div class="main-menu float-none">
            <div id="header_menu">
                <img src="img/logo.png" alt="" data-retina="true">
            </div>
            <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>

             <ul>
               <li class="submenu">
               <a href="javascript:void(0);" class="show-submenu"><i class="icon-cart"></i> Cart<i class="icon-down-open-mini"></i></a>
               <ul>
                 <li><a>{{ CartController::getTotalAmount() }} AED ({{ CartController::getCount() }} items)</a></li>
                 @if (CartController::getCount() > 0)
                 <li><a href="/checkout" class="checkout-link"><i class="icon-right-big"></i> Checkout</a></li>
                 @endif
                 </ul>
               </li>
               @if (Auth::check())
               <li class="submenu">
               <a href="javascript:void(0);" class="show-submenu"><i class="icon-user-1"></i> {{ strlen(Auth::user()->name) > 20 ? substr(Auth::user()->name, 0, 18).".." : Auth::user()->name  }}<i class="icon-down-open-mini"></i></a>
               <ul>
                 <li><a href="/orders"><i class="icon-docs-1"></i>Your Orders</a></li>
                 <li><a href="/logout"><i class="icon-logout-2"></i> Logout</a></li>
                   </ul>
               </li>

               @else
               <li><a href="#Login" data-toggle="modal" data-target="#login"><i class="icon-login-2"></i> Login</a></li>
               <li><a href="#Register" data-toggle="modal" data-target="#register"><i class="icon-user-1"></i> Register</a></li>
               @endif


            </ul>
        </div><!-- End main-menu -->
      </div>
    </div><!-- End row -->
</div><!-- End container -->

<div class="container nav-mob">
  <div class="row">
      <div class="col--md-4 col-sm-4 col-xs-4">
          <a href="/" id="logo">
            <img src="img/logo.png" alt="caketree logo" data-retina="true" class="hidden-xs margin-top-13">
          <img src="img/logo_mobile.png" alt="caketree logo" data-retina="true" class="margin-top-7 hidden-lg hidden-md hidden-sm">
          </a>
      </div>
      <nav class="col--md-8 col-sm-8 col-xs-8">
      <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
      <div class="main-menu">
          <div id="header_menu">
              <img src="img/logo.png" alt="" data-retina="true">
          </div>
          <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
           <ul>

             <li><a href="/cakes"><i class="icon-heart"></i> Our Cakes</a></li>
             @if (Auth::check())
             <li class="submenu">
             <a href="javascript:void(0);" class="show-submenu"><i class="icon-user-1"></i> {{ Auth::user()->name }}<i class="icon-down-open-mini"></i></a>
             <ul>
               <li><a href="/orders"><i class="icon-docs-1"></i>Your Orders</a></li>
               <li><a href="/logout"><i class="icon-logout-2"></i> Logout</a></li>
                 </ul>
             </li>
             @else
             <li><a href="#Login" data-toggle="modal" data-target="#login"><i class="icon-login-2"></i> Login</a></li>
             <li><a href="#Register" data-toggle="modal" data-target="#register"><i class="icon-user-1"></i> Register</a></li>
             @endif
              <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu"><i class="icon-cart"></i> Cart<i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a>109 AED ({{ CartController::getCount() }} item)</a></li>
                  </ul>
              </li>
              @if (CartController::getCount() > 0)
              <li><a href="/checkout" class="checkout-link-mob"><i class="icon-right-big"></i> Checkout</a></li>
              @endif

              <li><a href="/about-us"><i class="icon-star-filled"></i> About Us</a></li>
              <li><a href="/contact-us"><i class="icon-phone-squared"></i> Contact Us</a></li>

          </ul>
      </div><!-- End main-menu -->
      </nav>
  </div><!-- End row -->
</div><!-- End container -->


</header>
<!-- End Header =============================================== -->
