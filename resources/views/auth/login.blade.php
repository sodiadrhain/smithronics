<?php
if(Auth::check()){
header("location: /");
exit();
} else{

?>
@extends('master')
@section('title', 'Login')
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
          <h3 class="agileinfo_sign">Log In </h3>
          @if (session('status'))
          <div class="alert alert-success">
            {{  session('status') }}
          </div>
          @endif
          <p>
            Sign In now, to start Shopping. <br>
            Don't have an account?
            <a href="/users/register">
              Register Now</a><br>
              Didn't get verification email?
              <a href="{!! action('RegistrationController@re_confirm_1') !!}">
                Resend E-mail</a><br>
                Can't Login?
                <a href="{!! action('PasswordController@show') !!}">
                  Forgot password</a>
          </p>
          <form method="post">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error}}</p>
            @endforeach
            {!! csrf_field() !!}
            @if (Request::has('previous'))
            <input type="hidden" name="previous" value="{{ Request::get('previous')}}">
            @else
              <input type="hidden" name="previous" value="{{ URL::previous()}}">
              @endif
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Email address" name="email" required="" value="{{ old('email') }}">
            </div>
            <div class="styled-input">
              <input type="password" placeholder="Password" name="password" required="">
            </div>
            <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Remember Me?</label>
          </div>
            <input type="submit" value="Log In">
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
