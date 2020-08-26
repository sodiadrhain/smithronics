<?php
if(Auth::check()){
header("location: /");
exit();
} else{

?>
@extends('master')
@section('title', 'Forgot Password')
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
          <h3 class="agileinfo_sign">Forgot Password </h3>
          <p>For any reason you cannot remember your password, a link will be sent to your email to reset it.
            <br>
            Don't have an account?
            <a href="/users/register">
              Register Now</a><br>
            Have an account with us?
              <a href="/users/login">
                Login</a>
          </p>
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
            <div class="styled-input agile-styled-input-top">
              <input type="email" placeholder="Enter Email address" name="email" id="email" required="" value="{{ old('email') }}">
            </div>
            <input type="submit" value="Reset Password">
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
