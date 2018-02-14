<?php
	session_start();
	$con=mysqli_connect("localhost","root","","shopat");
	if(isset($_SESSION['shopping_cart']))
	{
		foreach($_SESSION['shopping_cart'] as $key => $row1)
       {
		   /*$query="update track set product_name='".$row1['product_name']."', product_price=".$row1['product_price']." , quantity=".$row1['quantity']." where product_id='".$row1['product_id']."'";
			
		   $rs=mysqli_connect($con,$query);
			if(mysqli_num_rows($rs)<=0)
			{*/
				$query="insert into track values('".$row1['product_id']."','".$row1['product_name']."',".$row1['product_price'].",".$row1['quantity'].") ";
				$rs=mysqli_query($con,$query);
				
			
	   }
		
	}
	
	session_destroy();
	header("location:index.php");
?>