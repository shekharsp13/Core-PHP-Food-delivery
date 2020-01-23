<?php include_once('../connection.php');

if($user_role!='4')
{
header('Location: ../error.php');
} 

if(isset($_POST['seller']))
{
 
 $username=$_POST['seller']['name'];

 $email=$_POST['seller']['email'];

 $phone=$_POST['seller']['phone'];

 $password=md5($_POST['seller']['password']);

 $seller_query="INSERT INTO tbl_user(email,username,contact_no,password,state_id,type_id,role_id)values('$email','$username','$phone','$password',".STATE_ACTIVE.",".PROFILE.",".Seller.")";
 if($conn->query($seller_query)===True)
 {
  $seller_id=$conn->insert_id;

  $address=$_POST['seller']['address'];
  $opentime=$_POST['seller']['opentime'];
  $closetime=$_POST['seller']['closetime'];
  $option=$_POST['seller']['option'];
  $detail_sql="INSERT INTO tbl_seller_details(address,open_time,close_time,options,state_id,created_by_id)VALUES('$address','$opentime','$closetime','$option',".STATE_ACTIVE.",'$seller_id')";
  if($conn->query($detail_sql) === TRUE)
  {
    $model_id=$conn->insert_id;

    if(isset($_FILES['sellerprofilefile']))
{

  $info = pathinfo($_FILES['sellerprofilefile']['name']);

$ext = $info['extension']; // get the extension of the file

$model_type=$_FILES['sellerprofilefile']['type'];

$name=basename($_FILES["sellerprofilefile"]["name"]);

$size=basename($_FILES["sellerprofilefile"]["size"]);

$newname = $size."sellerdp".time().".".$ext; 

$target = '../uploads/'.$newname;

$tar = move_uploaded_file( $_FILES['sellerprofilefile']['tmp_name'], $target);

    $profile_pic_query="INSERT INTO tbl_media (name,model_type,model_id,size,ext,state_id,type_id,created_by_id) VALUES ('$newname','$model_type','$model_id','$size','$ext',".STATE_ACTIVE.",".PROFILE.",'$seller_id') ";
    $profile_pic=mysqli_query($conn,$profile_pic_query);
    header('Location: admin_index.php');
  

}
    
}
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

<!--Start topbar header-->
<?php include_once('admin_header.php'); ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Add Seller</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Rawnap</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Sellers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Seller</li>
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
            <div class="card-body">
              <form id="personal-info" action="" method="POST" enctype="multipart/form-data">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-user-circle-o"></i>
                   Information
                </h4>
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-1" name="seller[name]" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-2" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="input-2" name="seller[email]" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-3" name="seller[phone]" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-4" name="seller[address]" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-5" class="col-sm-2 col-form-label">Open Time </label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" id="input-5" name="seller[opentime]" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-6" class="col-sm-2 col-form-label">Close Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" id="input-6" name="seller[closetime]" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-7" class="col-sm-2 col-form-label">Options</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-7" name="seller[option]" required>
                        <option value="1" >Pure Veg</option>
                        <option value="2" >Non Veg</option>
                        <option value="3" >Both</option>
                    </select>
                  </div>
                </div>
        
                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Seller Profile Pic</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="input-8" name="sellerprofilefile" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="input-9" name="seller[password]" required>
                  </div>
                </div>
                <div class="form-footer">
                    <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->

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

  <!--Form Validatin Script-->
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script>

    $().ready(function() {

    $("#personal-info").validate();

});

    </script>
	
</body>

</html>
