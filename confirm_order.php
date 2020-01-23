<?php
include_once('connection.php');

if($user_role!='1')
{
    header('Location:\error.php');
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

$cart_detail=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE created_by_id='$customer_id'");

$cart_basic=mysqli_query($conn,"SELECT * FROM tbl_cart WHERE created_by_id='$customer_id'");
$seller_cart=mysqli_fetch_array($cart_basic);


if(isset($_POST['confirm_order']))
{
    
    $order_query="INSERT INTO tbl_order (ordering_person,order_contact,order_address,order_note,order_total,seller_id,lattitude,longitude,state_id,type_id,created_by_id) VALUES('$_POST[order_person]','$_POST[order_contact]','$_POST[order_address]','$_POST[order_note]','$_POST[order_total]','$seller_cart[seller_id]','$seller_cart[order_lattitude]','$seller_cart[order_longitude]',".Order_received.",".ORDER.",'$customer_id')";
    if($conn->query($order_query)=== TRUE)
    {
        $order_id=$conn->insert_id;
        while($cart_products=mysqli_fetch_array($cart_detail))
        {
            $order_detail_query="INSERT INTO tbl_order_details (product_id,quantity,order_id,state_id,type_id,created_by_id) VALUES ('$cart_products[product_id]','$cart_products[quantity]','$order_id',".STATE_ACTIVE.",".ORDER.",'$customer_id')";
            if($conn->query($order_detail_query)===TRUE)
            {
                $delete_cart_item=mysqli_query($conn,"DELETE FROM tbl_cart_item WHERE product_id='$cart_products[product_id]'");
                $check_cart_item=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE created_by_id='$customer_id'");
                if(mysqli_num_rows($check_cart_item)<=0)
                {
                    $empty_cart=mysqli_query($conn,"DELETE FROM tbl_cart WHERE created_by_id='$customer_id'");
                    header('Location:/sendsms.php?rm='.base64_encode($order_id).'');
                }
            }else
            {
                die('something went wrong');
            }
        }
        
    }else
    {
        die('Some Error occured while Placing Order');
    }
}
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

<!-- SubHeader =============================================== -->
<section class="parallax-window"  id="short"  data-parallax="scroll" data-image-src="img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
    	<div id="sub_content">
    	 <h1>Place your order</h1>
            <div class="bs-wizard">
                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Your Cart</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="cart.html" class="bs-wizard-dot"></a>
                </div>
                               
                <div class="col-xs-4 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Your Details</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#0" class="bs-wizard-dot"></a>
                </div>
            
              <div class="col-xs-4 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Finish!</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="cart_3.html" class="bs-wizard-dot"></a>
                </div>  
		</div><!-- End bs-wizard --> 
        <marquee><h3 style="color: white;">Note: Allow Location Access For Faster Delivery</h3></marquee>
        </div><!-- End sub_content -->
	</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Order</a></li>
                <li>Confirm Order</li>
            </ul>
            
        </div>
    </div><!-- Position -->
    
<!-- Content ================================================== -->
<div class="container margin_60_35">
		<div class="row">
			<div class="col-md-3">
				<div class="box_style_2 hidden-xs info">
					<h4 class="nomargin_top">Delivery time <i class="icon_clock_alt pull-right"></i></h4>
					<p>
						We try to Deliver the Order in 20 Minutes which is the fastest compared to other delivery services in the city.
					</p>
					<hr>
					<h4>Payment <i class="icon_creditcard pull-right"></i></h4>
					<p>
						We offer Cash on Delivery , as it is the most Convenient and Reliable way of Payment.
					</p>
				</div><!-- End box_style_2 -->
                
            
			</div><!-- End col-md-3 -->
            
			<div class="col-md-6">
                <div class="box_style_2" id="order_process">
                    <h2 class="inner">Your Address details</h2>
                    <div class="form-group">
                        <form action="" method="post">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name_order" name="order_person" placeholder="Your Name" required="required">
                    </div>
                    <div class="form-group">
                        <label>Contact no</label>
                        <input type="tel" id="contact_order" name="order_contact" class="form-control" placeholder="Telephone/mobile" required="required">
                    </div>
                    <div class="form-group">
                        <label>Full address</label>
                        <input type="text" id="address_order" name="order_address" onchange="getLocation();" class="form-control" placeholder=" Your full address" required="required">
                        <input type="hidden" id="lattitude_order" name="order_lattitude" class="form-control" >
                        <input type="hidden" id="longitude_order" name="order_longitude" class="form-control" >
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                                <label>Notes (If Any)</label>
                                <textarea class="form-control" style="height:150px" placeholder="Ex. Allergies, cash change..." name="order_note" id="note_order"></textarea>
                        </div>
                    </div>
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-6 -->
            
			<div class="col-md-3" id="sidebar">
                <div class="theiaStickySidebar">
                    <div id="cart_box" >
                        <h3>Your Cart <i class="icon_cart_alt pull-right"></i></h3>
                        <table class="table table_summary">
                            <tbody>
                                <?php 
                                      while($my_cart=mysqli_fetch_array($cart_detail))
                                      {
                                        $get_item_query=mysqli_query($conn,"SELECT * FROM tbl_menu WHERE id='$my_cart[product_id]'");
                                        $get_item=mysqli_fetch_array($get_item_query);
                                        $item_total_price=$my_cart[quantity] * $get_item[price];
                                        $sub_total+=$item_total_price;
                                        

                                        echo '<tr>
                                    <td>
                                        <strong>'.$my_cart[quantity].'x</strong> '.$get_item[name].'
                                    </td>
                                    <td>
                                        <strong class="pull-right">Rs'.$item_total_price.'</strong>
                                    </td>
                                </tr>';
                                      }
                                        ?>
                                

                            </tbody>
                        </table>
                        
                        <table class="table table_summary">
                            <tbody>
                                <tr>
                                    <td>
                                        Subtotal <span class="pull-right">Rs<?php echo $sub_total; ?></span>
                                    </td>
                                </tr>
                                <?php if($sub_total<=100 && $sub_total!=0){?>
                                <tr>
                                    <td>
                                        Delivery fee <span class="pull-right">Rs<?php echo $delivery_charge;?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <?php } ?>
                                    <td class="total">
                                        <?php if($sub_total<=100 && $sub_total!=0){ ?>
                                        TOTAL <span class="pull-right">Rs<?php echo $sub_total + $delivery_charge; ?></span>

                                        <?php }else{ ?>
                                                    TOTAL <span class="pull-right">Rs<?php echo $sub_total ?></span>
                                        <?php } ?>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <input type="hidden" name="order_total" value='<?php echo $sub_total ?>'>
                        <button class="btn_full" type="submit" id="btn_order_now" name="confirm_order">Order now</button>
                    </form>
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
<script src="js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
      additionalMarginTop: 80
    });

    var Subtotal='<?php echo $sub_total ?>';
    if(Subtotal==0)
    {
         $('#btn_order_now').attr('disabled',true);
    }
</script>
<script>
var x = document.getElementById("lattitude_order");
var y = document.getElementById("longitude_order");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else {
        x.value = 0;
        y.value = 0;
    }
}
function showPosition(position) {
    x.value = position.coords.latitude;
    y.value = position.coords.longitude; 
}
</script>

</body>
</html>