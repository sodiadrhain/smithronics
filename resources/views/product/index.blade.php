@extends('master')
@section('title', 'View Product')
@section('content')

<?php
$categories = DB::table('posts')->where('slug', $slug)->first();
$pid = $categories->id;
$cname = $categories->title;
$categoriesx = DB::table('category_post')->where('post_id', $pid)->first();
$relapostid = $categoriesx->category_id;
?>


<div class="services-breadcrumb">
  <div class="agile_inner_breadcrumb">
    <div class="container">
      <ul class="w3_short">
        <li>
          <a href="/">Home</a>
          <i>|</i>
        </li>
        <li>
<?php
echo   $cname;
 ?>


        </li>
      </ul>
    </div>
  </div>
</div><br><br>
  <h3 class="agileinfo_sign">VIEW PRODUCT</h3>
<div class="container">
<div class="row banner">
<div class="">
<div class="list-group">
          <div class="list-group-item">
                <div class="row-action-primary">
                  <i class="mdi-social-person"></i>

                </div>
          <div class="row-content">
            <div class="action-secondary"> <i class="mdi-social-info"></i>
            </div>  <center>
          			<div class="thumb-image" style="width:300px;">
    <div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
	<li data-thumb="<?php echo $categories->image1; ?>"><br>
								<div class="thumb-image">
									<img src="<?php echo $categories->image1; ?>" alt="<?php echo $categories->title; ?>" class="img-responsive" width =""> </div>
							</li>
							<li data-thumb="<?php echo $categories->image2; ?>">
								<div class="thumb-image">
									<img src="<?php echo $categories->image2; ?>" alt="<?php echo $categories->title; ?>" class="img-responsive" width =""> </div>
							</li>
							<li data-thumb="<?php echo $categories->image3; ?>">
								<div class="thumb-image">
									<img src="<?php echo $categories->image3; ?>" alt="<?php echo $categories->title; ?>"  class="img-responsive" width =""> </div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
      </div>
 <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $categories->title; ?><br> (PRICE::: ₦<?php echo $categories->price; ?> PER/DAY)</b></p>
<br>

      </center>
      <a href="/checkout/<?php
 echo $categories->slug;
   echo '.html';
   ?>" class="btn btn-primary btn-raised">Goto Checkout</a> <p class="btn btn-default btn-raised">Total Cost of Product: ₦<?php echo $categories->price*120; ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Product is Available</b></p>
          </div>
        </div>
        <div class="list-group-separator">
        </div>
        <div class="list-group-item">
              <div class="row-action-primary">
                <i class="mdi-social-person"></i>

              </div>
        <div class="row-content">
          <div class="action-secondary"> <i class="mdi-social-info"></i>
          </div>
            <!-- signin Model -->
            <!-- Modal1 -->
                  <div class="">

                    <div class="modal_body_left modal_body_left1"><br>
                      <center>
                      <h4 class="list-group-item-heading" style="color:#b22222;"><b>PRODUCT INFORMATION</b></h4><br> </center>
                      <form method="post" action="">

                        <label for="">Product Name:</label>
                        <div class="styled-input agile-styled-input-top">
                          <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;"><?php echo nl2br($categories->title); ?></div>    <br>
                        </div>
                        <label for="">Product Description:</label>
                        <div class="styled-input agile-styled-input-top">
                          <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;"><?php echo nl2br($categories->content); ?></div> <br>
                        </div>
                        <label for="">Payment Structure:</label>
                        <div class="styled-input agile-styled-input-top">
                          <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;">₦<?php
                                echo   $categories->price;
                                 ?> PER/DAY FOR 4 MONTHS</div> <br>
                        </div>
                        <div class="styled-input agile-styled-input-top">
                      <p class="btn btn-default btn-raised">Delivery within Lagos : 2 days</p>   <p class="btn btn-default btn-raised">Delivery outside Lagos : 3 to 7 days</p>
                      <hr>
                    </div>
                          <button class="btn btn-secondary" type="button" onclick="goBack()"><b>&lt;&lt;Go back</b></button>  <a href="/checkout/<?php
                      echo $categories->slug;
                        echo '.html';
                        ?>" class="btn btn-primary btn-raised"> Place Order Now </a>

                      </form>
                      <div class="clearfix"></div>
                    </div><br>
                <!-- //Modal content-->
              </div>
            <!-- //Modal1 -->
            <!-- //signin Model -->
        </div>
      </div>
      <div class="list-group-separator">
      </div>
      <div class="list-group-item">
            <div class="row-action-primary">
              <i class="mdi-social-person"></i>

            </div>
      <div class="row-content">
        <div class="action-secondary"> <i class="mdi-social-info"></i>
        </div><br> <center>
        <h4 class="list-group-item-heading" style="color:#b22222;"><b>COMMENT SECTION</b></h4></center><br>
