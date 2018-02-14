<?php
		$total=0;
		$con=mysqli_connect("localhost","root","","shopat");
		
		session_start();
		$product_ids=array();
		
		//session_destroy();
		if(filter_input(INPUT_POST,'add-to-cart'))
		{
			if(isset($_SESSION['shopping_cart']))
			{
				
				$id=filter_input(INPUT_GET,'id');
				$name=filter_input(INPUT_POST,'name');
				$price=filter_input(INPUT_POST,'price');
				$q=filter_input(INPUT_POST,'quantity');
			
			
				$count=count($_SESSION['shopping_cart']);
				$product_ids=array_column($_SESSION['shopping_cart'],'product_id');
				
				if(!in_array(filter_input(INPUT_GET,'id'),$product_ids))
				{
					$_SESSION['shopping_cart'][$count]=array
				(
					'product_id' => filter_input(INPUT_GET,'id'),
					'product_name' => filter_input(INPUT_POST,'name'),
					'product_price' => filter_input(INPUT_POST,'price'),
					'quantity' => filter_input(INPUT_POST,'quantity')
					
				);
					$query1="insert into track values('".$id."','".$name."',".$price.",".$q.")";
				    $rs1=mysqli_query($con,$query1);
				
				}
				else
				{
					for($i=0;$i<count($product_ids);$i++)
					{
						if($product_ids[$i]==filter_input(INPUT_GET,'id'))
						{
							
							$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
							$query1="update track set product_quantity=".$_SESSION['shopping_cart'][$i]['quantity']." where product_id='".$id."'";
							$rs1=mysqli_query($con,$query1);
					
						}
					}
				}
				
				
			}
			else
			{
				$_SESSION['shopping_cart'][0]=array
				(
					'product_id' => filter_input(INPUT_GET,'id'),
					'product_name' => filter_input(INPUT_POST,'name'),
					'product_price' => filter_input(INPUT_POST,'price'),
					'quantity' => filter_input(INPUT_POST,'quantity')
					
				);
			}
			
		
		}
		/*
		if(filter_input(INPUT_GET,'action') == 'delete')
		{
			$id=filter_input(INPUT_GET,'id');
			foreach($_SESSION['shopping_cart'] as $key => $product)
			{
				if($product['product_id']== filter_input(INPUT_GET,'id'))
				{
					unset($_SESSION['shopping_cart'][$key]);
					
					
				}
				
			}
			$_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
		
		}*/
	if(isset($_SESSION['shopping_cart']))
	{	foreach($_SESSION['shopping_cart'] as $key => $row1)
       {
		   $total=$total+$row1['quantity'];
		   $_SESSION['count']=$total;
		}
	}
	else
	{
		$_SESSION['count']=0;
		
	}
		
?>


