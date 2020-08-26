@extends('master')
@section('title', 'Checkout')
@section('content')

<?php
$categories = DB::table('posts')->where('slug', $slug)->first();
$pid = $categories->id;
$cname = $categories->title;

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

  <!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
      <!-- tittle heading -->
      <h3 class="tittle-w3l">      Payment

        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->
      <div class="checkout-right">
  				<h4>Your shopping cart contains:
  					<span>1 Product</span>   <?php
            if (!$user = Auth::user()) {echo ' :: <span>( Please <a href="../users/login">
           <span class="fa fa-unlock-alt" aria-hidden="true"></span> <b>Log In</b> </a> to proceed with your order!)</span>'; }   ?>
  				</h4>
  				<div class="table-responsive">
  					<table class="timetable_sub">
  						<thead>
  							<tr>
  								<th>Product Details</th>
  							</tr>
  						</thead>
  						<tbody>
  							<tr class="rem1">
  								<td class="invert-image">
  									<center>	<img src="<?php
                      echo $categories->image1;
                       ?>" alt="<?php
                       echo $categories->title;
                        ?>" class="img-responsive" width="60%"></center>
                        <br>
                        <p> <b>Item Name::: </b> <?php
                        echo $categories->title;
                         ?></p>
                            <p> <b>Item Description::: </b>
                        <?php
                          echo $categories->content;
                         ?></p>
                             <p> <b>Price (4months)::: </b>₦
                         <?php
                         echo $categories->price;
                          ?></p>
  								</td>
  							</tr>
  						</tbody>
  					</table>
  				</div>
  			</div>

        <?php
        if ($user = Auth::user()) {
          ?>
        <div class="checkout-left">
  				<div class="address_form_agile">

                  <h4>Payment Structure</h4>
                  <?php
                  $pprice=$categories->price;
                  $amount=0;
                  $purl=$categories->slug;


                  $wpay=$pprice*7;
                  $mpay=$pprice*30;
                  $allpay=$pprice*120;

                   ?>

                  <?php
                  if(isset($_GET['pay'])){
                  $getpay=$_GET['pay'];
                  if($getpay=='week'){
                    $amount=$wpay;
                  } elseif($getpay=='month'){
                    $amount=$mpay;
                  } elseif($getpay=='all'){
                    $amount=$allpay;
                  } else{
                    $amount=0;
                  }}

                   ?>

              <div class="controls option-w3ls">
                       Choose a Payment to pay now
                       <p><a href="<?php echo $purl;echo '.html?pay=week'; ?>">Weekly == ₦<?php  echo $wpay; ?></a></p>
                       <p><a href="<?php echo $purl;echo '.html?pay=month'; ?>">Monthly == ₦<?php  echo $mpay; ?></a></p>
                       <p>    <a href="<?php echo $purl;echo '.html?pay=all'; ?>"> At once == ₦<?php echo $allpay; ?></a>
                   </div>
                  <div class="w3_agileits_card_number_grid_right">
                    <div class="controls">
                      <b><input type="text" placeholder="Amount Due == ₦<?php echo $amount; ?>" name="address" required=""></b>
                    </div>
                  </div>
  					<div class="checkout-right-basket">
  						<a href="payment.html">Make Payment Now
  							<span class="fa fa-hand-o-right" aria-hidden="true"></span>
  						</a>
  					</div>
  				</div>

          <?php
        } else{
          echo '<br><br><center><h4> <b> Please <a href="../users/login">
          <span class="fa fa-unlock-alt" aria-hidden="true"></span> Log In </a> to proceed with your order!</b></h4></center>';
        }
         ?>
  			</div>
  		</div>
  	</div>
  	<!-- //checkout page -->
		</div>
	</div>
	<!-- //Single Page -->
@endsection
