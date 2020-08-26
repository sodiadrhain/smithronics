@extends('master-admin')
@section('title', 'User Payments')
@section('content')
<br>
        <h3 class="agileinfo_sign">{{ $user->first_name }}'s Payments</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">
            <?php
            $posts2 = DB::table('pay_list')->where('user_id', $id)->latest()->paginate(10);

            if (count($posts2) == 0){
              ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div><center>
                <h4 class="list-group-item-heading" style="color:#b22222;"> This user currently have not made any payments</h4></center>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
            } else{
            foreach ($posts2 as $key_pay) {
              $tas = $key_pay->created_at;
              $tas = strtotime($tas);
              $tas = date("M d, Y :: h:i a", $tas);
              $token_pay = str_random(30);
              $trans_id = $key_pay->trans_id;
            ?>
            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div>
              <?php
              $posts3 = DB::table('order_list')->where('id', $key_pay->order_id)->first();
              $posts3 = DB::table('posts')->where('id', $posts3->post_id)->first();
               ?>
            <p style="color:#b22222;"><b>Product name:</b> <?php echo $posts3->title ?></p>
            <p style="color:#000000;"><b>Order ID: <?php echo $key_pay->order_id ?></b></p>
            <p class="btn btn-default btn-raised">Amount Paid: ₦<?php echo $key_pay->amount ?></p>
             <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Date paid: <?php echo $tas ?></b></p>
            <p class="btn btn-default btn-raised"><b>Transaction ID: <?php echo $key_pay->trans_id ?></b></p>
          </div>
        </div>
        <div class="list-group-separator">
        </div>
            <?php
            }}
                    ?>


            <?php
            $pagecheck = $posts2->render();
          if(!empty($pagecheck)){?>
            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div>
                <h4>Pages:</h4><?php  echo $posts2->render(); ?>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
          <?php } ?><hr>
          <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button><hr>
        </div>

      </div>

    </div>

    </div>


    @endsection
