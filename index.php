<?php
include_once('connection.php');
// if($logged_in=='1')
// {
//  if($user_role=='1')
//  {
//   header("Location: /index");    
// }else if($user_role=='2')
// {
//     header('Location: /Admin/deliveryboy_index.php');
// }else if($user_role=='3'){
//    header('Location: /Admin/seller_index.php');

// }else if($user_role=='4')
// {
//   header('Location: /Admin/admin_index.php');
// }else
// {
//     print_r("ohohohoh");
//     exit();
// }

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rawnap - Quality delivery | Bhiwani Food Delivery Service | Food Delivery service | Bhiwani Delivery | Bhiwani Startup</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="pizza,burger,delivery food,fast food,groceries,haryana,delivery,bhiwani,Bhiwani delivery, Bhiwani Startup, Bhiwani Food, Bhiwani Pizza, Bhiwani Local Delivery, Bhiwani burger, Bhiwani Fast Food">
    <meta name="keywords" content="pizza,burger,delivery food,fast food,groceries,haryana,delivery,bhiwani,Bhiwani delivery, Bhiwani Startup, Bhiwani Food, Bhiwani Pizza, Bhiwani Local Delivery, Bhiwani burger, Bhiwani Fast Food">
    <meta property="fb:admins" content=""/>
    <meta name="og_site_name" property="og:site_name" content="Rawnap">
    <meta name="og_type" property="og:type" content="website">
    <meta name="og_title" property="og:title" content="Delivery of food and groceries - Rawnap">
    <meta name="og:description" property="og:description" content="Rawnap provide delivery of food , groceries and vegetables from different selllers in Bhiwani. we Ensure fast and cost efficient delivery.">
    <meta name="og_image" property="og:image" content="img/apple-touch-icon-57x57-precomposed.png"><!-- link to image for socio -->
    <meta name="og_url" property="og:url" content="https://www.rawnap.com">
    <meta name="title" content="Rawnap - Quality Delivery">
    <meta name="description" content="Rawnap.com provide delivery of food , groceries and vegetables from different selllers in Bhiwani. we Ensure fast and cost efficient delivery.">
    <meta name="og_image" property="og:image" content="img/apple-touch-icon-57x57-precomposed.png">
    <meta name="author" content="Rawnap">
    <meta name="rating" content="General">

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3340536227456620",
    enable_page_level_ads: true
  });
</script>

</head>
<body style="max-width:100%; overflow-x: hidden !important;">


	<div id="preloader">
        <div class="sk-spinner sk-spinner-wave" id="status">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div><!-- End Preload -->

    <?php include_once('header.php');?>
    
    <section class="parallax-window" id="home" data-parallax="scroll" data-image-src="img/food-roll.jpg" data-natural-width="1400" data-natural-height="550" style="overflow-x: hidden;">
        <div id="subheader">
            <div id="sub_content">
                <h1>Hungry?</h1>
                <p style="display: block;">
                    Order food from favourite restaurants near you.
                </p>
                <a href="restaurant_display_list.php" class="button_intro" style="display: inline-block;">Restaurants</a> 
                <a href="restaurant_detail_page.php?rm=<?php echo base64_encode(35) ?>" class="button_intro" style="display: inline-block;">Groceries</a>

            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    <!-- <div id="count" class="hidden-xs">
        <ul>
            <li><span class="number">2650</span> Restaurant</li>
            <li><span class="number">5350</span> People Served</li>
            <li><span class="number">12350</span> Registered Users</li>
        </ul>
    </div> -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<!-- Content ================================================== -->
<div class="container margin_60">

   <div class="main_title">
    <h2 class="nomargin_top" style="padding-top:0">How it works</h2>
    <p>
        Restaurants in your pocket.
    </p>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="box_home" id="one">
            <span>1</span>
            <h3>Search by address</h3>
            <p>
                Find all restaurants available in your zone.
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box_home" id="two">
            <span>2</span>
            <h3>Choose a restaurant</h3>
            <p>
                We have more than 100s of menus online.
            </p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="box_home" id="four">
            <span>3</span>
            <h3>Delivery</h3>
            <p>
                You are lazy? Are you backing home? Guests? Late Night?
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box_home" id="three">
            <span>4</span>
            <h3>Pay by cash</h3>
            <p>
                It's quick and easy.
            </p>
        </div>
    </div>
</div><!-- End row -->

<div id="delivery_time" class="hidden-xs">
    <strong><span>1</span><span>5</span></strong>
    <h4>The minutes that usually takes to deliver!</h4>
</div>
</div><!-- End container -->

