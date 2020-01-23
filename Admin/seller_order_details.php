<?php include_once('../connection.php'); 

// if($user_role!='3'||$user_role!='2')
// {
//   header('Location: ../error.php');
// }

$order_id=base64_decode($_GET['rm']);
$order_detail=mysqli_query($conn,"SELECT * FROM tbl_order_details WHERE order_id='$order_id'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Bhiwani Seller | Rawnap.com</title>
  <!--favicon-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>

  <!-- Start wrapper-->
  <div id="wrapper">

    <?php 
    if($user_role==2){

      include_once('deliveryboy_mainsidebar.php'); 

      include_once('deliveryboy_header.php');
      
    } else if($user_role==3){

      include_once('seller_mainsidebar.php'); 

      include_once('seller_header.php');
    }
    ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">


        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                Order Details

              </div>
              <?php while($get_order_info=mysqli_fetch_array($order_detail)){
                $menu=mysqli_query($conn,"SELECT * FROM tbl_menu WHERE id='$get_order_info[product_id]'");
                $menu_details=mysqli_fetch_array($menu);
                echo'<div class="card-body">
                <div class="table-responsive">
                <table class="table">
                <tbody>
                <tr>
                <th style="width:50%">Product:</th>
                <td>'.$menu_details['name'].'</td>
                </tr>
                <tr>
                <th>Price:</th>
                <td>'.$menu_details['price'].'</td>
                </tr>
                <tr>
                <th>Quantity:</th>
                <td>'.$get_order_info['quantity'].'</td>
                </tr>
                <tr>
                <th>Total Amount:</th>
                <td>'.$get_order_info['quantity']*$menu_details['price'].'</td>
                </tr>
                
                </tbody>
                </table>
                </div>

                </div>';
              } ?>
            </div>

          </div>
        </div><!--End Row-->
        <!--End Dashboard Content-->
      </div>
      <!-- End container-fluid-->
    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Rawnap Admin
        </div>
      </div>
    </footer>
    <!--End footer-->

  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

  <!-- Vector map JavaScript -->
  <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Chart js -->
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Index js -->
  <script src="assets/js/index.js"></script>

</body>

</html>
