if(($check_order_status->pay_id) != 0){
  $categories = DB::table('posts')->where('id', $post_id)->first();

  $pid = $categories->id;
  $cname = $categories->title;
$total_order_price = $categories->price*120;
$amount_left = $total_order_price - $check_order_pay;
  ?>
<br>
  <h3 class="agileinfo_sign">VIEW PRODUCT</h3>
<div class="container">
<div class="row banner">
<div class="col-md-12">
<div class="list-group">
          <div class="list-group-item">
                <div class="row-action-primary">
                  <i class="mdi-social-person"></i>

                </div>
          <div class="row-content">
            <div class="action-secondary"> <i class="mdi-social-info"></i>
            </div><center>
<img src="<?php echo $categories->image1; ?>" alt="<?php echo $categories->title; ?>" width="60%">
        <br> <br>   <p class="list-group-item-heading" style="color:#b22222;"><b><?php echo $categories->title; ?><br> (PRICE::: ₦<?php echo $categories->price; ?> / DAY)</b></p>
<br>

      </center>
            <p class="btn btn-primary btn-raised">Goto Checkout</p> <p class="btn btn-default btn-raised">Total Cost of Product: ₦<?php echo $categories->price*120; ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Product is Available</b></p>
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
            <!-- signin Model -->
            <!-- Modal1 -->
                  <div class="modal-body modal-body-sub_agile">

                    <div class="modal_body_left modal_body_left1">
                      <center>
                      <h4 class="list-group-item-heading" style="color:#b22222;"><b>PRODUCT INFORMATION</b></h4></center>
                      <form method="post" action="">
                        <label for="">Product Name:</label>
                        <div class="styled-input agile-styled-input-top">
                          <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;"><?php echo nl2br($categories->title); ?></div>    <br>
                        </div>
                        <label for="">Product Description:</label>
                        <div class="styled-input agile-styled-input-top">
                          <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;"><?php echo nl2br($categories->title); ?></div> <br>
                        </div>
                        <label for="">Payment Structure:</label>
                        <div class="styled-input agile-styled-input-top">
                          <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;">₦ <?php
                                echo   $categories->price;
                                 ?> PER/DAY FOR 4 MONTHS</div> <br>
                        </div>
                        <div class="styled-input agile-styled-input-top">
                          <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;">	<i class="fa fa-hand-o-right" aria-hidden="true"></i>There is no refund of money</div><br>
                        </div>
                        <div class="styled-input agile-styled-input-top">   <div style="	font-size: 14px;
                            letter-spacing: 1px;
                            color: #777;
                            border-bottom: 1px solid #dcdcdc;
                            padding: 10px 0;
                            letter-spacing: 1px;">		<i class="fa fa-refresh" aria-hidden="true"></i>No product is
                  						<label>returnable</div><br>
                      </div>
                      <p class="btn btn-default btn-raised">Delivery within Lagos : 2 days</p>   <p class="btn btn-default btn-raised">Delivery outside Lagos : 3 to 7 days</p>
                      <hr>
                      <a href="/checkout/<?php
                      echo $categories->slug;
                        echo '.html';
                        ?>">  <button class="btn btn-primary btn-raised" type="submit">Order Now</button> </a> <button class="btn btn-secondary" type="button" onclick="goBack()"><b>&lt;&lt;Go back</b></button>
                      </form>
                      <div class="clearfix"></div>
                    </div><br>
                <!-- //Modal content-->
              </div>
            <!-- //Modal1 -->
            <!-- //signin Model -->
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
        </div><br> <center>
        <h4 class="list-group-item-heading" style="color:#b22222;"><b>COMMENT SECTION</b></h4></center><br>
@if ($comments->isEmpty())
  <center>
  <h4 class="list-group-item-heading" style="color:#b22222;"> There are no comments yet! Be the first to add one below</h4></center>
  @else
  <?php
  $coms = DB::table('comments')->where('post_id', $pid)->get();
  foreach ($coms as $com){
  $as = $com->content;
  $uas = $com->user_id;
  $tas = $com->created_at;
  $tas = strtotime($tas);
  $tas = date("M d, Y :: h:i a", $tas);
  $ucoms = DB::table('users')->where('id', $uas)->get();
  ?>
  <div class="well well bs-component">
      <div class="content">
      <p style="margin:20px;"><label>
  <?php
  foreach ($ucoms as $uucom){
  $uuas = $uucom->sur_name;
  $uuasa = $uucom->first_name;
  $uuasid = $uucom->id;

  ?>
<p class="btn btn-default btn-raised"><?php echo $uuas; echo $uuasa; ?></p>
 <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Date: <?php echo $tas ?></b></p><br>
 <p class="btn btn-default btn-raised"><?php echo nl2br($as) ?></p>
<a href="/payment_receipt?pay_token=<?php echo $token_pay  ?>&ygfrd5566788=<?php echo $order_id  ?>&qazpo8766=<?php echo $trans_id ?>&pknjhgvfdsxzt9ijhbg554f" class="btn btn-primary btn-raised">View payment receipt</a>
<hr>
<?php
}}
        ?>
      </div>
    </div>
    <div class="list-group-separator">
    </div>
        @endif
      </div>

    </div>

  </div>

  </div>

<?php

}


