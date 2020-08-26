@extends('master')
@section('title', 'Search Results')
@section('meta-keywords', 'Smith Ronics, Electronics & Home Appliances, Electronics, Home Appliances, Nokia, Samsung, LG, SonyEricsson, Motorola')
@section('meta-description', 'We sell Electronics & Home Appliances just for 4 months')
@section('content')

<!-- page -->
<div class="services-breadcrumb">
  <div class="agile_inner_breadcrumb">
    <div class="container">
      <ul class="w3_short">
        <li>
          <a href="/">Home</a>
          <i>|</i>
        </li>
        <li>Search Results</li>
      </ul>
    </div>
  </div>
</div>
<!-- //page -->
<!-- about page -->
<!-- tittle heading --><br>
<h3 class="tittle-w3l">Search Results
  <span class="heading-style">
    <i></i>
    <i></i>
    <i></i>
  </span>
</h3>
<!-- //tittle heading -->
<div class="container">
<?php
if(empty($post)){
  echo "<p><center><h3> Nothing found. Try to search again ! </h3></center></p>";
  ?>
  <!-- search -->
  <div class="agileits_search">
      <form method="GET" action="/search" role="search" rout="search" style="align:center;">
        {!! csrf_field()  !!}
      <input name="search" type="search" placeholder="What are you looking for?" required="">
      <button type="submit" class="btn btn-default" aria-label="Left Align">
        <span class="fa fa-search" aria-hidden="true"> </span>
      </button>
    </form>
  </div>
  <!-- //search -->
  <?php
} elseif($post>= 1){
 ?>
 <div class="container">
 <div class="row banner">
 <div class="">
 <div class="list-group">
   <?php
       foreach ($post as $key_pay) {
       ?>
       <div class="list-group-item">
             <div class="row-action-primary">
               <i class="mdi-social-person"></i>

             </div>
       <div class="row-content">
         <div class="action-secondary"> <i class="mdi-social-info"></i>
         </div>
       <p style="color:#b22222;"><b>Product name:</b> <?php echo $key_pay->title ?></p>
       <p style="color:#000000;"><b>Price: ₦<?php echo $key_pay->price ?> PER/DAY</b></p>
       <a href="/<?php echo $key_pay->slug ?>.html" class="btn btn-default btn-raised">Make Order</a>
     </div>
   </div>
   <div class="list-group-separator">
   </div>
       <?php
       }
               ?>
<hr>
     <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button><hr>
   </div>

 </div>

</div>

</div>


<?php
} else{

    echo "<p><center><h3> Nothing found. Try to search again ! </h3></center></p>";
}
 ?>
 </div>
 <!-- //about page -->




@endsection
