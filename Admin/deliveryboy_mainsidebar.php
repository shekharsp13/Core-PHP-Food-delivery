<?php include_once('../connection.php');
      
//       if($user_role!='2')
// {
// header('Location: ../index.php');
// }

$user_query=mysqli_query($conn,"SELECT * FROM tbl_user WHERE id='$customer_id'");
$restaurant_data=mysqli_fetch_array($user_query);
 ?>
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <!-- <a href="index-2.html"> -->
       <!-- <img src="../img/logo.png" class="logo-icon" alt="logo icon" style="width: auto;"> -->
       <h5 class="logo-text"><?php echo $restaurant_data['username']; ?></h5>
     <!-- </a> -->
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="deliveryboy_index.php" class="waves-effect">
          <i class="icon-home"></i> <span>Live Orders</span>
        </a>
      </li>
       <li>
        <a href="deliveryboy_order_history.php" class="waves-effect">
          <i class="icon-fire"></i> <span>Order History</span>
        </a>
      </li>
       <li>
        <a href="javascript:;" class="waves-effect">
          <i class="icon-fire"></i> <span>Issues And Complaints</span>
        </a>
      </li>
       <li>
        <a href="/logout.php" class="waves-effect">
          <i class="icon-support"></i> <span>Logout</span>
        </a>
      </li>
      
      
    </ul>
	 
   </div>