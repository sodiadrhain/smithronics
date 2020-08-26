<?php
if(!Auth::check()){
header("location: /");
exit();
} elseif(!isset($_GET['ygfrd5566788'])){
  header("location: /");
  exit();
}
 else{
$order_id = $_GET['ygfrd5566788'];
$trans_id = $_GET['qazpo8766'];
 $check_token_2 = DB::table('pay_list')->where(['order_id' => $order_id, 'trans_id' => $trans_id])->get();
 if (count($check_token_2)==0) {
   header("location: /");
   exit();
 } else{
 $check_token = DB::table('pay_list')->where(['order_id' => $order_id, 'trans_id' => $trans_id])->first();
 $amount_paid = $check_token->amount;
 $tas = $check_token->created_at;
 $tas = strtotime($tas);
 $tas = date("M d, Y :: h:i a", $tas);
?>
@extends('master')
@section('title', 'Payment Receipt')
@section('meta-keywords', 'Smith Ronics, Electronics & Home Appliances, Electronics, Home Appliances, Nokia, Samsung, LG, SonyEricsson, Motorola')
@section('meta-description', 'We sell Electronics & Home Appliances just for 4 months')
@section('content')
<!-- signin Model -->
<!-- Modal1 -->
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body modal-body-sub_agile">
        <div class="main-mailposi">
          <span class="fa glyphicon glyphicon-refresh" aria-hidden="true"></span>
        </div>
        <div class="modal_body_left modal_body_left1">
          <h3 class="agileinfo_sign">SMITHRONICS PAYMENT RECEIPTS </h3>
<?php

if (isset($_GET['pknjhgvfdsxzt'])) {
  ?>

  <p class="alert alert-success">
Payment was successfully made, a receipt of your transaction has been sent to your email.
  </p>

  <?php  }
  ?>
          <p>Transaction Details</p>
          <form method="post">
            <label for="">Reference:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="<?php echo $trans_id ?>" readonly>
            </div>
            <label for="">Date:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="<?php echo $tas ?>" readonly>
            </div>
            <label for="">Amount paid:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="₦<?php echo $amount_paid ?>" readonly>
            </div>
            <label for="">Order Id:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="<?php echo $order_id ?>" readonly>
            </div>
            <label for="">Status:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="::SUCCESSFUL::" readonly>
            </div>
          </form>
          <div class="clearfix"></div>
        </div><br>
<h4>  <b> Thankyou:  </b></h4>
                    <img src="../images/smith-logo-3.png" alt="" width="60%">
                    <br><br>
                <form class="" action="" method="">
                  <h4>  <b>  <input type="button" name="" value="Print Receipt" onclick="window.print()">  </b></h4>
                </form>
      </div>
    </div>
    <!-- //Modal content-->
  </div>
<!-- //Modal1 -->
<!-- //signin Model -->
@endsection
<?php
}
}
?>