<div class="white_bg">
    <div class="container margin_60">

        <div class="main_title">
            <h2 class="nomargin_top">Choose from Most Popular</h2>
        </div>
        
        <div class="row">
            <?php
            $s_query="SELECT * FROM tbl_user WHERE role_id=3 LIMIT 4";
            $seller_row=mysqli_query($conn,$s_query);
            while($seller_array=mysqli_fetch_array($seller_row))
            {
                ?>
                <div class="col-md-6">
                    <?php 

                    $seller_detail_query="SELECT * FROM tbl_seller_details WHERE created_by_id='$seller_array[id]'";
                    $seller_detail_row=mysqli_query($conn,$seller_detail_query);
                    while($seller_detail_array=mysqli_fetch_array($seller_detail_row))
                    {

                      $seller_dp_query="SELECT * FROM tbl_media WHERE created_by_id='$seller_array[id]'";
                      $seller_dp_row=mysqli_query($conn,$seller_dp_query);
                      $seller_dp_array=mysqli_fetch_array($seller_dp_row);
                      $seller_dp=$seller_dp_array['name'];

                        
                      ?>
                      <a href="restaurant_detail_page.php?rm=<?php echo base64_encode($seller_array[id]) ?>" class="strip_list">
                        <div class="ribbon_1">Popular</div>
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="/uploads/<?php echo $seller_dp; ?>" alt="<?php echo $seller_dp;?>" style="height: 102px; width: 102px;">
                            </div>
                            <div class="rating">
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
                            </div>
                            <h3><?php echo $seller_array['username']; ?></h3>
                            <div class="type">
                                <?php 
                                if($seller_detail_array['options']==1)
                                {
                                   echo 'PURE VEG';
                               } elseif($seller_detail_array['options']==2)
                               {
                                echo 'NON-VEG';
                            }else{
                              echo 'BOTH VEG AND NON-VEG';
                          }  ?>
                      </div>
                      <div class="location">
                        <?php echo $seller_detail_array['address'];?> <span class="opening">Opens at <?php echo $seller_detail_array['open_time'];?></span>
                    </div>
                    <ul>
                        <li>Take away<i class="icon_check_alt2 ok"></i></li>
                        <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                    </ul>
                </div><!-- End desc-->
            </a><!-- End strip_list-->
            <?php }  ?>

        </div><!-- End col-md-6-->
        <?php } ?>

    </div><!-- End row -->   

</div><!-- End container -->
</div><!-- End white_bg -->

       <!-- <div class="high_light">
      	<div class="container">
      		<h3>Choose from over 2,000 Restaurants</h3>
            <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
            <a href="list_page.html">View all Restaurants</a>
        </div><!-- End container 
    </div> --><!-- End hight_light -->

   <!--  <section class="parallax-window" data-parallax="scroll" data-image-src="img/bg_office.jpg" data-natural-width="1200" data-natural-height="600">
    <div class="parallax-content">
        <div class="sub_content">
            <i class="icon_mug"></i>
            <h3>We also deliver to your office</h3>
            <p>
                Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
            </p>
        </div>
    </div>
</section> --><!-- End section -->
<!-- End Content =============================================== -->

<div class="container margin_60">
  <div class="main_title margin_mobile">
    <h2 class="nomargin_top">Work with Us</h2>
    <p>
        Experience Rawnap.
    </p>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-2">
       <a class="box_work" href="/restaurant_request.php">
        <img src="img/submit_restaurant.jpg" width="848" height="480" alt="" class="img-responsive">
        <h3>Submit your Restaurant<span>Start to earn customers</span></h3>
        <p>You can Create More Customers and Generate More sales.Your operation costs will go down As You Just need Commercial-place, so There will be no need to Set up Restaurant facility.
        With Rawnap restaurant registration, The cost that is incurred in running a Delivery facility will go down. You do not need to Hire Delivery Person.</p>
    </a>
</div>
<div class="col-md-4">
   <a class="box_work" href="javascript:;">
    <img src="img/delivery.jpg" width="848" height="480" alt="" class="img-responsive">
    <h3>We are looking for a Driver<span>Start to earn money</span></h3>
    <p>The business of food delivery is undergoing rapid change every day as we are capturing markets and customers across the country. So as we grow along with the times, we are always looking for great people to join us on this exciting journey.we're working on solving the challenges that take us a step closer to our mission – to ensure nobody has a bad meal.</p>
</a>
</div>
</div><!-- End row -->
</div><!-- End container -->

<!-- Footer ================================================== -->
<?php include_once('footer.php'); ?>
<!-- End Footer =============================================== -->


<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<script src="assets/validate.js"></script>

</body>
</html>