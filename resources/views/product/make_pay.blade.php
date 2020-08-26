<?php
if(!Auth::check()){
header("location: /");
exit();
} else{

?>
@extends('master')
@section('title', 'Make Payment')
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
          <h3 class="agileinfo_sign">Make Payment </h3>
          <form method="post">
            <label for="">Full Name:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="{{$user_first_name}} {{$user_sur_name}}" readonly>
            </div>
            <label for="">Email Address:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="{{$user_email}}" readonly>
            </div>
            <label for="">Phone Number:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="{{$user_phone}}" readonly>
            </div>
            <label for="">Product Paying for:</label>
            <div class="styled-input agile-styled-input-top"><p style="	font-size: 14px;
              letter-spacing: 1px;
              color: #777;
              border-bottom: 1px solid #dcdcdc;
              padding: 10px 0;
              letter-spacing: 1px;"><?php echo nl2br($post_slug); ?></p>
          </div>
            <label for="">Amount to be Paid:</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="₦{{$amountr}}" readonly>
            </div>


        <button class="btn btn-primary" type="button" onclick="PayNow()">Make Payment</button>  <button class="btn btn-secondary" type="button" onclick="goBack()"><b>&lt;&lt;Go back</b></button>
          </form>
          <div class="clearfix"></div>
        </div><br>
    <h4>  <b>All payments are:</b></h4>
                    <img src="../images/images.png" alt="" width="60%">

      </div>
    </div>
    <!-- //Modal content-->
  </div>
<!-- //Modal1 -->
<!-- //signin Model -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
<script type="text/javascript">
function PayNow(){
  var handler = PaystackPop.setup({
      key: 'pk_live_4b049fb956f2022686ed3ede12d78a0bf24fb012', //put your public key here
      email: '{{$user_email}}', //put your customer's email here
      amount: "{{$amountr}}" + "00", //amount the customer is supposed to pay
      currency: "NGN",
      firstname: '{{$user_first_name}}',
      lastname: '{{$user_sur_name}}',
      metadata: {
          custom_fields: [
              {
                  display_name: "Mobile Number",
                  variable_name: "mobile_number",
                  value: "{{$user_phone}}" //customer's mobile number
              }
          ]
      },
      callback: function (response) {
          //after the transaction have been completed
          //make post call  to the server with to verify payment
          //using transaction reference as post data

                  var newLoc = "/verify_payment?qwertyuiop=mnbvcxz{{$order_id}}&lkjhgfdsa={{$order_id}}&asdfghjkl={{$amountr}}&zxcvbnm="+ response.reference;
                  window.location = newLoc;
      },
      onClose: function () {
          //when the user close the payment modal
          alert('Transaction cancelled');
      }
  });
  handler.openIframe(); //open the paystack's payment modal
}
</script>
@endsection
<?php
}
?>