<!DOCTYPE html>
	<head><title>shopat.com</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="cart.css" rel="stylesheet">
	<style>
		.w3-badge{background-color:#000;color:#fff;display:inline-block;padding-left:8px;padding-right:8px;text-align:center;border-radius:50%}
        .w3-green{color:#fff!important;background-color:#4CAF50!important}
		
		.right{
			align: right;
			width: 100%;
			border: 3px solid #73AD21;
			padding: 10px 10px 10px 800px;
			background-color:  	#F0FFFF;
			
		  }
		/* Full-width input fields */
input[type=text], input[type=password], input[type=email]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.select{
	 width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;

}
/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn1{
	width: auto;
    background-color: #f44336;
	padding: 10px 18px;
}
.cancelbtn,.signupbtn 
{float:left;width:50%}

.cancelbtn{
	 background-color: #f44336;
	
}
/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container1 {
    padding: 16px;
	
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 40px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn, .signupbtn {
       width: 100%;
   
    }
}
}	</style>
	</head>
	<body style="background-color: #F0FFFF">
	<table class="table right">
				<tr>
					<td><a href="index.php"><img src="logo.jpg" width="40px" height="35px"/></a></td>
				<td style="float: right;"><a href='add_cart.php'><b>CART</b><span class="w3-badge w3-green"><?php echo $_SESSION['count'];?></span></a></td>
		<?php if(!isset($_SESSION['user']))
		{
			
	?>
					<td style="float: right;"><a href="#" onClick="document.getElementById('id01').style.display='block'" ><b>LOG IN</b></a>
					<div id="id01" class="modal">
  
  <form class="modal-content animate" action="auth.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container1">
      <label style="float: left;"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label style="float: left;"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <input type="checkbox" checked="checked" style="float: left; text-align: left;"><p style="float: left;">Remember me<p>
    </div>

    <div class="container1" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
					</td>
					<td style="float: right;"><a href="#" onClick="document.getElementById('id02').style.display='block'"><b>SIGN UP</b></a>
					<!-- The Modal (contains the Sign Up form) -->
<div id="id02" class="modal">
  <form class="modal-content animate" method="post" action="signup.php">
  <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="avatar.png" alt="FILL THIS FORM!" class="avatar">
    </div>

    <div class="container1">
      <label style="float: left;"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

	  <label style="float: left;"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label style="float: left;"><b>Phone No.</b></label>
      <input type="text" placeholder="Enter Mobile Number" name="phone" required>

	  <label style="float: left;"><b>Country</b></label>
      <select class="select" name="sel" required>
			    <option value="Guyana">Guyana</option>
				<option value="Haiti">Haiti</option>
				<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
				<option value="Holy See">Holy See (Vatican City State)</option>
				<option value="Honduras">Honduras</option>
				<option value="Hong Kong">Hong Kong</option>
				<option value="Hungary">Hungary</option>
				<option value="Iceland">Iceland</option>
				<option value="India">India</option>
				<option value="Indonesia">Indonesia</option>
				<option value="Iran">Iran (Islamic Republic of)</option>
				<option value="Iraq">Iraq</option>
				<option value="Ireland">Ireland</option>
				<option value="Israel">Israel</option>
				<option value="Italy">Italy</option>
				<option value="Jamaica">Jamaica</option>
				<option value="Japan">Japan</option>
				<option value="Jordan">Jordan</option>
				<option value="Kazakhstan">Kazakhstan</option>
				<option value="Kenya">Kenya</option>
				<option value="Kiribati">Kiribati</option>
				<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
				<option value="Korea">Korea, Republic of</option>
				<option value="Kuwait">Kuwait</option>
	  </select>
	  
	   <label style="float: left;"><b>State</b></label>
      <input type="text" placeholder="Enter State" name="state" required>
      
	   <label style="float: left;"><b>Pin Code</b></label>
      <input type="text" placeholder="Enter Pin Code" name="pin" required>
      
	   <label style="float: left;"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw1" required>
      
	  
      <label style="float: left;"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <input type="checkbox" checked="checked" style="float: left;"><p style="float: left;">Remember me</p>
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div> 
 <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> 
		</td><?php } else {
			$_SESSION['user']=$_SESSION['user'];?>
						<td>
						<button onclick="myf2();" style="width:auto; float: right;">Continue Shopping</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button onclick="myf12();" style="width:auto; float: right; right: 20px;">Logout</button>
		<script>
			function myf2()
			{
				window.location.href="index.php";
			}
			function myf12()
			{
				window.location.href="out.php";
			}
			
		</script>
					
			</td>

					<?php } ?>
			</tr>
			</table>
	<h2 align="center">SALE AT 50% DISCOUNT...HURRY</h2>
	<div class="container">
		
    <?php
	
	    $con=mysqli_connect("localhost","root","","shopat");
	    $query="select * from product_details";
	    $rs=mysqli_query($con,$query);
		if($rs)
		{
		  if(mysqli_num_rows($rs)>0)
		  {
			    while($row=mysqli_fetch_assoc($rs))
				{
					if(filter_input(INPUT_GET,'pid')== $row['poduct_type'])
					{
	?>
			<div class="col-sm-4 col-md-3">
				<form method="post" action="mens.php?action=add&id=<?php echo $row['product_id'];?>&pid=<?php echo filter_input(INPUT_GET,'pid');?>">
					<div class="products">
						<img src="<?php echo $row['product_image'];?>" class="img-responsive"/>
						<h4 class="text-info" ><?php echo $row['product_name'];?></h4>
						<h4>&#8377;<?php echo $row['product_price'];?></h4>
						<input type="text" class="form-control" name="quantity" value="1">
						<input type="hidden" name="name" value="<?php echo $row['product_name'];?>">
						<input type="hidden" name="price" value="<?php echo $row['product_price'];?>">
						
						<input type="submit" style="margin-top:5px" name="add-to-cart" class="btn btn-info"  value="ADD TO CART">
					</div>
					</form>
			</div>
			
	<?php
					}
				}
			}
		}
		
    ?>
		<!--<div style="clear:both"></div>
		</br>
		<div class="table-responsive">
			<table class="table">
				<th colspan=5><h3>ORDER DETAILS</h3></th>
				<tr>
					<th width="40%">PRODUCT NAME</th>
					<th width="10%">QUANTITY</th>
					<th width="15%">PRICE</th>
					<th width="15">TOTAL</th>
					<th width="5%">ACTION</th>
				</tr>
				<?php
					if(!empty($_SESSION['shopping_cart']))
					{
						$total=0;
						 foreach($_SESSION['shopping_cart'] as $key => $row1)
       {
				?>
				<tr>
					<td><?php echo $row1['product_name'];?></td>
					<td><?php echo $row1['product_price'];?></td>
					<td><?php echo $row1['quantity'];?></td>
					<td><?php echo number_format($row1['product_price']*$row1['quantity'],2);?></td>
					<td><a href="mens.php?action=delete&id=<?php echo $row1['product_id'];?>">
						<div class="btn-danger">Remove</div>
						</a>
					</td>
				</tr>
				<?php	
						$total=$total+$row1['product_price']*$row1['quantity'];
						}
				?>
						<tr ><td colspan="4" align="right">TOTAL:</td>
						<td colspan="4" align="right"><?php echo number_format($total,2);?></td></tr>
				
				<?php
				
					}
				?>
			</table>
		</div>-->
	</body>
</html>