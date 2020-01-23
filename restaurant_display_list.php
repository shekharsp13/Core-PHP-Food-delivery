<?php 
include('connection.php'); 
if($logged_in=='1')
{
   if($user_role != '1')
{
    header('Location:\error.php');
}
 
}

?>
<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <title>Order Food Online in Bhiwani</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="30% Discount | Order from the best  restaurants in Bhiwani  | Order food online with menus, reviews and Pay Online | Order Groceries in Bhiwani | Delivery Service in Bhiwani">
    <meta name="keywords" content="Restaurant in Bhiwani, pizza in Bhiwani,burger in Bhiwani, delivery food in Bhiwani,Bhiwani,Bhiwani delivery, Bhiwani Startup, Bhiwani Local Delivery">
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
    
    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.skinFlat.css" rel="stylesheet" >

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

	<div id="preloader">
        <div class="sk-spinner sk-spinner-wave" id="status">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div><!-- End Preload -->

    <?php include('header.php'); ?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/restaurant_results.jpeg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
	<div id="sub_content">
    	<h1>Results in your zone</h1>
    </div><!-- End sub_content -->
</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->
    
    <div class="collapse" id="collapseMap">
		<div id="map" class="map"></div>
	</div><!-- End Map -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row">
        <!-- include('restaurant_filter.php');  -->       
		<div class="col-md-12">
        
        <!-- <div id="tools">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="styled-select">
							<select name="sort_rating" id="sort_rating">
								<option value="" selected>Sort by ranking</option>
								<option value="lower">Lowest ranking</option>
								<option value="higher">Highest ranking</option>
							</select>
						</div>
					</div>
					
				</div>
			</div> --><!--End tools -->
            <?php
            $s_query="SELECT * FROM tbl_user WHERE role_id=3 AND type_id=1";
            $seller_row=mysqli_query($conn,$s_query);
            while($seller_array=mysqli_fetch_array($seller_row))
            {
                ?>
			<div class="strip_list last wow fadeIn" data-wow-delay="0.6s">
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
				<div class="row">
					<div class="col-md-9 col-sm-9">
						<div class="desc">
							<div class="thumb_strip">
								<a href="detail_page.html"><img src="/uploads/<?php echo $seller_dp; ?>" alt="pic" style="height: 102px; width: 102px;"></a>
							</div>
							<!-- <div class="rating">
								<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="#0">98 reviews</a></small>)
							</div> -->
							<h3><?php echo $seller_array['username']; ?></h3>
							<!-- <div class="type">
								Chinese / Vietnam
							</div> -->
							<div class="location">
								<?php echo $seller_detail_array['address']; ?> <span class="opening">Opens at <?php echo $seller_detail_array['open_time']; ?>.</span>
							</div>
							<ul>
								<li>Take away<i class="icon_check_alt2 ok"></i></li>
								<li>Delivery<i class="icon_check_alt2 ok"></i></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="go_to">
							<div>
								<a href="restaurant_detail_page.php?rm=<?php echo base64_encode($seller_array[id]) ?>" class="btn_1">View Menu</a>
							</div>
						</div>
					</div>
				</div><!-- End row-->
				<?php } ?>
			</div><!-- End strip_list-->
			<?php } ?>
            <!-- <a href="#0" class="load_more_bt wow fadeIn" data-wow-delay="0.2s">Load more...</a>  --> 
		</div><!-- End col-md-9-->
        
	</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
	<?php include_once('footer.php'); ?>
<!-- End Footer =============================================== -->


    
<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<script src="assets/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script  src="js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAs_JyKE9YfYLSQujbyFToZwZy-wc09w7s"></script>
<script src="js/map.js"></script>
<script src="js/infobox.js"></script>
<script src="js/ion.rangeSlider.js"></script>
<script>
    $(function () {
		 'use strict';
        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 15,
            from: 0,
            to:5,
            type: 'double',
            step: 1,
            prefix: "Km ",
            grid: true
        });
    });
</script>
</body>

</html>