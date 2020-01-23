<?php 
include_once('connection.php'); 
$order_id=base64_decode($_GET['rm']);

$orders=mysqli_query($conn,"SELECT * FROM tbl_order WHERE id='$order_id' AND state_id='1'");
if(mysqli_num_rows($orders)<=0)
{
   header('Location:/error.php');
}
$get_order=mysqli_fetch_array($orders);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $user_data['username']; ?> | Delivery in Bhiwani</title>
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

	<link href="css/skins/square/grey.css" rel="stylesheet">


</head>

<body>


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

	<!-- Content ================================================== -->
	<div class="container margin_60_35">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="box_style_2">
					<h2 class="inner">Request Submitted!</h2>
					<div id="confirm">
						<i class="icon_check_alt2"></i>
						<h3>Thank you For Placing Order With Us!</h3>
						<p>
							Dear <?php echo $get_order['ordering_person']; ?> , Your Order has been Placed Successfully . We will try to give you the best Possible Service.
						</p>
					</div>
					<h4>Order Summary</h4>
					<table class="table table-striped nomargin">
						<tbody>
							<?php 

							$order_detail_query=mysqli_query($conn,"SELECT * FROM tbl_order_details WHERE order_id='$order_id'");
							while($order_detail=mysqli_fetch_array($order_detail_query))
							{
								$get_items_query=mysqli_query($conn,"SELECT * FROM tbl_menu WHERE id='$order_detail[product_id]'");
                                $get_product=mysqli_fetch_array($get_items_query);
                                $item_total_price=$order_detail[quantity] * $get_product[price];
                                $sub_total_products+=$item_total_price;
								echo '<tr>
								<td>
								<strong>'.$order_detail[quantity].'x</strong>'.$get_product[name].'
								</td>
								<td>
								<strong class="pull-right">Rs '.$item_total_price.'</strong>
								</td>
								</tr>';
							}

							if($sub_total_products<=100)
							{
								echo '<tr>
								<td>
									Delivery Charges <a href="#" class="tooltip-1" data-placement="top" title="" data-original-title="There is a Nomilal Delivery Charge on order Below Rs 100!"><i class="icon_question_alt"></i></a>
								</td>
								<td>
									<strong class="pull-right">'.$delivery_charge.'</strong>
								</td>
							</tr>';
							}

							?>
                            
							
							<tr>
								<td class="total_confirm">
									TOTAL
								</td>
								<td class="total_confirm">
									<?php 
									if($sub_total_products<=100){
										$grand_total=$sub_total_products+$delivery_charge;
										echo '<span class="pull-right">'.$grand_total.'</span>';
									}else{
										   echo '<span class="pull-right">'.$sub_total_products.'</span>';
									} ?>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- End row -->
	</div><!-- End container -->
	<!-- End Content =============================================== -->

	<!-- Footer ================================================== -->
	<?php include_once('footer.php'); ?>


	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>

</body>

</html>