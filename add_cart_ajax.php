<?php
include_once('connection.php');
$product_id=$_POST['item_id'];
$seller_id=$_POST['seller_id'];
if($logged_in==1)
{
	
	$check_cart=mysqli_query($conn,"SELECT * FROM tbl_cart WHERE created_by_id='$customer_id'");
	$cart_details=mysqli_fetch_array($check_cart);
	$cart_id=$cart_details['id'];
	if(mysqli_num_rows($check_cart)<=0)
	{
		$add_cart="INSERT INTO tbl_cart(seller_id,state_id,type_id,created_by_id) VALUES('$seller_id',".STATE_ACTIVE.",".MENU.",'$customer_id')";
		if($conn->query($add_cart)==TRUE)
		{
			$last_id=$conn->insert_id;
			
			$check_cart_item=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE product_id='$product_id' AND cart_id='$last_id' AND created_by_id='$customer_id'");
			
			if(mysqli_num_rows($check_cart_item)<=0)
			{
				$cart_item=mysqli_query($conn,"INSERT INTO tbl_cart_item (product_id,quantity,cart_id,state_id,type_id,created_by_id) VALUES ('$product_id',1,'$last_id',".STATE_ACTIVE.",".MENU.",'$customer_id')");
				
			}else
			{
				mysqli_query($conn,"UPDATE tbl_cart_item SET quantity=quantity+1 WHERE product_id='$product_id' AND cart_id='$last_id' AND created_by_id='$customer_id'");
			}
		}else
		{
			die('some error occured');
		}


	}else
	{
		
		if($cart_details['seller_id']==$seller_id)
		{
			$cart_item_check=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE product_id='$product_id' AND cart_id='$cart_id' AND created_by_id='$customer_id'");
			if(mysqli_num_rows($cart_item_check)<=0)
			{
				$cart_item=mysqli_query($conn,"INSERT INTO tbl_cart_item (product_id,quantity,cart_id,state_id,type_id,created_by_id) VALUES ('$product_id',1,'$cart_id',".STATE_ACTIVE.",".MENU.",'$customer_id')");

			}else
			{
				mysqli_query($conn,"UPDATE tbl_cart_item SET quantity=quantity+1 WHERE product_id='$product_id' AND cart_id='$cart_id' AND created_by_id='$customer_id'");

			}
		}else{
			echo "<script>alert('Previous Cart Will be Get Deleted!'); </script>";
			$delete_cart_item="DELETE FROM tbl_cart_item WHERE created_by_id='$customer_id'";
			$check_cart_item=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE created_by_id='$customer_id'");
			if($conn->query($delete_cart_item)===TRUE)
			{
				$empty_cart=mysqli_query($conn,"DELETE FROM tbl_cart WHERE created_by_id='$customer_id'");
				// echo "<script> location.reload();</script>";
				
				$add_cart="INSERT INTO tbl_cart(seller_id,state_id,type_id,created_by_id) VALUES('$seller_id',".STATE_ACTIVE.",".MENU.",'$customer_id')";
				if($conn->query($add_cart)==TRUE)
				{
					$last_id=$conn->insert_id;

					$check_cart_item=mysqli_query($conn,"SELECT * FROM tbl_cart_item WHERE product_id='$product_id' AND cart_id='$last_id' AND created_by_id='$customer_id'");

					if(mysqli_num_rows($check_cart_item)<=0)
					{
						$cart_item=mysqli_query($conn,"INSERT INTO tbl_cart_item (product_id,quantity,cart_id,state_id,type_id,created_by_id) VALUES ('$product_id',1,'$last_id',".STATE_ACTIVE.",".MENU.",'$customer_id')");

					}else
					{
						mysqli_query($conn,"UPDATE tbl_cart_item SET quantity=quantity+1 WHERE product_id='$product_id' AND cart_id='$last_id' AND created_by_id='$customer_id'");
					}
				}
			}
		}
		
	}
}


?>