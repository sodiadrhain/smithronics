@extends('master')
@section('title', 'Welcome To')
@section('meta-keywords', 'Smith Ronics, Electronics & Home Appliances, Electronics, Home Appliances, Nokia, Samsung, LG, SonyEricsson, Motorola')
@section('meta-description', 'We sell Electronics & Home Appliances just for 4 months')
@section('content')

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

  <?php
  $categories = DB::table('categories')->where('id', 1)->first();
  $pid = $categories->id;
  $cname = $categories->name;

  ?>

  <!-- top Products -->
  <div class="">
    <div class="container">
      <!-- product right -->
      <div class="agileinfo-ads-display ">
        <div class="wrapper">
          <!-- first section (nuts) -->
          <br>
          <div class="product-sec1">
            <h3 class="heading-tittle">Electronics and Home Appliances</h3>    <?php

            $posts = DB::table('category_post')->where('category_id', $pid)->latest()->take(6)->get();
            foreach ($posts as $post){
            $as = $post->post_id;
            $posteds = DB::table('posts')->where('id', $as)->get();
            foreach ($posteds as $posted){

  ?>

      <div class="col-md-4 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
          <div class="men-thumb-item">
            <img src="<?php echo $posted->image1; ?>" alt="" width="220" height="200">

          </div>
          <div class="item-info-product ">
            <h4>
              <a href="<?php       echo $posted->slug; ?>.html"><?php echo substr($posted->title,0,25); ?></a>
            </h4>
            <div class="info-product-price">
              <span class="item_price">₦ <?php   echo $posted->price; ?></span>

            </div>
            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                <fieldset>
                <a href="<?php       echo $posted->slug; ?>.html" class="">  <input type="submit" name="submit" value="Order Now" class="button" /></a>
                </fieldset>



            </div>

          </div>
        </div>
      </div>
  <?php
  }
  }
   ?>




            <div class="clearfix"></div>
          </div>
          <!-- //first section (nuts) -->

          <!-- second section (nuts special) -->
          <div class="product-sec1 product-sec2">
            <div class="col-xs-7 effect-bg">
              <h3 class="">Smithronics Integrated Enterprises</h3>
              <h6>Enjoy the best Products</h6>
              <p>All Affordable rates</p>
            </div>

            <div class="col-xs-5 bg-right-nut">
              <img src="images/smith.png" alt="">
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- //second section (nuts special) -->
          <?php
          $categories2 = DB::table('categories')->where('id', 2)->first();
          $pid2 = $categories2->id;
          $cname2 = $categories2->name;

          ?>
          <!-- third section (oils) -->
          <div class="product-sec1">
            <h3 class="heading-tittle">Food Items and Provisions</h3>
            <?php

           $posts2 = DB::table('category_post')->where('category_id', $pid2)->latest()->take(6)->get();
           foreach ($posts2 as $post2){
           $as2 = $post2->post_id;
           $posteds2 = DB::table('posts')->where('id', $as2)->get();
           foreach ($posteds2 as $posted2){

           ?>

           <div class="col-md-4 product-men">
           <div class="men-pro-item simpleCart_shelfItem">
           <div class="men-thumb-item">
           <img src="<?php echo $posted2->image1; ?>" alt="" width="220" height="200">
           <div class="men-cart-pro">
           </div>
           </div>
           <div class="item-info-product ">
           <h4>
             <a href="<?php       echo $posted2->slug; ?>.html"><?php echo substr($posted2->title,0,35); ?></a>
           </h4>
           <div class="info-product-price">
             <span class="item_price">₦ <?php   echo $posted2->price; ?></span>

           </div>
           <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

               <fieldset>
               <a href="<?php       echo $posted2->slug; ?>.html" class="">  <input type="submit" name="submit" value="Order Now" class="button" /></a>
               </fieldset>



           </div>

           </div>
           </div>
           </div>
           <?php
           }
           }
           ?>

            <div class="clearfix"></div>
          </div>
          <!-- //third section (oils) -->

        </div>
      </div>
      <!-- //product right -->
    </div>
  </div>
  <!-- //top products -->
  <!-- special offers -->
  <div class="featured-section" id="">
    <div class="container"><br><br><br><br><br>
  			<!-- tittle heading -->
        <h3 class="agileinfo_sign"><u>recently viewed</u></h3>

  			<!-- //tittle heading -->
  			<div class="content-bottom-in">
  				<ul id="flexiselDemo1">
            <?php
                $postedsr = DB::table('posts')->orderByRaw('RAND()')->take(10)->get();
                foreach ($postedsr as $postedr){
                ?>

                    <li>
                      <div class="w3l-specilamk">
                        <div class="speioffer-agile">
                            <a href="<?php       echo $postedr->slug; ?>.html">
                            <img src="<?php echo $postedr->image1; ?>" alt="" width="220" height="200">
                          </a>
                        </div>
                        <div class="product-name-w3l">
                          <h4>
                          <a href="<?php       echo $postedr->slug; ?>.html"><center><?php echo substr($postedr->title,0,25); ?></center></a>
                          </h4>
                          <div class="w3l-pricehkj"><center>
                            <h6>₦ <?php   echo $postedr->price; ?></h6></center>
                          </div>
                          <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                              <fieldset>
                              <a href="<?php       echo $postedr->slug; ?>.html" class="">  <input type="submit" name="submit" value="Order Now" class="button" /></a>
                              </fieldset>

                          </div>
                        </div>
                      </div>
                    </li>
                    <?php
                        }

                         ?>
                  </ul>
                </div>


  </div>

  </div>
  	<!-- //special offers -->

