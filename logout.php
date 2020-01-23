<?php
	include('connection.php');
	session_unset();
	$query_delete_session = "UPDATE website_session set logged_in=0 where session_id='$sessionId'";
	mysqli_query($conn,$query_delete_session);
	setcookie("CurrentUserId","",(time()+2592000));
	setcookie("rlogin","0",(time()+2592000));
	header('Location: /index');
?>