<?php
include_once('connection.php');

$order_id=base64_decode($_GET['rm']);

$order=mysqli_query($conn,"SELECT * FROM tbl_order where id='$order_id'");
$order_detail=mysqli_fetch_array($order);

$user_info=mysqli_query($conn,"SELECT * FROM tbl_user where id='$order_detail[seller_id]'");
$user_details=mysqli_fetch_array($user_info);

// Replace with your username
$user = "rawnap";

// Replace with your API KEY (We have sent API KEY on activation email, also available on panel)
$apikey = "Sb3kzY6XeqIPmzYckRpj"; 

// Replace if you have your own Sender ID, else donot change
$senderid  =  "MYTEXT"; 

// Replace with the destination mobile Number to which you want to send sms
$mobile  =  "7357686165"; 

// Replace with your Message content
$message   =  $user_details['username'].",You Got a New Order From Rawnap.com For an Amount of Rs.".$order_detail['order_total']."Kindly Prepare the Order . Our Delivery Person will pick it up as soon as possible.Thank You!!!"; 
$message = urlencode($message);

// For Plain Text, use "txt" ; for Unicode symbols or regional Languages like hindi/tamil/kannada use "uni"
$type   =  "txt";

$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);      
    curl_close($ch); 

// Display MSGID of the successful sms push
   header('Location:/order_placed.php?rm='.base64_encode($order_id).'');

?>

