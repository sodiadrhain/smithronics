
<?php
//check if request was made with the right data


//set reference to a variable @ref
$reference = $_GET['reference'];

echo $reference;


//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$reference;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    "accept: application/json",
 "authorization: Bearer sk_test_9371ab5fb7f745850350618fc837f71fb90b92c3",
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
 echo "<h2>Thank you for making a purchase. Your file has bee sent your email.</h2>";
}
