<?php
if(!Auth::check()){
header("location: /users/login");
exit();
} else{
  $user_id = Auth::user()->id;
  $receiver_id = $id;
  $check_token = DB::table('messages')->where(['id' => $receiver_id, 'receiver_id' => $user_id])->first();
if (!$check_token) {
  header("location: /");
  exit();
} else{
    ?>

@extends('master')
@section('title', 'View Message')
@section('content')
<br>
        <h3 class="agileinfo_sign">View Message</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">
            <?php
            $post2 = DB::table('messages')->where('id', $receiver_id)->first();
            $tas = $post2->created_at;
            $tas = strtotime($tas);
            $tas = date("M d, Y :: h:i a", $tas);
            $sender = $post2->sender_id;
            if($sender == 0){
              $sender = "noreply@smithronics.com";
            } else{
                $post3 = DB::table('users')->where('id', $sender)->first();
              $sender = "support@smithronics.com";
            }
              ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div>
                <h4 class="list-group-item-heading" style="color:#b22222;"><b><?php echo $post2->title;?></b></h4>

              <p class="btn btn-primary btn-raised">Sender: <?php echo $sender ?></p>  <a class="btn btn-default btn-raised"><b class="list-group-item-heading" style="color:#b22222;">Date Sent: <?php echo $tas; ?></b></a>
              </div>

            </div>
            <div class="list-group-separator">
            </div>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div>

                <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo nl2br($post2->content);?></b></p>
                <hr><button class="btn btn-secondary" type="button" onclick="goBack()"><b>&lt;&lt;Go back</b></button>
              </div>
            </div>

            <div class="list-group-separator">
            </div>

        </div>

      </div>

    </div>

    </div>


    @endsection
  <?php }
}
      ?>
