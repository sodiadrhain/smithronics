@extends('master-admin')
@section('title', 'All Users')
@section('content')

<br>
        <h3 class="agileinfo_sign">Users Database</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">
        @if (session('status'))
        <div class="alert alert-success">
          {{  session('status') }}
        </div>
        @endif
        <center>
        <form method="GET" action="{!! action('Staff\UsersController@search') !!}" role="search" rout="search">
          {!! csrf_field()  !!}
        <input name="search" type="search" placeholder="Search users by firstname" required="">
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
   foreach ($post as $postss2){
     $tas1 = $postss2->created_at;
     $tas1 = strtotime($tas1);
     $tas1 = date("M d, Y :: h:i a", $tas1);
     $activated1 = $postss2->activated;
     if($activated1 == 0){
       $activated1 = "<font style='color:#b22222;'>   (user is not activated yet)</font>";
     } else {
       $activated1 = " ";
     }
       ?>

     <div class="list-group-item">
           <div class="row-action-primary">
             <i class="mdi-social-person"></i>

           </div>
     <div class="row-content">
       <div class="action-secondary"> <i class="mdi-social-info"></i>
       </div>

       <p class="list-group-item-heading" style="color:#000000;"><b><?php echo $postss2->first_name; echo "    "; echo $postss2->sur_name; echo $activated1;  ?><br> PHONE::: <?php echo   $postss2->phone; ?><br>EMAIL::: <?php echo   $postss2->email; ?> </b></p>
       <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Joined: <?php echo $tas1; ?></b></p> <a href="{!! action('Staff\UsersController@edit', $postss2->id) !!}" class="btn btn-default btn-raised">View/Edit profile</a>
   <?php
   $user_id2 = $postss2->id;
   $postsss5 = DB::table('order_list')->where('user_id', $user_id2)->get();
   $postsss6 = DB::table('pay_list')->where('user_id', $user_id2)->get();

   if (count($postsss5) != 0){
   ?>
       <a href="{!! action('Staff\UsersController@orders', $postss2->id) !!}" class="btn btn-default btn-raised">View orders</a>      <?php }
   else {
   echo "   ";
   }
   ?>
   <?php
   if (count($postsss6) != 0){
   ?>
           <a href="{!! action('Staff\UsersController@payments', $postss2->id) !!}" class="btn btn-default btn-raised">View payments</a>     <?php }
   else {
   echo "   ";
   }
   ?>
   <a href="{!! action('Staff\UsersController@message', $postss2->id) !!}" class="btn btn-primary btn-raised">Send message</a>   <?php
   $activate = $postss2->activated;
   if($activate == 0){?>
   <a href="{!! action('Staff\UsersController@activate', $postss2->id) !!}" class='btn btn-primary btn-raised'>Activate user</a>
   <?php
   } else {
   echo " ";
   }
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
            $posts2 = DB::table('users')->latest()->paginate(10);

            if (count($posts2) == 0){
              ?>
              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div><center>
                <h4 class="list-group-item-heading" style="color:#b22222;"> No users available</h4></center>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
            } else{
            foreach ($posts2 as $post2){
              $tas = $post2->created_at;
              $tas = strtotime($tas);
              $tas = date("M d, Y :: h:i a", $tas);
              $activated = $post2->activated;
              if($activated == 0){
                $activated = "<font style='color:#b22222;'>   (user is not activated yet)</font>";
              } else {
                $activated = " ";
              }
                ?>

              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div>

                <p class="list-group-item-heading" style="color:#000000;"><b><?php echo $post2->first_name; echo "    "; echo $post2->sur_name; echo $activated;  ?><br> PHONE::: <?php echo   $post2->phone; ?><br>EMAIL::: <?php echo   $post2->email; ?> </b></p>
                <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Joined: <?php echo $tas; ?></b></p> <a href="{!! action('Staff\UsersController@edit', $post2->id) !!}" class="btn btn-default btn-raised">View/Edit profile</a>
<?php
$user_id = $post2->id;
$posts5 = DB::table('order_list')->where('user_id', $user_id)->get();
$posts6 = DB::table('pay_list')->where('user_id', $user_id)->get();

if (count($posts5) != 0){
 ?>
                <a href="{!! action('Staff\UsersController@orders', $post2->id) !!}" class="btn btn-default btn-raised">View orders</a>      <?php }
else {
  echo "   ";
}
     ?>
<?php
     if (count($posts6) != 0){
      ?>
                    <a href="{!! action('Staff\UsersController@payments', $post2->id) !!}" class="btn btn-default btn-raised">View payments</a>     <?php }
     else {
       echo "   ";
     }
          ?>
<a href="{!! action('Staff\UsersController@message', $post2->id) !!}" class="btn btn-primary btn-raised">Send message</a>   <?php
$activate = $post2->activated;
if($activate == 0){?>
<a href="{!! action('Staff\UsersController@activate', $post2->id) !!}" class='btn btn-primary btn-raised'>Activate user</a>
<?php
} else {
  echo " ";
}
 ?>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <?php
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
            <?php } ?>
        </div>

      </div>

    </div>

    </div>


@endsection