<?php }else{ ?>

  <br>
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

                  <h3 class="heading-tittle">
  ELECTRONICS & HOME APPLIANCES</h3>
  </center>

    </div>
  </div>
  <div class="list-group-separator">
  </div>


    <?php
    $categories = DB::table('categories')->where('id', 1)->first();
    $pid = $categories->id;
    $cname = $categories->name;

    $posts = DB::table('category_post')->where('category_id', $pid)->latest()->take(15)->get();
    foreach ($posts as $post){
    $as = $post->post_id;
    $posteds = DB::table('posts')->where('id', $as)->get();
    foreach ($posteds as $posteda){

    ?>

            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div><center>
  <img src="<?php echo $posteda->image1; ?>" alt="<?php echo $posteda->title; ?>" width="75%">
          <br> <br>   <p class="list-group-item-heading" ><b><a style="color:#000000;" href="/<?php
   echo $posteda->slug;
     echo '.html';
     ?>"><?php echo $posteda->title; ?></a><br> <font style="color:#b22222;">(PRICE::: ₦<?php echo $posteda->price; ?> PER/DAY)</font></b></p>
  <br>

        </center>
        <a href="/<?php
   echo $posteda->slug;
     echo '.html';
     ?>" class="btn btn-primary btn-raised">Make Order</a> <p class="btn btn-default btn-raised">Total Cost of Product: ₦<?php echo $posteda->price*120; ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Product is Available</b></p>
            </div>
          </div>
          <div class="list-group-separator">
          </div>
  <?php  }
  } ?>

  </div>
  </div>
  </div>
  </div>
  <!-- second section (nuts special) -->
  <div class="container">
    <!-- product right -->
    <div class=" ">
      <div class="wrapper">
  <div class="product-sec1 product-sec2">
    <div class="col-xs-7 effect-bg">
      <h3 class="">Smithronics Integrated Enterprises</h3>
      <h6>Enjoy the best Products</h6>
      <p>All Affordable rates</p>
    </div>

    <div class="col-xs-5 bg-right-nut">
      <img src="images/smith.png" alt="">
    </div>
    <div class="clearfix"></div>
  </div>
  </div>
  </div>
  </div>
  <!-- //second section (nuts special) -->
  <br>
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

                  <h3 class="heading-tittle">
  FOOD ITEMS & PROVISIONS</h3>
  </center>

    </div>
  </div>
  <div class="list-group-separator">
  </div>


    <?php
    $categories2 = DB::table('categories')->where('id', 2)->first();
    $pid2 = $categories2->id;
    $cname2 = $categories2->name;
    $posts = DB::table('category_post')->where('category_id', $pid2)->latest()->take(10)->get();
    foreach ($posts as $post){
    $as = $post->post_id;
    $posteds = DB::table('posts')->where('id', $as)->get();
    foreach ($posteds as $posteda){

    ?>

            <div class="list-group-item">
                  <div class="row-action-primary">
                    <i class="mdi-social-person"></i>

                  </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>
              </div><center>
  <img src="<?php echo $posteda->image1; ?>" alt="<?php echo $posteda->title; ?>" width="75%">
          <br> <br><p class="list-group-item-heading" ><b><a style="color:#000000;" href="/<?php
   echo $posteda->slug;
     echo '.html';
     ?>"><?php echo $posteda->title; ?></a><br> <font style="color:#b22222;">(PRICE::: ₦<?php echo $posteda->price; ?> PER/DAY)</font></b></p>
  <br>

        </center>
        <a href="/<?php
   echo $posteda->slug;
     echo '.html';
     ?>" class="btn btn-primary btn-raised">Make Order</a> <p class="btn btn-default btn-raised">Total Cost of Product: ₦<?php echo $posteda->price*120; ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Product is Available</b></p>
            </div>
          </div>
          <div class="list-group-separator">
          </div>
  <?php  }
  } ?>

  </div>
  </div>
  </div>
  </div>

  <br>
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

                   <h3 class="heading-tittle">
   RECENTLY VIEWED</h3>
   </center>

     </div>
   </div>
   <div class="list-group-separator">
   </div>


     <?php
     $postedsr = DB::table('posts')->take(10)->orderByRaw('RAND()')->get();
     foreach ($postedsr as $postedr){

     ?>

             <div class="list-group-item">
                   <div class="row-action-primary">
                     <i class="mdi-social-person"></i>

                   </div>
             <div class="row-content">
               <div class="action-secondary"> <i class="mdi-social-info"></i>
               </div><center>
   <img src="<?php echo $postedr->image1; ?>" alt="<?php echo $postedr->title; ?>" width="75%">
           <br> <br>   <p class="list-group-item-heading" ><b><a style="color:#000000;" href="/<?php
    echo $postedr->slug;
      echo '.html';
      ?>"><?php echo $postedr->title; ?></a><br> <font style="color:#b22222;">(PRICE::: ₦<?php echo $postedr->price; ?> PER/DAY)</font></b></p>
   <br>

         </center>
         <a href="/<?php
    echo $postedr->slug;
      echo '.html';
      ?>" class="btn btn-primary btn-raised">Make Order</a> <p class="btn btn-default btn-raised">Total Cost of Product: ₦<?php echo $postedr->price*120; ?></p>   <p class="btn btn-default btn-raised" style="color:#b22222;"><b>Product is Available</b></p>
             </div>
           </div>
           <div class="list-group-separator">
           </div>
   <?php
   } ?>


   </div>
   </div>
   </div>
   </div>


<?php } ?>

@endsection
