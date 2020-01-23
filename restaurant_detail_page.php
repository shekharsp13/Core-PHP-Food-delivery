<?php 
include_once('connection.php');

if($logged_in=='1')
{
	if($user_role!='1')
	{
		header('Location:\error.php');
	}

}

if(isset($_POST['clear_cart']))
{
	$delete_cart_item="DELETE FROM tbl_cart_item WHERE created_by_id='$customer_id'";
	$check_cart_item=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE created_by_id='$customer_id'");
	if($conn->query($delete_cart_item)===TRUE)
	{
		$empty_cart=mysqli_query($conn,"DELETE FROM tbl_cart WHERE created_by_id='$customer_id'");
	}
}

$user_id=base64_decode($_GET['rm']);
$user_query="SELECT * FROM tbl_user WHERE id='$user_id'";
$user_detail=mysqli_query($conn,$user_query);
if(mysqli_num_rows($user_detail)<=0)
{
	header('Location:/error.php');
}
$user_data=mysqli_fetch_array($user_detail);

$restaurant_query=mysqli_query($conn,"SELECT * FROM tbl_seller_details WHERE created_by_id='$user_id'");
$restaurant_detail=mysqli_fetch_array($restaurant_query);
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

	<!-- Radio and check inputs -->
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
	</div>

	<!-- Header ================================================== -->
	<?php include_once('header.php'); ?>
	<!-- End Header =============================================== -->

	<!-- SubHeader =============================================== -->
	<?php 
      $seller_dp=mysqli_query($conn,"SELECT * FROM tbl_media WHERE created_by_id='$user_id' AND type_id='1'");
      $seller_pic=mysqli_fetch_array($seller_dp);
      $seller_dp_pic=$seller_pic['name'];
	?>
	<section class="parallax-window" data-parallax="scroll" data-image-src="/uploads/<?php echo $seller_dp_pic; ?>" data-natural-width="1400" data-natural-height="470">
		<div id="subheader">
			<div id="sub_content">
				<div id="thumb"><img src="/uploads/<?php echo $seller_dp_pic; ?>" alt="" style="height:96%;"></div>

				<h1><?php echo $user_data['username']; ?></h1>
				<div><strong>Category:</strong><em><?php if($restaurant_detail['options']==1)
				{
					echo 'PURE VEG';
				} elseif($restaurant_detail['options']==2)
				{
					echo 'NON-VEG';
				}else{
					echo 'BOTH VEG AND NON-VEG';
				}  ?></em></div>
				<div><i class="icon_pin"></i><?php echo $restaurant_detail['address'] ?></div>
			</div><!-- End sub_content -->
		</div><!-- End subheader -->
	</section><!-- End section -->
	<!-- End SubHeader ============================================ -->

	<div id="position">
		<div class="container">
			<ul>
				<li><a href="#0">Home</a></li>
				<li><a href="#0">Category</a></li>
				<li>Seller Details</li>
			</ul>

		</div>
	</div><!-- Position -->

	<!-- Content ================================================== -->
	<div class="container margin_60_35">
		<div class="row">
			<div class="col-md-3">
				<p><a href="/restaurant_display_list.php" class="btn_side">Back to search</a></p>  
				<div class="box_style_2 hidden-xs" id="help">
					<i class="icon_lifesaver"></i>
					<h4>Need <span>Help?</span></h4>
					<a href="tel://004542344599" class="phone"><?php echo $user_data['contact_no']; ?></a>
					<small>Opening Time <?php echo $restaurant_detail['open_time']; ?> - Closing Time <?php echo $restaurant_detail['close_time']; ?></small>
				</div>
			</div><!-- End col-md-3 -->

			<div class="col-md-6">
				<div class="box_style_2" id="main_menu">
					<h2 class="inner">Menu</h2>
					<table class="table table-striped cart-list">
						<thead>
							<tr>
								<th>
									Item
								</th>
								<th>
									Price
								</th>
								<th>
									Order
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $menu_query=mysqli_query($conn,"SELECT * FROM tbl_menu WHERE created_by_id='$user_id' AND state_id=".STATE_ACTIVE."");
							while($seller_menu=mysqli_fetch_array($menu_query))
							{
								$menu_image_query=mysqli_query($conn,"SELECT * FROM tbl_media WHERE type_id=2 AND model_id='$seller_menu[id]' AND created_by_id='$user_id' AND state_id=".STATE_ACTIVE."");
								$menu_image=mysqli_fetch_array($menu_image_query);
								echo '<tr>
								<td>
								<figure class="thumb_menu_list"><img src="/uploads/'.$menu_image[name].'" alt="thumb"></figure>
								<h5>'.$seller_menu[name].'</h5>
								<p>
								'.$seller_menu[description].'
								</p>
								</td>
								<td>
								<strong>Rs '.$seller_menu[price].'</strong>
								</td>
								<td class="options">
								<div class="dropdown dropdown-options">
								<button class="btn btn-link" type="button"  onclick="cart('.$seller_menu[id].');" name="add_to_cart" ><i class="icon_plus_alt2"></i></button>
								</div>
								</td>
								</tr>';
							}
							?>
						</tbody>
					</table>
					<hr>
					
				</div><!-- End box_style_1 -->
			</div><!-- End col-md-6 -->

			<div class="col-md-3" id="sidebar">
				<div class="theiaStickySidebar">
					<div id="cart_box" >
						<h3>Your Cart <i class="icon_cart_alt pull-right"></i></h3>
						
						<?php 
						$cart_detail=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE created_by_id='$customer_id'");
						if(mysqli_num_rows($cart_detail)>0){
							while($my_cart=mysqli_fetch_array($cart_detail))
							{
								$get_item_query=mysqli_query($conn,"SELECT * FROM tbl_menu WHERE id='$my_cart[product_id]'");
								$get_item=mysqli_fetch_array($get_item_query);
								$item_total_price=$my_cart[quantity] * $get_item[price];
								$sub_total+=$item_total_price;
								// $delivery_charge=10;

								echo '<table class="table table_summary">
								<tbody>
								<tr>
								<td>
								<strong>'.$my_cart[quantity].'x</strong> '.$get_item[name].'
								</td>
								<td>
								<strong class="pull-right">Rs'.$item_total_price.'</strong>
								</td>
								</tr>';
							}
							echo '</tbody>
							</table>

							<table class="table table_summary">
							<tbody>
							<tr>
							<td>
							Subtotal <span class="pull-right">Rs '.$sub_total.'</span>
							</td>
							</tr>';
							if($sub_total<=100 && $sub_total!=0){
								echo '<tr>
								<td>
								Delivery fee <span class="pull-right">Rs'.$delivery_charge.'</span>
								</td>
								</tr>
								<tr>';
							} 
							echo '<td class="total">';
							if($sub_total<=100 && $sub_total!=0){ 
								$grand_total=$sub_total+$delivery_charge;
								echo 'TOTAL <span class="pull-right">Rs'.$grand_total.'</span>';

							}else{ 
								echo 'TOTAL <span class="pull-right">Rs'.$sub_total.'</span>';
							} 

							echo '</td>
							</tr>
							</tbody>
							</table>';

						}

						?>

						<hr>
						<?php if($sub_total!=0){ ?>
						<a class="btn_full" href="confirm_order.php?rm=<?php echo base64_encode($user_id) ?>">Order now</a>
						<form action="" method="post">
							<button class="btn_full" type="submit" name="clear_cart">Clear cart</button>
						</form>
						<?php } ?>

					</div><!-- End cart_box -->
				</div><!-- End theiaStickySidebar -->
			</div><!-- End col-md-3 -->

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
	<script>Rs('#cat_nav').mobileMenu();</script>
	<script src="js/theia-sticky-sidebar.js"></script>
	<script>
		jQuery('#sidebar').theiaStickySidebar({
			additionalMarginTop: 80
		});
	</script>
	<script>
		function cart(item){
			var log='<?php echo $logged_in; ?>';
			var seller='<?php echo $user_id; ?>';
			if(log==1)
			{

				$.ajax({
					url:"/add_cart_ajax.php",
					type:"post",
					data:{item_id:item,seller_id:seller},
					success:function()
					{
						window.location.reload();
					}
				});

			}else if(log==0)
			{
				$("#register").modal("show");
			}

		}
	</script>


</body>

</html>