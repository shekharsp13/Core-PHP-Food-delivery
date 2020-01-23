<?php include_once('../connection.php'); 
if($user_role!='4')
{
  header('Location: ../error.php');
}


$orders=mysqli_query($conn,"SELECT COUNT(*) FROM tbl_order");
$order_count=$orders->fetch_row();

$users=mysqli_query($conn,"SELECT COUNT(*) FROM tbl_user WHERE role_id='1'");
$total_users=$users->fetch_row();

$order_total=mysqli_query($conn,"SELECT SUM(order_total) FROM tbl_order");
$total_amount_sold=mysqli_fetch_row($order_total);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Rawnap-Admin Panel</title>
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

    <?php include_once('admin_mainsidebar.php'); ?>

    <?php include_once('admin_header.php'); ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">

        <!--Start Dashboard Content-->

        <div class="row mt-3">
          <div class="col-12 col-lg-6 col-xl-3">
            <div class="card border-info border-left-sm">
              <div class="card-body">
                <div class="media">
                  <div class="media-body text-left">
                    <h4 class="text-info"><?php echo $order_count[0];?></h4>
                    <span>Total Orders</span>
                  </div>
                  <div class="align-self-center w-circle-icon rounded-circle gradient-scooter">
                    <i class="icon-basket-loaded text-white"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="card border-danger border-left-sm">
                <div class="card-body">
                  <div class="media">
                   <div class="media-body text-left">
                    <h4 class="text-danger"><?php echo $total_amount_sold[0];?></h4>
                    <span>Total Amount</span>
                  </div>
                  <div class="align-self-center w-circle-icon rounded-circle gradient-bloody">
                    <i class="icon-wallet text-white"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="card border-warning border-left-sm">
                <div class="card-body">
                  <div class="media">
                    <div class="media-body text-left">
                      <h4 class="text-warning"><?php echo $total_users[0];?></h4>
                      <span>Total Users</span>
                    </div>
                    <div class="align-self-center w-circle-icon rounded-circle gradient-blooker">
                      <i class="icon-user text-white"></i></div>
                    </div>
                  </div>
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
