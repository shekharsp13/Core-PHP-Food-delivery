<?php

define('STATE_INACTIVE','0');
define('STATE_ACTIVE','1');
define('STATE_DELETE','2');

define('PROFILE','1');         //Profile Image
define('MENU','2');         //Banner Image
define('ORDER','3');           //Post video and Image
define('OTHER','4');          //Other video and Image

define('Customer','1');         //Profile Image
define('Delivery','2');         //Banner Image
define('Seller','3');           //Post video and Image
define('Admin','4');


define('Order_received','1');      
define('Order_processing','2');         
define('Order_ontheway','3');           
define('Order_delivered','4');
define('Order_cancelled','5');
define('Order_issue','6');

session_start();

$servername = "";
$username = "rawnaxge";
$password = "$12Luck12$";
$dbname = "rawnaxge_rawnap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$delivery_charge=10;

if(isset($_COOKIE['CurrentUserId']))
{
	
	$sessionId = mysqli_real_escape_string($conn,$_COOKIE['CurrentUserId']);
	if($sessionId!=''){
		$query_session = "SELECT * from website_session where session_id='$sessionId'";
		$row_session = mysqli_query($conn,$query_session);
		$result_session = mysqli_fetch_array($row_session);
		$customer_id = $result_session['customer_id'];
		$logged_in = $result_session['logged_in'];
		
		if($customer_id!=0){
			if($logged_in=='1')
				setcookie("rlogin","1",(time()+2592000));
			$user_role_query="SELECT * FROM tbl_user WHERE id='$customer_id'";
			$user_role_row=mysqli_query($conn,$user_role_query);
			$user_role_fetch=mysqli_fetch_array($user_role_row);
			$user_role=$user_role_fetch['role_id'];
		
		}
	}else{
		$sessionId = $_SERVER['REMOTE_ADDR'].'-'.time();
		$cookie_name = "CurrentUserId";
		$cookie_value = $sessionId;
		setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");

		$cookie_name = "rlogin";
		$cookie_value = "0";
		setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$query_session = "INSERT into website_session (customer_id,session_id,ip_address) 
		values('0','$sessionId','$ip_address')";
		mysqli_query($conn,$query_session);
		$customer_id = 0;
		$logged_in = 0;
	}
	
}else{
	
	$sessionId = $_SERVER['REMOTE_ADDR'].'-'.time();
	setcookie("CurrentUserId",$sessionId,(time()+2592000));
	setcookie("rlogin","0",(time()+2592000));
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$query_session = "INSERT into website_session (customer_id,session_id,ip_address) 
	values('0','$sessionId','$ip_address')";
	mysqli_query($conn,$query_session);
	$logged_in = 0;
}
include_once('rn-config.php');


?>