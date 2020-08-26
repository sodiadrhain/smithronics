<?php
if(!Auth::check()){
header("location: /users/login");
exit();
} else{
  if ($user = Auth::user()) {
   $user_id = Auth::user()->id;}
    ?>

@extends('master')
@section('title', 'Messages')
@section('content')
<br>
        <h3 class="agileinfo_sign">Messages</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">
            <?php
            $posts2 = DB::table('messages')->where('receiver_id', $user_id)->latest()->get();

            if (count($posts2) == 0){
              ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div><center>
                <h4 class="list-group-item-heading" style="color:#b22222;"> You currently have no messages</h4></center>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
            } else{

            foreach ($posts2 as $post2){

                ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div>

                <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $post2->title;?></b></p>


              <a href="{!! action('UsersController@inbox_read', $post2->id) !!}" class="btn btn-default btn-raised">Read message</a> 
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
            }
}
            ?>
        </div>

      </div>

    </div>

    </div>


    @endsection
  <?php }
      ?>
