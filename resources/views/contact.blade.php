@extends('master')
@section('title', 'Contact Us')
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
        <li>contact Us</li>
      </ul>
    </div>
  </div>
</div>
<!-- //page -->
<!-- contact page -->
<div class="contact-w3l">
  <div class="container">
    <!-- tittle heading -->
    <h3 class="tittle-w3l">Contact Us
      <span class="heading-style">
        <i></i>
        <i></i>
        <i></i>
      </span>
    </h3>
    <!-- //tittle heading -->
    <!-- contact -->
    <div class="contact agileits">
      <div class="contact-agileinfo">
        <div class="contact-form wthree">
          <form method="post" action="">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
            <div class="alert alert-success">
              {{  session('status') }}
            </div>
            @endif
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="slug" value="<?php  $slug = uniqid();
            echo $slug;
            ?>">
            <fieldset><label for="">Full Name:</label>
            <div class="">
              <input id="name" type="text" name="name" placeholder="Your name" required="" value="<?php
              if(Auth::check()){
              $user_fname= Auth::user()->first_name;
              $user_sname= Auth::user()->sur_name;
              echo $user_fname; echo " "; echo $user_sname;
            }
               ?>">
            </div><label for="">Subject:</label>
            <div class="">
              <input id="subject" class="text" type="text" name="subject" placeholder="Subject" required="">
            </div><label for="">Email Address:</label>
            <div class="">
              <input id="email" class="email" type="email" name="email" placeholder="Email" required="" value="<?php
              if(Auth::check()){
              $user_email= Auth::user()->email;
              echo $user_email;
            }
               ?>">
            </div><label for="">Message:</label>
            <div class="">
              <textarea id="message" placeholder="Message" name="message" required=""></textarea>
            </div>
            <input type="submit" value="Submit">
          </fieldset>
        </form>
        </div>
        <div class="contact-right wthree">
          <div class="col-xs-7 contact-text w3-agileits">

            <h4>GET IN TOUCH :</h4>
            <p>
              <i class="fa fa-map-marker"></i> 34 AKA Road, Off Okokomaiko Bustop, Ojo, Lagos State.</p>
            <p>
              <i class="fa fa-phone"></i> Telephone : 080 6400 0024, 080 6411 4612</p>
              <p>
              <i class="fa fa-envelope-o"></i> Email :
              <a href="mailto:support@smithronics.com">support@smithronics.com</a>
            </p>
          </div>
          <div class="col-xs-5 contact-agile">
            <img src="images/contact2.jpg" alt="">
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
    <!-- //contact -->
  </div>
</div>

@endsection
