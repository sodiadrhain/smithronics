@extends('master')
@section('title', 'Checkout')
@section('content')

<?php
$categories = DB::table('posts')->where('slug', $slug)->first();
$pid = $categories->id;
$cname = $categories->title;
$categoriesx = DB::table('category_post')->where('post_id', $pid)->first();
$relapostid = $categoriesx->category_id;
?>

<?php
if(isset($_GET["_token"])){
    $user_id = Auth::user()->id;
    $utime = date("Y-m-d H:i:s");
     $post_id = $pid;
  $check_token = DB::table('order_list')->where(['post_id' => $pid, 'user_id' => $user_id])->get();
  if(count($check_token) >= 1){
    header("location: /");
    alert()->success('Check Order Lists', 'Item Already Saved')->persistent('Close');
  } else{

  DB::table('order_list')->insert(['user_id' => $user_id, 'post_id' => $post_id, 'created_at' => $utime]);
  header("location: /");
  alert()->success('', 'Item Saved')->persistent('Close');
}
}

 ?>
<div class="services-breadcrumb">
  <div class="agile_inner_breadcrumb">
    <div class="container">
      <ul class="w3_short">
        <li>
          <a href="/">Home</a>
          <i>|</i>
        <li>
<?php
echo '<a href="/';
echo $categories->slug;
echo '.html">';
echo   $cname;
echo '</a>';
 ?>
        </li>
      </ul>
    </div>
  </div>
