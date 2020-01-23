   <?php
   include_once('/connection.php');

   
if(isset($_POST['login']))
{

    $email=$_POST['login']['email'];
    $password=md5($_POST['login']['password']);



    $login_sql="SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
    $row_data=mysqli_query($conn,$login_sql);

    if(mysqli_num_rows($row_data)>0)
    {


        $cookie_name = "rlogin";
        $cookie_value = "1";
        setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");

        $result_login=mysqli_fetch_array($row_data);

        $customer_id=$result_login['id'];
        $role=$result_login['role_id'];

        $query_session = "UPDATE website_session set logged_in='1',customer_id='$customer_id' where session_id='$sessionId'";
        mysqli_query($conn,$query_session);
        $address="http://ipinfo.io/".$_SERVER['REMOTE_ADDR']."/json";
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents($address));

        $ip_check="SELECT * FROM customer_ip WHERE customer_id='$customer_id' AND ip_address='$ip'";
        $row_ip_check=mysqli_query($conn,$ip_check);
        if(mysqli_num_rows($row_ip_check)<=0)
        {
            $query = "INSERT into customer_ip (`customer_id`, `ip_address`,`city`,state,country,organization,pincode) values ('$customer_id','$ip',
            '$details->city','$details->region','$details->country','$details->org','$details->postal')";
            mysqli_query($conn,$query);
        }
        if($role=='1')
        {
          header("Location: /index");    
      }else if($role=='2')
      {
        header('Location: /Admin/deliveryboy_index.php');
    }else if($role=='3'){
       header('Location: /Admin/seller_index.php');

    }else if($role=='4')
    {
      header('Location: /Admin/admin_index.php');
    }

}else{
    echo '<script>document.getElementById("wrong-entry").style.display="block";</script>';
}

}


if(isset($_POST['signup']))
{


    $username=$_POST['signup']['username'];

    $email=$_POST['signup']['email'];

    $password=md5($_POST['signup']['password']);


    $sql="INSERT INTO tbl_user(email,username,password,state_id,type_id,role_id)values('$email','$username','$password',".STATE_ACTIVE.",".PROFILE.",".Customer.")";


    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;

        $cookie_name = "rlogin";
        $cookie_value = "1";
        setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");

        $query_session = "UPDATE website_session set logged_in='1',customer_id='$last_id' where session_id='$sessionId'";
        mysqli_query($conn,$query_session);
        $address="http://ipinfo.io/".$_SERVER['REMOTE_ADDR']."/json";
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents($address));
        $query = "INSERT into customer_ip (`customer_id`, `ip_address`,`city`,state,country,organization,pincode) values ('$last_id','$ip',
        '$details->city','$details->region','$details->country','$details->org','$details->postal')";
        mysqli_query($conn,$query);
        if ($conn->query($query_session) === TRUE) {
            header("Location: /index");
        }else{

            print_r('error');
            exit();

        }

    }else{
        mysqli_error($conn);
        exit();
    }

}


   ?>
   

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="index.php" id="logo">
                <img src="img/logo.png" width="190" height="23" alt="" data-retina="true" class="hidden-xs">
                <img src="img/logo_mobile.png" width="59" height="23" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
                </a>
            </div>
            <nav class="col--md-8 col-sm-8 col-xs-8">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="img/logo.png" width="190" height="23" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                 <ul>
                  <?php
                        $query="SELECT * FROM tbl_user WHERE id='$customer_id'";
                        $user_query=mysqli_query($conn,$query);
                        $fetch_user=mysqli_fetch_array($user_query);
                        if($logged_in==1)
                        { ?>
                        <li><a href="/index.php">Home</a></li>
                        <li><a href="/my_orders.php">My Orders</a></li>
                        <li><a href="/logout.php">Logout</a></li>
                        <li><a href="/contact.php">Help</a></li>
                    
                    <?php } else{ ?>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#login_2">Login</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#register">Register</a></li>
                    <li><a href="/about.php">About us</a></li>
                    <li><a href="/contact.php">Help</a></li>
                    <?php } ?>
                </ul>
            </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
    </header>






  <div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->   
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content modal-popup">
    <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
    <form action="" method="POST" class="popup-form" id="myLogin">
     <div class="login_icon"><i class="icon_lock_alt"></i></div>
     <input type="text" class="form-control form-white" name="login[email]" placeholder="Email">
     <input type="password" class="form-control form-white" name="login[password]" placeholder="Password">
     <div class="text-left">
      <a href="#">Forgot Password?</a>
  </div>
  <button type="submit" class="btn btn-submit">Submit</button>
</form>
</div>
</div>
</div><!-- End modal -->   

<!-- Register modal -->   
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content modal-popup">
    <a href="javascript:;" class="close-link"><i class="icon_close_alt2"></i></a>
    <form action="" method="POST" class="popup-form" id="myRegister">
     <div class="login_icon"><i class="icon_lock_alt"></i></div>
     <input type="text" class="form-control form-white" name="signup[username]" placeholder="Username">
     <input type="email" class="form-control form-white" name="signup[email]" placeholder="Email">
     <input type="password" class="form-control form-white" placeholder="Password" name="signup[Password]"  id="password1">
     <input type="password" class="form-control form-white" placeholder="Confirm password"  id="password2">
     <div id="pass-info" class="clearfix"></div>
     <div class="checkbox-holder text-left">
      <div class="checkbox">
       <input type="checkbox" value="accept_2" id="check_2" name="check_2" />
       <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
   </div>
</div>
<div class="text-left">
     <a href="#0" data-toggle="modal" data-target="#login_2">Login</a>
  </div>
<button type="submit" class="btn btn-submit">Register</button>
</form>
</div>
</div>
</div><!-- End Register modal -->