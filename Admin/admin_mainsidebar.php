<?php include_once('../connection.php');
      
      if($user_role!='4')
{
header('Location: ../error.php');
}

 ?>
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <!-- <a href="index-2.html"> -->
       <!-- <img src="../img/logo.png" class="logo-icon" alt="logo icon" style="width: auto;"> -->
       <h5 class="logo-text">Rawnap Admin</h5>
     <!-- </a> -->
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="admin_index.php" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="javascript:;" class="waves-effect">
          <i class="icon-layers"></i> <span>Sellers</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="restaurant_list.php"><i class="fa fa-circle-o"></i> Sellers List</a></li>
          <li><a href="add_restaurant.php"><i class="fa fa-circle-o"></i> Add New Seller</a></li>
          <li><a href="approve_seller_menu.php"><i class="fa fa-circle-o"></i> Approve Sellers Menu</a></li>
        </ul>
      </li>
      <li>
        <a href="delivery_person_list.php" class="waves-effect">
          <i class="icon-note"></i> <span>Delivery persons</span>
        </a>
      </li>
       <li>
        <a href="customer_list.php" class="waves-effect">
          <i class="icon-support"></i> <span>Customers</span>
        </a>
      </li>
      <li>
        <a href="/logout.php" class="waves-effect">
          <i class="icon-support"></i> <span>Logout</span>
        </a>
      </li>
      
    </ul>
	 
   </div>