</div>
<br><br>
  <h3 class="agileinfo_sign">Checkout</h3>
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
<img src="<?php echo $categories->image1; ?>" alt="<?php echo $categories->title; ?>" width="60%">
        <br>  <br>  <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $categories->title; ?><br> (PRICE::: ₦<?php echo $categories->price; ?> PER/DAY)</b></p>
      </center>
          </div>
        </div>
        <div class="list-group-separator">
        </div>

        <?php
        if (!$user = Auth::user()) {
            ?>
            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div><center>
              <h4 class="list-group-item-heading" style="color:#b22222;"> You are not logged in, Please  <a href="{{ '../users/login' . '?previous=' . Request::fullUrl() }}" class="btn btn-primary btn-raised"><span class="fa fa-unlock-alt" aria-hidden="true"></span> Log In </a> to proceed with your order</h4></center>
            </div>
          </div>
          <div class="list-group-separator">
          </div>      </div>
            </div>

            </div>

            </div><br>
          <?php
          } else{
        ?>
        <div class="list-group-item">

        <div class="row-content">

            <!-- signin Model -->
            <!-- Modal1 -->
                  <div class="modal-body modal-body-sub_agile">

                    <div class="modal_body_left modal_body_left1">
                      <center>
                      <h4 class="list-group-item-heading" style="color:#b22222;"><b>CONFIRM / UPDATE DELIVERY INFORMATION</b></h4> <br> </center>
                      <form method="post">
                              {!! csrf_field()  !!}
                              @foreach ($errors->all() as $error)
                              <p class="alert alert-danger">{{ $error}}</p>
                              @endforeach
                        <label for="">Full Name:</label>
                        <div class="styled-input agile-styled-input-top">
                          <input type="text" placeholder="Email address" name="email" required="" value="<?php
                          $user_name = Auth::user()->first_name.' '.Auth::user()->sur_name;
                          echo $user_name;
                          ?>" readonly>
                        </div>
                        <label for="">Email Address:</label>
                        <div class="styled-input agile-styled-input-top">
                          <input type="text" placeholder="Email address" name="email" required="" value="<?php
                          $email = Auth::user()->email;
                          echo $email;
                          ?>" readonly>
                        </div>
                        <label for="">Phone Number:</label>
                        <div class="styled-input agile-styled-input-top">
                          <input type="text" placeholder="Email address" name="user_phone" required="" value="<?php
                          $phone = Auth::user()->phone;
                          echo $phone;
                          ?>" readonly>
                        </div>
                        <label for="">Alternate Phone Number:</label>
                        <div class="styled-input agile-styled-input-top">
                          <input type="text" placeholder="Enter an alternative phone number" name="alt_phone" required="" id="alt_phone" minlength="11" maxlength="11">
                        </div>
                        <label for="">Delivery Address:</label>
                        <div class="styled-input agile-styled-input-top">
                          <input type="text" placeholder="Enter full address to deliver this product" value="" name="delivery_address" required="" id="delivery_address" minlength="10">
                      </div>
                        <label for="">Delivery Address (State):</label>
                        <div class="styled-input agile-styled-input-top">
                          <select class="btn btn-primary btn-raised" name="delivery_state" id="delivery_state" required>
                       <option value="Abia">Abia</option>
                       <option value="Adamawa">Adamawa</option>
                       <option value="Akwa Ibom">Akwa Ibom</option><option value="Anambra">Anambra</option><option value="Bauchi">Bauchi</option><option value="Bayelsa">Bayelsa</option><option value="Benue">Benue</option><option value="Borno">Borno</option><option value="Cross River">Cross River</option><option value="Delta">Delta
                       </option>
                       <option value="Ebonyi">Ebonyi</option>
                       <option value="Edo">Edo</option><option value="Ekiti">Ekiti</option><option value="Enugu">Enugu</option><option value="Gombe">Gombe</option><option value="Imo">Imo</option><option value="Jigawa">Jigawa</option><option value="Kaduna">Kaduna</option><option value="Kano">Kano
                       </option>
                       <option value="Katsina">Katsina</option>
                       <option value="Kebbi">Kebbi</option><option value="Kogi">Kogi</option><option value="Kwara">Kwara</option><option value="Lagos">Lagos</option><option value="Nasarawa">Nasarawa</option><option value="Niger">Niger</option><option value="Ogun">Ogun</option><option value="Ondo">Ondo
                       </option>
                       <option value="Osun">Osun</option>
                       <option value="Oyo">Oyo</option><option value="Plateau">Plateau</option><option value="Rivers">Rivers</option><option value="Sokoto">Sokoto</option><option value="Taraba">Taraba</option><option value="Yobe">Yobe</option><option value="Zamfara">Zamfara</option><option value="Abuja">Abuja</option>
                </select>
              </div><br>
                        <div class="controls">
                          <select name="delivery_address_type" class="btn btn-primary btn-raised" id="delivery_address_type" required>
                            <option>Select Address type</option>
                            <option>Office</option>
                            <option>Home</option>
                            <option>Commercial</option>

                          </select>
                        </div>
                        <?php
                        $pprice=$categories->price;
                        $amount=0;
                        $purl=$categories->slug;


                        $wpay=$pprice*7;
                        $mpay=$pprice*30;
                        $allpay=$pprice*120;

                         ?><br>
                        <label for="">Amount to Pay:</label>
                        <div class="styled-input agile-styled-input-top">
                        <select name="amount" class="btn btn-primary btn-raised" onchange="payFunction()" id="paySelect" required>
  <option value="0">     Choose a Payment to pay now</option>
  <option value="<?php  echo $wpay; ?>">A week payment == ₦<?php  echo $wpay; ?></option>
  <option value="<?php  echo $mpay; ?>">A month payment == ₦<?php  echo $mpay; ?></option>
  <option value="<?php  echo $allpay; ?>">At once payment == ₦<?php  echo $allpay; ?></option>
                        </select>
                      </div>
                      <p>
                            <b><p id="demo"></p>
                              <script type="text/javascript">
                              function payFunction(){
                                var x = document.getElementById("paySelect").value;
                                document.getElementById("demo").innerHTML = "                  <h4>Payable Amount == ₦" + x; + "</h4>"
                              }
                            </script></b></p>
                            <?php   $user_id = Auth::user()->id;
                              $post_id = $pid;
                              $user_email = Auth::user()->email;
                              $user_first_name = Auth::user()->first_name;
                              $user_sur_name = Auth::user()->sur_name;
                          ?>
                              <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                              <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                          <input type="hidden" name="user_email" value="<?php echo $user_email?>">
                          <input type="hidden" name="post_slug" value="<?php echo $cname?>">
                          <input type="hidden" name="user_first_name" value="<?php echo $user_first_name?>">
                          <input type="hidden" name="user_sur_name" value="<?php echo $user_sur_name?>"> <div style="	font-size: 14px;
                                                       letter-spacing: 1px;
                                                       color: #777;
                                                       border-bottom: 1px solid #dcdcdc;
                                                       padding: 10px 0;
                                                       letter-spacing: 1px;"><b>
                          <input type="checkbox" required>Please confirm you have read our <a href="/terms" target="_blank">terms and conditions</a> before you proceed to make payment!</b>
                                                      </div><br>
                    <button class="btn btn-secondary" type="button" onclick="goBack()"><b>&lt;&lt;Go back</b></button>
<?php
$activated = Auth::user()->activated;
  if($activated == 1){
 ?>
 <button class="btn btn-primary btn-raised" type="submit">Proceed to Make Payment <span class="fa fa-hand-o-right" aria-hidden="true"></span></button>
  </form>
  <form class="" action="" method="get">
      {!! csrf_field()  !!}
          <button type = "submit" class="submit check_out">Save Item for Later <span class="fa fa-bookmark-o" aria-hidden="true"></span></button>   </form>
<?php
} else {
  ?>
</form><br>
<p><b style="color:#b22222;">
<span class="fa fa-unlock-alt" aria-hidden="true"></span> This Account is not yet activated, so you cannot make payment for this order; Please</b> <a href="/contact" style="color:#000000;"><b>Contact Us!!! </b></a><b style="color:#b22222;">for more information.</b></p>
  <?php
}
 ?>

                    </div>
                <!-- //Modal content-->
              </div>
            <!-- //Modal1 -->
            <!-- //signin Model -->
        </div>
      </div>
    <div class="list-group-separator">
    </div>
      </div>

    </div>

  </div>

  </div>

<?php

}
 ?>

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
<br>
  <!-- special offers -->
  <div class="featured-section" id="projects">
    <div class="container">
      <!-- tittle heading -->
  <h3 class="agileinfo_sign"><u>More Products</u></h3>

          <div class="content-bottom-in">
            <ul id="flexiselDemo1">
  <?php
      $postedsr = DB::table('posts')->take(10)->orderByRaw('RAND()')->get();
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
      $postedsr = DB::table('posts')->take(10)->orderByRaw('RAND()')->get();
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
  <?php
  } ?>


  </div>
  </div>
  </div>
  </div>


 <?php
            }
             ?>


@endsection
