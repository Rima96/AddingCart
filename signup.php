<?php
	session_start();
	$con=mysqli_connect("localhost","root","","shopat");
		
		$email=filter_input(INPUT_POST,'email');
		$user=filter_input(INPUT_POST,'user');
		$phone=filter_input(INPUT_POST,'phone');
		$country=filter_input(INPUT_POST,'sel');
		$state=filter_input(INPUT_POST,'state');
		$pin=filter_input(INPUT_POST,'pin');
		$pass=filter_input(INPUT_POST,'psw1');
		$password=filter_input(INPUT_POST,'psw-repeat');
		
		$_SESSION["user"]=$user;
	$query="insert into registration values('".$email."','".$user."',".$phone.",'".$country."','".$state."','".$pin."','".$pass."','".$password."')";
	$rs=mysqli_query($con,$query);
	header("location:index.php");
	
?>