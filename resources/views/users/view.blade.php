<?php
if(!Auth::check()){
header("location: /");
exit();
} else{
  if ($user = Auth::user()) {
   $user_id = Auth::user()->id;}
    ?>

@extends('master')
@section('title', 'View Profile')
@section('content')
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
        <h3 class="agileinfo_sign">{{  $post->first_name }}'s Profile</h3>
        <form method="">
          <img src="{{  $post->image }}" alt="" width="200" height="220"><br><br>
          <label for="">Surname</label>
          <div class="styled-input agile-styled-input-top">
            <input type="text" placeholder="Surname" id="sur_name" name="sur_name" required="" value="{{  $post->sur_name }}" minlength="3" readonly>
          </div>
          <label for="">Firstname</label>
          <div class="styled-input">
            <input type="text" placeholder="First Name" name="first_name" required="" id="first_name" value="{{  $post->first_name }}" minlength="3"readonly>
          </div><label for="">Other Names</label>
          <div class="styled-input">
            <input type="text" placeholder="First Name" name="first_name" required="" id="first_name" value="{{  $post->other_name }}" minlength="3"readonly>
          </div>
          <label for="">State of Origin</label>
          <div class="styled-input">
            <input type="text" placeholder="First Name" name="first_name" required="" id="first_name" value="{{  $post->state_of_origin }}" minlength="3"readonly>
          </div>
          <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button>
        </form>

      </div>
    </div>
  </div>
  <!-- //Modal content-->
</div>

@endsection
<?php }
    ?>
