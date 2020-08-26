<?php
if(Auth::check()){
header("location: /");
exit();
} else{
?>
@extends('master')
@section('title', 'Change Password')
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
          <span class="fa fa-envelope-o" aria-hidden="true"></span>
        </div>
        <div class="modal_body_left modal_body_left1">
          <h3 class="agileinfo_sign">Enter New Password </h3>
          <form method="post">
            @if (session('status'))
            <p class="alert alert-success">
              {{  session('status') }}
            </p>
            @endif
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error}}</p>
            @endforeach
            {!! csrf_field() !!}
            <input type="hidden" name="email" id="email" value="<?php echo $userxe; ?>">
            <div class="styled-input">
              <input type="text" placeholder="Enter New Password for Account" name="password" required="" minlength="10" id="password">
            </div>
            <div class="styled-input">
              <input type="text" placeholder="Confirm Password" name="password_confirmation" required="" id="password_confirmation">
            </div>
            <input type="submit" value="Save Password">
          </form>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- //Modal content-->
  </div>
<!-- //Modal1 -->
<!-- //signin Model -->
@endsection

<?php

}
?>
