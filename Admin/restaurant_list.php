<?php include_once('../connection.php');

if($logged_in=='1')
{
  if($user_role!='4')
{
header('Location: ../error.php');
}

}

if(isset($_POST['change_status']))
{
  if($_POST['change_status']==0 || $_POST['change_status']==2)
  {
    $change_user_status=mysqli_query($conn,"UPDATE tbl_user SET state_id=".STATE_ACTIVE." WHERE id='$_POST[cust_id]'");
  }else if($_POST['change_status']==1)
  {
    $change_user_status=mysqli_query($conn,"UPDATE tbl_user SET state_id=".STATE_DELETE." WHERE id='$_POST[cust_id]'");
  }else
  {
    header('Location:/error.php');
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <title>Rawnap - Quality delivery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="pizza,burger,delivery food,fast food,groceries,haryana,delivery,bhiwani">
    <meta property="fb:admins" content=""/>
    <meta name="og_site_name" property="og:site_name" content="Rawnap">
    <meta name="og_type" property="og:type" content="website">
    <meta name="og_title" property="og:title" content="Delivery of food and groceries - Rawnap">
    <meta name="og:description" property="og:description" content="Rawnap provide delivery of food , groceries and vegetables from different selllers in Bhiwani. we Ensure fast and cost efficient delivery.">
    <meta name="og_image" property="og:image" content="../img/apple-touch-icon-57x57-precomposed.png"><!-- link to image for socio -->
    <meta name="og_url" property="og:url" content="https://www.rawnap.com">
    <meta name="title" content="Rawnap - Quality Delivery">
    <meta name="description" content="Rawnap.com provide delivery of food , groceries and vegetables from different selllers in Bhiwani. we Ensure fast and cost efficient delivery..">
    <meta name="og_image" property="og:image" content="../img/apple-touch-icon-57x57-precomposed.png">
    <meta name="author" content="Rawnap">
    <meta name="rating" content="General">
  <!--favicon-->
  <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!--Data Tables -->
  <link href="assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
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
 
   <!--Start sidebar-wrapper-->
   <?php include_once('admin_mainsidebar.php'); ?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<?php include_once('admin_header.php'); ?>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Data Tables</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Rawnap</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Sellers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->


      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Start Time</th>
                        <th>Close Time</th>
                        <th>Option</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                      <?php 
                        $s_query="SELECT * FROM tbl_user WHERE role_id=3";
                        $seller_user=mysqli_query($conn,$s_query);
                        while($fetch_seller=mysqli_fetch_array($seller_user))
                        {
                         $detail_query="SELECT * FROM tbl_seller_details WHERE created_by_id='$fetch_seller[id]'";
                         $detail_row=mysqli_query($conn,$detail_query);
                         while($detail_seller=mysqli_fetch_array($detail_row))
                        {
                       ?>
                       <tr>
                        <td><?php echo $fetch_seller['username']; ?></td>
                        <td><?php echo $fetch_seller['email']; ?></td>
                        <td><?php echo $fetch_seller['contact_no']; ?></td>
                        <td><?php echo $detail_seller['address']; ?></td>
                        <td><?php echo $detail_seller['open_time']; ?></td>
                        <td><?php echo $detail_seller['close_time']; ?></td>
                        <?php if($detail_seller['options']==1)
                        {
                           echo '<td>VEG</td>';
                        } elseif($detail_seller['options']==2)
                        {
                            echo '<td>NON-VEG</td>';
                        }else{
                              echo '<td>BOTH</td>';
                        } 
                        if($fetch_seller['state_id']==0)
                        {
                           echo '<td>INACTIVE</td>';
                        } elseif($fetch_seller['state_id']==1)
                        {
                            echo '<td>ACTIVE</td>';
                        }else{
                              echo '<td>DELETED</td>';
                        }
                        echo '<form action="" method="post">';
                        if($fetch_seller['state_id']==0 || $fetch_seller['state_id']==2)
                        {
                          echo '<input type="hidden" name="cust_id" value='.$fetch_seller["id"].'><td><button class="btn btn-primary" name="change_status" value="0" type="submit">ACTIVE</button></td>';

                        }else{
                          echo '<input type="hidden" name="cust_id" value='.$fetch_seller["id"].'><td><button class="btn btn-secondary" name="change_status" value="1" type="submit">DELETE</button></td>';
                        }
                          echo '</form>
                      
                        </tr>';
                         } } ?>
                    
                    
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
  
	
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

  <!--Data Tables js-->
  <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
     $(document).ready(function() {
      //Default data table

       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
	
</body>

</html>
