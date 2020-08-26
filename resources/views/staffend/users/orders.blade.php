@extends('master-admin')
@section('title', 'User Order list')
@section('content')
<br>
        <h3 class="agileinfo_sign">{{ $user->first_name }}'s Order List</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">
            <?php
            $posts2 = DB::table('order_list')->where('user_id', $id)->latest()->paginate(10);

            if (count($posts2) == 0){
              ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div><center>
                <h4 class="list-group-item-heading" style="color:#b22222;"> This user currently have not made any orders</h4></center>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
            } else{
              $posts3 = DB::table('order_list')->where('user_id', $id)->first();

            foreach ($posts2 as $post2){
            $as2 = $post2->post_id;
          $order_id = $post2->id;
            $posteds2 = DB::table('posts')->where('id', $as2)->get();
            foreach ($posteds2 as $posted2){
              $new_post_id = $posted2->id;
              $check_order_status = DB::table('order_list')->where('id', $order_id)->first();
              $order_status = "pending";
              if(($check_order_status->status) == 1){
                $order_status = "completed";
              } else{
                if(($check_order_status->pay_id) == 1){
                  $order_status = "in progress";
                }
              }
                ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div>

                <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $posted2->title; ?><br> (PRICE::: ₦<?php echo $posted2->price; ?> / DAY)</b></p>


                <a href="/<?php       echo $posted2->slug; ?>.html" class="btn btn-default btn-raised">View product</a>    <p class="btn btn-primary btn-raised">Order status: <?php echo $order_status; ?></p>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
            }
          }
            }
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
