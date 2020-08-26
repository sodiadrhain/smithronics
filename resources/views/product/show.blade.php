@extends('master')
@section('title', 'View Category')
@section('content')
<?php
$categories = DB::table('categories')->where('slug', $slug)->first();
$pid = $categories->id;
$cname = $categories->name;

?>


<div class="services-breadcrumb">
  <div class="agile_inner_breadcrumb">
    <div class="container">
      <ul class="w3_short">
        <li>
          <a href="/">Home</a>
          <i>|</i>
        </li>
        <li>
<?php
echo   $cname;
 ?>


        </li>
      </ul>
    </div>
  </div>
</div>
<br>
    <!-- top Products -->
    <div class="">
      <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">      <?php
            echo   $cname;
             ?>

          <span class="heading-style">
            <i></i>
            <i></i>
            <i></i>
          </span>
        </h3>
        <!-- //tittle heading -->
<?php //-- Very simple variant
$useragent = $_SERVER['HTTP_USER_AGENT'];
$iPod = stripos($useragent, "iPod");
$iPad = stripos($useragent, "iPad");
$iPhone = stripos($useragent, "iPhone");
$Android = stripos($useragent, "Android");
$iOS = stripos($useragent, "iOS");
$webOS = stripos($useragent, "webOS");
$Blackberry = stripos($useragent, "Blackberry");
$IEMobile= stripos($useragent, "IEMobile");
//-- You can add billion devices

$DEVICE = ($iPod||$iPhone||$Android||$iOS||$webOS||$Blackberry||$IEMobile);

if ($DEVICE !=true) {?>
        <!-- product right -->
<div class="product-sec1">
      <?php

      $posts = DB::table('category_post')->where('category_id', $pid)->latest()->paginate(24);
      foreach ($posts as $post){
      $as = $post->post_id;
      $posteds = DB::table('posts')->where('id', $as)->get();
      foreach ($posteds as $posted){
        echo  '<div class="col-md-4 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
              <div class="men-thumb-item">';

              echo '
                <img src="';
                        echo $posted->image1;
                echo'" alt="';
echo $posted->title;
                echo '" width="220" height="200">
                <div class="men-cart-pro">
                  <div class="inner-men-cart-pro">
                    <a href="/';
                  echo $posted->slug;
                    echo '.html" class="link-product-add-cart">View Product</a>
                  </div>
                </div>
              </div>
              <div class="item-info-product ">
                <h4>
                <a href="/';
              echo $posted->slug;
                echo '.html">';
                      echo substr($posted->title,0,35);
            echo '</a>
                </h4>
                <div class="info-product-price">
                  <span class="item_price">₦ ';
  echo $posted->price;
                  echo '</span>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <a href="/checkout/';
                echo $posted->slug;
                  echo '.html">
                      <input type="submit" name="submit" value="PLACE ORDER" class="button" />
                  </a>
                </div>

              </div>
            </div>
          </div>';

     }

     }
    ?>

              <div class="clearfix"></div>
            </div>
            <!-- //category section -->
            <?php
            $pagecheck = $posts->render();
      if(!empty($pagecheck)){?>

        <div class="product-sec1">
                <h3>Pages:</h3><?php  echo $posts->render(); ?>
              </div>

      <?php } ?>
            </div>
              </div>

  <?php
            } else{
             ?>

    <?php
  $posts = DB::table('category_post')->where('category_id', $pid)->latest()->paginate(24);
      foreach ($posts as $post){
      $as = $post->post_id;
      $posteds = DB::table('posts')->where('id', $as)->get();
      foreach ($posteds as $posted){


    ?>

            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div><center>
  <img src="<?php echo $posted->image1; ?>" alt="<?php echo $posted->title; ?>" width="75%">
          <br> <br>   <p class="list-group-item-heading" ><b><a style="color:#000000;" href="/<?php
   echo $posted->slug;
     echo '.html';
     ?>"><?php echo $posted->title; ?></a><br> <font style="color:#b22222;">(PRICE::: ₦<?php echo $posted->price; ?> PER/DAY)</font></b></p>
  <br>

        </center>
        <a href="/<?php
   echo $posted->slug;
     echo '.html';
     ?>" class="btn btn-primary btn-raised">Make Order</a> <p class="btn btn-default btn-raised">Total Cost of Product: ₦<?php echo $posted->price*120; ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Product is Available</b></p>
            </div>
          </div>
          <div class="list-group-separator">
          </div>
  <?php

}

} ?>

<?php
$pagecheck = $posts->render();
if(!empty($pagecheck)){?>
<div class="list-group-item">
      <div class="row-action-primary">
        <i class="mdi-social-person"></i>

      </div>
<div class="row-content">
  <div class="action-secondary"> <i class="mdi-social-info"></i>
  </div>
    <h4>Pages:</h4><?php  echo $posts->render(); ?>
  </div>
</div>
<div class="list-group-separator">
</div>
<?php } ?>

  </div>
  </div>
  </div>
  </div>


 <?php
            }
             ?>



@endsection
