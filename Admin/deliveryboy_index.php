<?php include_once('../connection.php'); 

// if($user_role!='2')
// {
//   header('Location: ../error.php');
// }


if(isset($_POST['pickup_order']))
{
  $pickedup_order=mysqli_query($conn,"UPDATE tbl_order SET state_id=".Order_ontheway." WHERE id='$_POST[pickup_order]'");
}else if(isset($_POST['delivered_order']))
{
  $delivered_order=mysqli_query($conn,"UPDATE tbl_order SET state_id=".Order_delivered." WHERE id='$_POST[delivered_order]'");
}
$orders=mysqli_query($conn,"SELECT * FROM tbl_order WHERE state_id=".Order_received." OR state_id=".Order_processing." OR state_id=".Order_ontheway." ");

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

    <?php include_once('deliveryboy_mainsidebar.php'); ?>

    <?php include_once('deliveryboy_header.php'); ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">


    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            Live Orders
            <div class="card-action">
             <div class="dropdown">
               <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                <i class="icon-options"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
         <div class="table-responsive">
           <table class="table">
            <thead>
             <tr>
               <th>Order ID</th>
               <th>Status</th>
               <th>Seller Name</th>
               <th>Seller Contact no</th>
               <th>Customer Name</th>
               <th>Customer Address</th>
               <th>Customer contact</th>
               <th>Total Amount</th>
               <th>Actions</th>
             </tr>
           </thead>
           <?php while($get_orders=mysqli_fetch_array($orders))
           {
            $seller_details=mysqli_query($conn,"SELECT tbl_user.id,tbl_user.username,tbl_user.contact_no,tbl_seller_details.address FROM tbl_user LEFT JOIN tbl_seller_details ON tbl_user.id=tbl_seller_details.created_by_id WHERE tbl_user.id='$get_orders[seller_id]'");
            $seller_info=mysqli_fetch_array($seller_details);
            $order_id="OD25".$get_orders['seller_id'].$get_orders['order_total'].$get_orders['id'];
            echo '<tr>
            <td>'.$order_id.'</td>';
            if($get_orders['state_id']==1)
            {
              echo '<td><span class="badge gradient-quepal text-white shadow">Pending</span></td>';
            }else if($get_orders['state_id']==2)
            {
              echo '<td><span class="badge gradient-scooter text-white shadow">Approved</span></td>';
            }elseif($get_orders['state_id']==3){
              echo '<td><span class="badge gradient-purpink text-white shadow">Picked up</span></td>';
            }else{
                   echo '<td><span class="badge gradient-orange text-white shadow">Unknown</span></td>';
            }
            
            echo'<td>'.$seller_info['username'].'</td>
            <td>'.$seller_info['contact_no'].'</td>
            <td>'.$get_orders['ordering_person'].'</td>
            <td>'.$get_orders['order_address'].'</td>
            <td>'.$get_orders['order_contact'].'</td>
            <td>Rs '.$get_orders['order_total'].'</td>';
            if($get_orders['state_id']==1 || $get_orders['state_id']==2)
            {
              echo '<td><div class="btn-group"><form action="" method="post"><button class="btn btn-outline-primary btn-round waves-effect waves-light m-1" type="submit" name="pickup_order" value='.$get_orders['id'].' >Picked up</button> </form><a class="btn btn-outline-primary btn-round waves-effect waves-light m-1" href="seller_order_details.php?rm='.base64_encode($get_orders['id']).'">View</a></div></td>';
            }else if($get_orders['state_id']==3)
            {
              echo '<td><div class="btn-group"><form action="" method="post"><button class="btn btn-outline-primary btn-round waves-effect waves-light m-1" type="submit" name="delivered_order" value='.$get_orders['id'].' >Delivered</button> </form><a class="btn btn-outline-primary btn-round waves-effect waves-light m-1" href="seller_order_details.php?rm='.base64_encode($get_orders['id']).'">View</a><button class="btn btn-outline-success btn-round waves-effect waves-light m-1" type="button" onclick="openordermap('.$get_orders['lattitude'].','.$get_orders['longitude'].');">Map</button></div></td>';
            }
            
          echo '</tr>';
           } ?>
        
        </table>
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
<script>
  function openordermap(lat,long)
  {
     window.open("https://www.google.com/maps/?q="+lat+","+long+"");
  }

</script>

</body>

</html>
