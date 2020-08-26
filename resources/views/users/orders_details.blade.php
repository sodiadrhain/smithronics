@extends('master')
@section('title', 'Order Details')
@section('meta-keywords', 'Smith Ronics, Electronics & Home Appliances, Electronics, Home Appliances, Nokia, Samsung, LG, SonyEricsson, Motorola')
@section('meta-description', 'We sell Electronics & Home Appliances just for 4 months')
@section('content')
<?php
if(!Auth::check()){
header("location: /users/login");
exit();
} else{
  $user_id = Auth::user()->id;
  $order_id = $id;
  $check_token = DB::table('order_list')->where(['id' => $order_id, 'user_id' => $user_id])->first();
if (!$check_token) {
  header("location: /");
  exit();
} else{
$check_order_status = DB::table('order_list')->where('id', $order_id)->first();
$post_id = $check_order_status->post_id;
$order_state = $check_order_status->delivery_state;
$order_location = $check_order_status->delivery_address;
$order_alt_phone= $check_order_status->alt_phone;
$delivery_status = $check_order_status->delivery_status;
$delivered = "in progress";
if($delivery_status == 1){
  $delivered = "delivered";
}
$check_order_pay = DB::table('pay_list')->where('order_id', $order_id)->sum('amount');

?>

<?php

if(($check_order_status->pay_id) != 0){
  $categories = DB::table('posts')->where('id', $post_id)->first();

  $pid = $categories->id;
  $cname = $categories->title;
$total_order_price = $categories->price*120;
$amount_left = $total_order_price - $check_order_pay;
  ?>
<br>
  <h3 class="agileinfo_sign">Order Details</h3>
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
        <br> <br>   <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $categories->title; ?><br> (PRICE::: ₦<?php echo $categories->price; ?> / DAY)</b></p>
<br>

      </center>
            <p class="btn btn-primary btn-raised">Order status: in progress</p> <p class="btn btn-default btn-raised">Total Amount Paid: ₦<?php echo $check_order_pay ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Balance: ₦<?php echo $amount_left ?></b></p>
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
                  <div class="modal-body modal-body-sub_agile">

                    <div class="modal_body_left modal_body_left1">
                      <center>
                      <h4 class="list-group-item-heading" style="color:#b22222;"><b>BALANCE PAYMENT</b></h4></center>
                      <form method="post" action="{{action('ProductController@order_details_post_2', $order_id)}}">
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
                          <input type="text" placeholder="Email address" name="email" required="" value="<?php echo $order_alt_phone ?>" readonly>
                        </div>
                        <label for="">Delivery Address:</label>
                        <div class="styled-input agile-styled-input-top"> <div style="	font-size: 14px;
                    			letter-spacing: 1px;
                    			color: #777;
                    			border-bottom: 1px solid #dcdcdc;
                    			padding: 10px 0;
                    			letter-spacing: 1px;"><?php echo nl2br($order_location); ?></div><br>
                      </div>
                        <label for="">Delivery State:</label>
                        <div class="styled-input agile-styled-input-top">
                          <input type="text" placeholder="Email address" name="email" required="" value="<?php echo $order_state ?>" readonly>
                        </div>
                        <?php
                        $pprice=$categories->price;
                        $amount=0;
                        $purl=$categories->slug;


                        $wpay=$pprice*7;
                        $mpay=$pprice*30;
                        $allpay=$pprice*120;

                         ?>
                        <label for="">Amount to Balance:</label>
                        <div class="styled-input agile-styled-input-top">
                        <select name="amount" class="btn btn-primary btn-raised" onchange="payFunction()" id="paySelect" required>
<?php
if($amount_left<=$wpay){

  ?>
  <option value="0">     Choose a Payment to pay now</option>
  <option value="<?php  echo $amount_left; ?>">At once payment == ₦<?php  echo $amount_left; ?></option>
  <?php
}elseif($amount_left<=$mpay){
   ?>
   <option value="0">     Choose a Payment to pay now</option>
   <option value="<?php  echo $wpay; ?>">A week payment == ₦<?php  echo $wpay; ?></option>
   <option value="<?php  echo $amount_left; ?>">At once payment == ₦<?php  echo $amount_left; ?></option>
   <?php
} else{ ?>
  <option value="0">     Choose a Payment to pay now</option>
  <option value="<?php  echo $wpay; ?>">A week payment == ₦<?php  echo $wpay; ?></option>
  <option value="<?php  echo $mpay; ?>">A month payment == ₦<?php  echo $mpay; ?></option>
  <option value="<?php  echo $amount_left; ?>">At once payment == ₦<?php  echo $amount_left; ?></option>
<?php  }
 ?>


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
                          <input type="hidden" name="order_id" value="<?php echo $order_id?>">
                          <input type="hidden" name="post_slug" value="<?php echo $cname?>">
                          <input type="hidden" name="user_first_name" value="<?php echo $user_first_name?>">
                          <input type="hidden" name="user_sur_name" value="<?php echo $user_sur_name?>">
                    <button class="btn btn-primary btn-raised" type="submit">Pay Balance</button>  <button class="btn btn-secondary" type="button" onclick="goBack()"><b>&lt;&lt;Go back</b></button>
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
        <h4 class="list-group-item-heading" style="color:#b22222;"><b>PAYMENT HISTORY</b></h4></center><br>
        <?php
        $check_order_payments = DB::table('pay_list')->where('order_id', $order_id)->latest()->get();
if (count($check_order_payments)==0){?>
  <center>
  <h4 class="list-group-item-heading" style="color:#b22222;"> You currently have not made any payments</h4></center>
<?php
} else{
foreach ($check_order_payments as $key_pay) {
  $tas = $key_pay->created_at;
  $tas = strtotime($tas);
  $tas = date("M d, Y :: h:i a", $tas);
  $token_pay = str_random(30);
  $trans_id = $key_pay->trans_id;
?>
<p class="btn btn-default btn-raised">Amount Paid: ₦<?php echo $key_pay->amount ?></p>
 <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Date paid: <?php echo $tas ?></b></p>
<a href="/payment_receipt?pay_token=<?php echo $token_pay  ?>&ygfrd5566788=<?php echo $order_id  ?>&qazpo8766=<?php echo $trans_id ?>&pknjhgvfdsxzt9ijhbg554f" class="btn btn-primary btn-raised">View payment receipt</a>
<hr>
<?php
}}
        ?>
      </div>
    </div>
    <div class="list-group-separator">
    </div>
      </div>

    </div>

  </div>

  </div>

<?php

} elseif(($check_order_status->status) == 1){
  $categories = DB::table('posts')->where('id', $post_id)->first();

  $pid = $categories->id;
  $cname = $categories->title;
$total_order_price = $categories->price*120;
$amount_left = $total_order_price - $check_order_pay;

  ?>
<br>
  <h3 class="agileinfo_sign">Order Details</h3>
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
        <br>   <br> <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $categories->title; ?><br> (PRICE::: ₦<?php echo $categories->price; ?> / DAY)</b></p>
<br>

      </center>
            <p class="btn btn-primary btn-raised">Order status: completed</p> <p class="btn btn-default btn-raised">Total Amount Paid: ₦<?php echo $check_order_pay ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Balance: ₦<?php echo $amount_left ?></b></p>
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
        <br>  <center>
          <h4 class="list-group-item-heading" style="color:#b22222;"><b>DELIVERY INFORMATION</b></h4></center>
          <!-- signin Model -->
          <!-- Modal1 -->
                <div class="modal-body modal-body-sub_agile">

                  <div class="modal_body_left modal_body_left1">
                    <form method="post">
                      <label for="">Full Name:</label>
                      <div class="styled-input agile-styled-input-top">
                        <input type="text" placeholder="Email address" name="email" required="" value="<?php
                        $user_name = Auth::user()->first_name.' '.Auth::user()->sur_name;
                        echo $user_name;
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
                        <input type="text" placeholder="Email address" name="email" required="" value="<?php echo $order_alt_phone ?>" readonly>
                      </div>
                      <label for="">Delivery Address:</label>
                      <div class="styled-input agile-styled-input-top"> <div style="	font-size: 14px;
                        letter-spacing: 1px;
                        color: #777;
                        border-bottom: 1px solid #dcdcdc;
                        padding: 10px 0;
                        letter-spacing: 1px;"><?php echo nl2br($order_location); ?></div><br>
                    </div>
                      <label for="">Delivery State:</label>
                      <div class="styled-input agile-styled-input-top">
                        <input type="text" placeholder="Email address" name="email" required="" value="<?php echo $order_state ?>" readonly>
                      </div>
                      <p class="btn btn-default btn-raised">Delivery within Lagos : 2 days</p>   <p class="btn btn-default btn-raised">Delivery outside Lagos : 3 to 7 days</p>
                      <hr>
  <p class="btn btn-default btn-raised">Delivery status: <b style="color:#b22222;"><?php echo $delivered ?></b> </p>   <p class="btn btn-default btn-raised"> <a href="/contact"><b>Contact us to track delivery</a></b></p>
                    </form>

                  </div>
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
        <h4 class="list-group-item-heading" style="color:#b22222;"><b>PAYMENT HISTORY</b></h4></center><br>
        <?php
        $check_order_payments = DB::table('pay_list')->where('order_id', $order_id)->latest()->get();
if (count($check_order_payments)==0){?>
  <center>
  <h4 class="list-group-item-heading" style="color:#b22222;"> You currently have not made any payments</h4></center>
<?php
} else{
foreach ($check_order_payments as $key_pay) {
  $tas = $key_pay->created_at;
  $tas = strtotime($tas);
  $tas = date("M d, Y :: h:i a", $tas);
  $token_pay = str_random(30);
  $trans_id = $key_pay->trans_id;
?>
<p class="btn btn-default btn-raised">Amount Paid: ₦<?php echo $key_pay->amount ?></p>
 <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Date paid: <?php echo $tas ?></b></p>
<a href="/payment_receipt?pay_token=<?php echo $token_pay  ?>&ygfrd5566788=<?php echo $order_id  ?>&qazpo8766=<?php echo $trans_id ?>&pknjhgvfdsxzt9ijhbg554f" class="btn btn-primary btn-raised">View payment receipt</a>
<hr>
<?php
}}
        ?>
      </div>
    </div>
    <div class="list-group-separator">
    </div>
      </div>

    </div>

  </div>

  </div>
<?php
  } else{

    $categories = DB::table('posts')->where('id', $post_id)->first();

    $pid = $categories->id;
    $cname = $categories->title;
  $total_order_price = $categories->price*120;
  $amount_left = $total_order_price - $check_order_pay;
    ?>
  <br>
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
          <br>  <br>  <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $categories->title; ?><br> (PRICE::: ₦<?php echo $categories->price; ?> / DAY)</b></p>
        </center>
              <p class="btn btn-primary btn-raised">Order status: pending</p>
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
                            <input type="text" placeholder="Enter full address to deliver items" value="" name="delivery_address" required="" id="delivery_address" minlength="10">
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
                            <input type="hidden" name="order_id" value="<?php echo $order_id?>">
                            <input type="hidden" name="post_slug" value="<?php echo $cname?>">
                            <input type="hidden" name="user_first_name" value="<?php echo $user_first_name?>">
                            <input type="hidden" name="user_sur_name" value="<?php echo $user_sur_name?>">
                      <button class="btn btn-secondary" type="button" onclick="goBack()"><b>&lt;&lt;Go back</b></button>  <button class="btn btn-primary btn-raised" type="submit">Proceed to Make Payment <span class="fa fa-hand-o-right" aria-hidden="true"></span></button>
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
        </div>

      </div>

    </div>

    </div>

 <?php
 }
}
}
 ?>
 @endsection
