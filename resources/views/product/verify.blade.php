<?php
//check if request was made with the right data
if(!isset($_GET['zxcvbnm'])){
  header("location: /");
  exit();
}else{

//set reference to a variable @ref
$reference = $_GET['zxcvbnm'];

//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$reference;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    "accept: application/json",
 "authorization: Bearer sk_live_1af32a8a5b4e45b52b9760feef141d29031913b7",
 "cache-control: no-cache"]
);


$response = curl_exec($ch);
$err = curl_error($ch);
if($err){
 // there was an error contacting the Paystack API
 die('Curl returned error: ' . $err);
}
$tranx = json_decode($response);
if(!$tranx->status){
 // there was an error from the API
 die('API returned error: ' . $tranx->message);
}
if('success' == $tranx->data->status){
 // transaction was successful...
 // please check other things like whether you already gave value for this ref
 // if the email matches the customer who owns the product etc
 // Give value
 $user_id = Auth::user()->id;
 $order_id = $_GET['lkjhgfdsa'];
 $amountr = $_GET['asdfghjkl'];
 $trans_id = $_GET['zxcvbnm'];
 $utime = date("Y-m-d H:i:s");
 $token_pay = str_random(30);
 $total_pay = DB::table('order_list')->where('id', $order_id)->first();
 $check_user = $total_pay->user_id;
 $total_pay = $total_pay->post_id;
 $total_pay = DB::table('posts')->where('id', $total_pay)->first();
 $total_pay = $total_pay->price;
 $total_pay = $total_pay*120;
 $check_token = DB::table('pay_list')->where(['order_id' => $order_id, 'trans_id' => $trans_id])->get();
 if(count($check_token) >= 1){
   header("location: /payment_receipt?pay_token=$token_pay&ygfrd5566788=$order_id&qazpo8766=$trans_id&pknjhgvfdsxzt=9ijhbg554f");
   exit();
 } else{
 DB::table('pay_list')->insert(['trans_id' => $trans_id, 'order_id' => $order_id, 'amount' => $amountr, 'updated_at' => $utime, 'created_at' => $utime, 'user_id' => $user_id]);
 $check_amount = DB::table('pay_list')->where('order_id', $order_id)->sum('amount');
if($check_amount == $total_pay){
DB::table('order_list')->where('id', $order_id)->update(['pay_id' => 0,'status' => 1, 'updated_at' => $utime]);
} else{
 DB::table('order_list')->where('id', $order_id)->update(['pay_id' => 1, 'updated_at' => $utime]);
}
$content =  "Your recent payment:::<br>This is to notify you that your recent payment of ₦$amountr for a product in your Order List is successfully received<br><a href='/payment_receipt?pay_token=$token_pay&ygfrd5566788=$order_id&qazpo8766=$trans_id&pknjhgvfdsxzt=9ijhbg554f'>Click here to see Payment Receipt</a><br>Should you have any issues? Do reach us via: <a href='mailto:support@smithronics.com'>support@smithronics.com</a><br><br>THANKYOU";
$title = "PAYMENT SUCCESSFUL (SMITHRONICS INTEGRATED ENTERPRISES)";
DB::table('messages')->insert(['sender_id' => 0, 'receiver_id' => $check_user, 'content' => $content, 'created_at' => $utime, 'title' => $title]);
 header("location: /payment_receipt?pay_token=$token_pay&ygfrd5566788=$order_id&qazpo8766=$trans_id&pknjhgvfdsxzt=9ijhbg554f");
 exit();
}
}
}
