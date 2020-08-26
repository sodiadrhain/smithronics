@extends('master-admin')
@section('title', 'All Products')
@section('content')
<br>
        <h3 class="agileinfo_sign">All Products</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">
        <center>
        <form method="GET" action="{!! action('Staff\PostsController@search') !!}" role="search" rout="search">
          {!! csrf_field()  !!}
        <input name="search" type="search" placeholder="Search products by name" required="">
        <button type="submit" class="btn btn-default" aria-label="Left Align">
          <span class="fa fa-search" aria-hidden="true"> </span>
        </button>
      </form><br>
      </center>
      <?php
      if($post>=1){
      ?>
      <div class="container">
      <div class="row banner">
      <div class="">
      <div class="list-group">

      <div class="list-group-item">
           <div class="row-action-primary">
             <i class="mdi-social-person"></i>

           </div>
      <div class="row-content">
       <div class="action-secondary"> <i class="mdi-social-info"></i>
       </div><center>
                   <b class="heading-tittle">
      SEARCH RESULTS</b>
      </center>

      </div>
      </div>
      <div class="list-group-separator">
      </div>
      <?php
      foreach ($post as $key_pay1){
        $tas1 = $key_pay1->created_at;
        $uas1 = $key_pay1->user_id;
        $posts31 = DB::table('users')->where('id', $uas1)->first();
        $tas1 = strtotime($tas1);
        $tas1 = date("M d, Y :: h:i a", $tas1);
      ?>
      <div class="list-group-item">
            <div class="row-action-primary">
              <i class="mdi-social-person"></i>

            </div>
      <div class="row-content">
        <div class="action-secondary"> <i class="mdi-social-info"></i>
        </div>
      <p style="color:#b22222;"><b>Product name:</b> <?php echo $key_pay1->title ?></p>
      <p style="color:#000000;"><b>Product ID: <?php echo $key_pay1->id ?></b></p>
      <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Date added: <?php echo $tas1 ?></b></p>    <p class="btn btn-default btn-raised"><b>BY: <?php echo $posts31->first_name; echo " "; echo $posts31->sur_name; ?></b></p>
      <a href="/<?php echo $key_pay1->slug ?>.html" class="btn btn-default btn-raised">View Product</a>
      <a href="{!! action('Staff\PostsController@edit', $key_pay1->id) !!}" class="btn btn-default btn-raised">Edit Product</a>
      <?php
      echo '  </div>
      </div>
      <div class="list-group-separator">
      </div>';
      }
      ?>

      </div>
      </div>
      </div>
      </div>
      <?php
      echo  "<br><br> ";
      }
      ?>
            <?php
            $posts2 = DB::table('posts')->latest()->paginate(10);

            if (count($posts2) == 0){
              ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div><center>
                <h4 class="list-group-item-heading" style="color:#b22222;"> There are no products uploaded yet.</h4></center>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
            } else{
            foreach ($posts2 as $key_pay) {
              $tas = $key_pay->created_at;
              $uas = $key_pay->user_id;
              $posts3 = DB::table('users')->where('id', $uas)->first();
              $tas = strtotime($tas);
              $tas = date("M d, Y :: h:i a", $tas);
            ?>
            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div>
            <p style="color:#b22222;"><b>Product name:</b> <?php echo $key_pay->title ?></p>
            <p style="color:#000000;"><b>Product ID: <?php echo $key_pay->id ?></b></p>
            <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Date added: <?php echo $tas ?></b></p>    <p class="btn btn-default btn-raised"><b>BY: <?php echo $posts3->first_name; echo " "; echo $posts3->sur_name; ?></b></p>
            <a href="/<?php echo $key_pay->slug ?>.html" class="btn btn-default btn-raised">View Product</a>
            <a href="{!! action('Staff\PostsController@edit', $key_pay->id) !!}" class="btn btn-default btn-raised">Edit Product</a>
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
