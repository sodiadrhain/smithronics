
<!-- top-header -->
<div class="header-most-top">
  <p>Electronics, Home Appliances, Food items and Provisions paid for in 1 or 4 months and more</p>
</div>
<!-- //top-header -->
<!-- header-bot-->
<div class="header-bot">
  <div class="header-bot_inner_wthreeinfo_header_mid">
    <!-- header-bot-->
    <div class="col-md-4 logo_agile">

        <a href="/">
          <span>   	<br></span>

        <img src="/images/smith-logo-3.png" alt=" ">
        </a>

    </div>
    <!-- header-bot -->
    <div class="col-md-8 header">
      <!-- header lists -->
      <ul>
            <li>
              <?php
              $user_id = Auth::user()->id;
              $posts4 = DB::table('messages')->where(['status' => 0, 'receiver_id' => $user_id])->get();
              if(count($posts4) != 0){
                $inbox_count = count($posts4);
                $display_inbox_count = "(".$inbox_count.")";
              } else{
                $display_inbox_count ="(0)";
              }
               ?>
              <a href="{{action('UsersController@inbox')}}">
                <span class="fa fa-envelope-o" aria-hidden="true"></span>Inbox <?php echo $display_inbox_count; ?></a>
            </li>
                <li>
                  <?php
                  $user_id = Auth::user()->id;
                  $posts3 = DB::table('order_list')->where(['status' => 0, 'user_id' => $user_id])->get();
                  if(count($posts3) != 0){
                    $orders_count = count($posts3);
                    $display_orders_count = "(".$orders_count.")";
                  } else{
                    $display_orders_count ="";
                  }
                   ?>
                  <a href="{{action('ProductController@orders')}}">
                    <span class="fa fa-file-text-o" aria-hidden="true"></span>Order List <?php echo $display_orders_count; ?></a>
                </li>
        <li>
          <span class="fa fa-phone" aria-hidden="true"></span>0806 400 0024
        </li>
        @if (Auth::check())
          @if (Auth::user()->hasRole('manager'))
        <li>
          <a href="/admin">
            <span class="fa fa-user" aria-hidden="true"></span> Admin panel </a>
        </li>
        @else
        @if (Auth::user()->hasRole('staff'))
        <li>
          <a href="/staff">
            <span class="fa fa-user" aria-hidden="true"></span> Staff Panel </a>
        </li>
      @endif
      @endif
        <li>
          <a href="/users/logout">
            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Log Out </a>
        </li>

        @else
        <li>
          <a href="/users/login">
            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Log In </a>
        </li>
        <li>
          <a href="/users/register">
            <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Register </a>
        </li>
        @endif
      </ul>
      <!-- //header lists -->
      <!-- search -->
      <div class="agileits_search">
      <form method="GET" action="/search" role="search" rout="search">
            {!! csrf_field()  !!}
          <input name="Search" type="search" placeholder="What are you looking for?" required="" name="q">
          <button type="submit" class="btn btn-default" aria-label="Left Align">
            <span class="fa fa-search" aria-hidden="true"> </span>
          </button>
        </form>
      </div>
      <!-- //search -->
      <!-- cart details -->
      <div class="top_nav_right">
        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
          <form action="#" method="post" class="last">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="display" value="1">
            <button class="w3view-cart" type="submit" name="submit" value="">
              <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
      <!-- //cart details -->
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<!-- //header-bot -->
<!-- navigation -->
<div class="ban-top">
  <div class="container">

    <div class="top_nav_left"><b>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav menu__list">
              <li class="">
                <a class="nav-stylehead" href="/">HOME
                  <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="dropdown">
                <a href="/electronics-home-appliances">ELECTRONICS & HOME APPLIANCES
                                    </a>

              </li>
              <li class="dropdown">
                <a href="/food-items-provisions">FOOD ITEMS & PROVISIONS
                                    </a>
              </li>
                            <li class="">
                              <a class="nav-stylehead" href="/testimonials">TESTIMONIALS</a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href="/about">ABOUT US</a>
                              </li>
                              <li></li>
                              <li></li>
                              <li></li><li></li>
                          </ul>
          </div>
        </div>
      </nav></b>
    </div>
  </div>
</div>
<!-- //navigation -->
