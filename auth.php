<?php
	session_start();
	$con=mysqli_connect("localhost","root","","shopat");
		
		$email=filter_input(INPUT_POST,'uname');
		$password=filter_input(INPUT_POST,'psw');
		
	$query="select * from registration where email='".$email."' and password='".$password."' ";
	$rs=mysqli_query($con,$query);
	if($row=mysqli_fetch_array($rs))
	{
		$_SESSION['user']=$row[1];
		header("location:index.php");
			
	}
	else
	{
	?>	<script>alert("USERNAME OR PASSWORD IS INVALID");</script>
	<?php
		header("location:index.php");
	}
?>