<!-- //Comment Section -->
<div class="well well bs-component">
  <form class="form-horizontal" action="/comment" method="post">
    @foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if(session('status'))
    <div class="alert alert-success">
    {{ session('status')}}
    </div>
    @endif
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="post_id" value="<?php
echo   $pid;
 ?>">
 <input type="hidden" name="post_type" value="site\Post">
  <input type="hidden" name="user_id" value="<?php
    if ($user = Auth::user()) {
  $user_id = Auth::user()->id;
    echo $user_id; }
   ?>">
<fieldset>
  <legend><b>Comment Section</b></legend>
  @if ($comments->isEmpty())
  <p> There are no comments yet! Be the first to add one below.</p>
  @else
  <?php
  $coms = DB::table('comments')->where('post_id', $pid)->get();
  foreach ($coms as $com){
  $as = $com->content;
  $uas = $com->user_id;
  $tas = $com->created_at;
  $tas = strtotime($tas);
  $tas = date("M d, Y :: h:i a", $tas);
  $ucoms = DB::table('users')->where('id', $uas)->get();
  ?>
  <div class="well well bs-component">
      <div class="content">
      <p style="margin:20px;"><label>
  <?php
  foreach ($ucoms as $uucom){
  $uuas = $uucom->sur_name;
  $uuasa = $uucom->first_name;
  $uuasid = $uucom->id;

  ?>
<span class="fa fa-user" aria-hidden="true"></span> <a href="{!! action('UsersController@view', $uuasid) !!}"><?php   echo $uuas; echo " "; echo $uuasa; ?></a> posted at <?php    echo ($tas);?> </label></p>  <p style="margin-left:25px;">  <?php   echo nl2br($as); ?>
<?php

  } ?>

</p>  </div>
  </div>

<?php
}?>


  <div class="form-group">
    <?php
    if ($user = Auth::user()) {
    echo '<div class="col-lg-12">
      <textarea class= "form-control" name="content" rows="3" id="content" placeholder="Type your comment here..."></textarea>
      </div>
      </div>
      <div class="">
        <div class="hvr-outline-out"> <input type="submit" value="Add Comment" class="btn btn-primary"></div></div>';
    } else{
      ?>
      <br><p style="margin:20px;">    <a href="{{ '../users/login' . '?previous=' . Request::fullUrl() }}"><b><span class="fa fa-unlock-alt" aria-hidden="true"></span> Log In </a> to add your comment!</b>
        </p>

        <?php
    }
     ?>
</form>
</fieldset>
</div>
</div>
<!-- //Comment Section -->