@if ($comments->isEmpty())
  <center>
  <h4 class="list-group-item-heading" style="color:#b22222;"> There are no comments yet! Be the first to add one below</h4></center>

  @else
  <?php
  $coms = DB::table('comments')->where('post_id', $pid)->get();
  foreach ($coms as $com){
  $as = $com->content;
  $uas = $com->user_id;
  $tas = $com->created_at;
  $tas = strtotime($tas);
  $tas = date("M d, Y :: h:i a", $tas);
  $ucoms = DB::table('users')->where('id', $uas)->get();
  ?>
  <?php
  foreach ($ucoms as $uucom){
  $uuas = $uucom->sur_name;
  $uuasa = $uucom->first_name;
  $uuasid = $uucom->id;

  ?>
<a class="btn btn-default btn-raised" href="{!! action('UsersController@view', $uuasid) !!}"><b><?php echo $uuas; echo " "; echo $uuasa; ?></b></a>
 <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Date: <?php echo $tas ?></b></p><br><br>
<b> <?php echo nl2br($as) ?></b>

<hr>
<?php
}}
        ?>
        @endif
        <form class="form-horizontal" action="/comment" method="post">
          @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
          @if(session('status'))
          <div class="alert alert-success">
          {{ session('status')}}
          </div>
          @endif
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="post_id" value="<?php
        echo   $pid;
        ?>">
        <input type="hidden" name="post_type" value="site\Post">
        <input type="hidden" name="user_id" value="<?php
          if ($user = Auth::user()) {
        $user_id = Auth::user()->id;
          echo $user_id; }
         ?>">
         <?php
         if ($user = Auth::user()) {
         echo '<br>
           <textarea class= "form-control" name="content" rows="3" id="content" placeholder="Type your comment here..."></textarea>
           <br><button class="btn btn-primary btn-raised" type="submit">Add Comment</button>';
         } else{
           ?>
           <br><center>
           <a href="{{ '../users/login' . '?previous=' . Request::fullUrl() }}" class="btn btn-primary btn-raised"><b><span class="fa fa-unlock-alt" aria-hidden="true"></span> Log In </a> to add your comment!</b></a>
</center>
             <?php
         }
          ?>
     </form>
      </div>
      </div>
      <div class="list-group-separator">
      </div>
      </div>

      </div>

      </div>

      </div>
    <div class="clearfix"></div>


<?php //-- Very simple variant
$useragent = $_SERVER['HTTP_USER_AGENT'];
$iPod = stripos($useragent, "iPod");
$iPad = stripos($useragent, "iPad");
$iPhone = stripos($useragent, "iPhone");
$Android = stripos($useragent, "Android");
$iOS = stripos($useragent, "iOS");
$webOS = stripos($useragent, "webOS");
$Blackberry = stripos($useragent, "Blackberry");
$IEMobile= stripos($useragent, "IEMobile");
//-- You can add billion devices

$DEVICE = ($iPod||$iPhone||$Android||$iOS||$webOS||$Blackberry||$IEMobile);

if ($DEVICE !=true) {?>

<br><br>
<!-- special offers -->
<div class="featured-section" id="">
  <div class="container">
    <!-- tittle heading -->
    <h3 class="agileinfo_sign"><u>More Products</u></h3>
        <div class="content-bottom-in">
          <ul id="flexiselDemo1">
<?php
    $postsr = DB::table('category_post')->where('category_id', $relapostid)->orderByRaw('RAND()')->take(10)->get();
    foreach ($postsr as $postr){
    $asr = $postr->post_id;
    $postedsr = DB::table('posts')->where('id', $asr)->get();
    foreach ($postedsr as $postedr){
    ?>

        <li>
          <div class="w3l-specilamk">
            <div class="speioffer-agile">
                <a href="<?php       echo $postedr->slug; ?>.html">
                <img src="<?php echo $postedr->image1; ?>" alt="" width="220" height="200">
              </a>
            </div>
            <div class="product-name-w3l">
              <h4>
    <a href="<?php       echo $postedr->slug; ?>.html"><center><?php   echo substr($postedr->title,0,25); ?></center></a>
              </h4>
              <div class="w3l-pricehkj"><center>
                <h6>₦ <?php   echo $postedr->price; ?></h6></center>
              </div>
              <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                  <fieldset>
                  <a href="<?php       echo $postedr->slug; ?>.html" class="">  <input type="submit" name="submit" value="Order Now" class="button" /></a>
                  </fieldset>

              </div>
            </div>
          </div>
        </li>
        <?php
            }
            }
             ?>
      </ul>
    </div>
  </div>
</div>
<!-- //special offers -->
  <?php
            } else{
             ?>
 <br>
  <div class="container">
  <div class="row banner">
  <div class="">
  <div class="list-group">

    <div class="list-group-item">
          <div class="row-action-primary">
            <i class="mdi-social-person"></i>

          </div>
    <div class="row-content">
      <div class="action-secondary"> <i class="mdi-social-info"></i>
      </div><center>

                  <h3 class="heading-tittle">
  MORE PRODUCTS</h3>
  </center>

    </div>
  </div>
  <div class="list-group-separator">
  </div>


    <?php
    $postsr = DB::table('category_post')->where('category_id', $relapostid)->orderByRaw('RAND()')->take(10)->get();
    foreach ($postsr as $postr){
    $asr = $postr->post_id;
    $postedsr = DB::table('posts')->where('id', $asr)->get();
    foreach ($postedsr as $postedr){

    ?>

            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div><center>
  <img src="<?php echo $postedr->image1; ?>" alt="<?php echo $postedr->title; ?>" width="75%">
          <br> <br>   <p class="list-group-item-heading" ><b><a style="color:#000000;" href="/<?php
   echo $postedr->slug;
     echo '.html';
     ?>"><?php echo $postedr->title; ?></a><br> <font style="color:#b22222;">(PRICE::: ₦<?php echo $postedr->price; ?> PER/DAY)</font></b></p>
  <br>

        </center>
        <a href="/<?php
   echo $postedr->slug;
     echo '.html';
     ?>" class="btn btn-primary btn-raised">Make Order</a> <p class="btn btn-default btn-raised">Total Cost of Product: ₦<?php echo $postedr->price*120; ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Product is Available</b></p>
            </div>
          </div>
          <div class="list-group-separator">
          </div>
  <?php  }
  } ?>


  </div>
  </div>
  </div>
  </div>


 <?php
            }
             ?>
@endsection
