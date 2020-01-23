<?php 

include_once('connection.php'); 

if(isset($_POST['request']))
{
 $fname=$_POST['request']['name_contact'];
 $lname=$_POST['request']['lastname_contact'];
 $email=$_POST['request']['email_contact'];
 $phone=$_POST['request']['phone_contact'];
 $rname=$_POST['request']['restaurant'];
 $address=$_POST['request']['address'];
 $request_query="INSERT INTO seller_request(first_name,last_name,email,contact_no,bussiness_name,bussiness_address,state_id,type_id) VALUES ('$fname','$lname','$email','$phone','$rname','$address',".STATE_ACTIVE.",".OTHER.")";
 if($conn->query($request_query)==TRUE)
 {
   header('Location: /request_submit.php');
 }

}


?>
<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<style type="text/css">
    .feature{
        height: 150px;
    }
</style>
<head>
    <meta charset="utf-8">
    <title>Submit Restaurant | Bhiwani Restaurant</title>
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
    <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">
    
    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">

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

    <!-- Header ================================================== -->
    <?php include_once('header.php'); ?>
    <!-- End Header =============================================== -->

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
    	<div id="sub_content">
    	 <h1>Work with us</h1>
         <p>Growth is never by mere chance; it is the result of forces working together.</p>
         <p></p>
        </div><!-- End sub_content -->
	</div><!-- End subheader -->
</section><!-- End section -->

<div class="container margin_60_35">
    <div class="main_title margin_mobile">
            <h2 class="nomargin_top">Increase your customers</h2>
            <p>
                If You Are Not Taking Care Of Your Customer, Your Competitor Will.
            </p>
        </div>
	<div class="row">
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
			<div class="feature">
				<i class="icon_datareport"></i>
				<h3><span>Increase</span> your sales</h3>
				<p>
					Approach Each Customer With The Idea Of Helping Him Or Her To Solve A Problem Or Achieve A Goal, Not Of Selling A Product Or Service.
				</p>
			</div>
		</div>
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
			<div class="feature">
				<i class="icon_chat_alt"></i>
				<h3><span>24*7</span> chat support</h3>
				<p>
					 solving problems of customers is our Formost Priority.
				</p>
			</div>
		</div>
	</div><!-- End row -->
	<div class="row">
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
			<div class="feature">
				<i class="icon_bag_alt"></i>
				<h3><span>Delivery</h3>
				<p>
				 Give your clients the earliest delivery consistent with quality - whatever the inconvenience to us.
				</p>
			</div>
		</div>
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="feature">
                <i class="icon_wallet"></i>
                <h3><span>Cash</span> payment</h3>
                <p>
                    Price is what you pay , Value is what you get .
                </p>
            </div>
        </div>
	</div><!-- End row -->
	
</div><!-- End container -->


<div class="container margin_60">
	 <div class="main_title margin_mobile">
            <h2 class="nomargin_top">Please submit the form below</h2>
            <p>
                Lets Grow Together.
            </p>
        </div>
	<div class="row">
    	<div class="col-md-8 col-md-offset-2">
        	<form action="" method="POST" >
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>First name</label>
									<input type="text" class="form-control" id="name_contact" name="request[name_contact]" placeholder="vicky">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Last name</label>
									<input type="text" class="form-control" id="lastname_contact" name="request[lastname_contact]" placeholder="Doe">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Email:</label>
									<input type="email" id="email_contact" name="request[email_contact]" class="form-control " placeholder="vicky@email.com">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Phone number:</label>
									<input type="text" id="phone_contact" name="request[phone_contact]" class="form-control" placeholder="5435435">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Restaurant name</label>
                                   <input type="text" id="restaurant" name="request[restaurant]" class="form-control" placeholder="Pizza King">
								</div>
							</div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Restaurant Address</label>
                                   <input type="text" id="restaurant_address" name="request[address]" class="form-control" placeholder="MG road">
                                </div>
                            </div>
                            
						</div><!-- End row  -->
                        
                       <div id="pass-info" class="clearfix"></div>
                        <div class="row">
                        	<div class="col-md-6">
									<label><input name="mobile" type="checkbox" value="" class="icheck" checked>Accept <a href="#0">terms and conditions</a>.</label>
							</div>
                            </div><!-- End row  -->
                        <hr style="border-color:#ddd;">
                        <div class="text-center"><button class="btn_full_outline">Submit</button></div>
					</form>
        </div><!-- End col  -->
    </div><!-- End row  -->
</div><!-- End container  -->
<!-- End Content =============================================== -->

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