<?php
		session_start();
		
		$total=0;
		$product_ids=array();
		$con=mysqli_connect("localhost","root","","shopat");
		//session_destroy();
		/*if(filter_input(INPUT_POST,'add-to-cart'))
		{
			
				$id=filter_input(INPUT_GET,'id');
				$name=filter_input(INPUT_POST,'name');
				$price=filter_input(INPUT_POST,'price');
				$q=filter_input(INPUT_POST,'quantity');
				
				
			if(isset($_SESSION['shopping_cart']))
			{
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
					$query1="insert into track values('".$id."','".$name."',".$price.",".$q.")";
				$rs1=mysqli_query($con,$query1);
				
					for($i=0;$i<count($product_ids);$i++)
					{
						if($product_ids[$i]==filter_input(INPUT_GET,'id'))
						{
							$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
						}
					}
				}
				
				
			}
			else
			{
				$query1="insert into track values('".$id."','".$name."',".$price.",".$q.")";
				$rs1=mysqli_query($con,$query1);
				
				$_SESSION['shopping_cart'][0]=array
				(
					'product_id' => filter_input(INPUT_GET,'id'),
					'product_name' => filter_input(INPUT_POST,'name'),
					'product_price' => filter_input(INPUT_POST,'price'),
					'quantity' => filter_input(INPUT_POST,'quantity')
					
				);
			}
			
		
		}
		else
		{
			$_SESSION['count']=0;
		}*/
		
		if(filter_input(INPUT_GET,'action') == 'delete')
		{
			$id=filter_input(INPUT_GET,'id');
			foreach($_SESSION['shopping_cart'] as $key => $product)
			{
				if($product['product_id']== filter_input(INPUT_GET,'id'))
				{
					$query2="DELETE FROM track where product_id='".$id."'";
					$rs2=mysqli_query($con,$query2);
					
					unset($_SESSION['shopping_cart'][$key]);
				}
				$count=count($_SESSION['shopping_cart']);
				$_SESSION['count']=$count;
				
				}
			$_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
		
		}
	
		
?>
<!DOCTYPE html>
	<head><title>shopat.com</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	
	<style>
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
}
	</style>
	</head>
	<body>
	<div class="container" style="background-color: #F0FFFF; ma: margin: auto
			">
		<table class="table"  style="
			width: 100%;
			border: 3px solid #73AD21;
			background-color:  	#F0FFFF">
				<tr>
				<td><img src="logo.jpg" width="80px" height="70px"/></td>
				<?php if(!isset($_SESSION['user'])){?>	
					<td align="right" id="1">
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto; float: right;">Login</button>

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
</script></td>
<td align="right"><!-- Button to open the modal -->
<button onclick="document.getElementById('id02').style.display='block'" style="width: auto">Sign Up</button>

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
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> 
</td>
				<?php } else{?>
				<td>
<button onclick="myf();" style="width:auto; float: right;">Logout</button>
		<script>
			function myf()
			{
				window.location.href="out.php";
			}
			
		</script>
					
			</td>
				<?php } ?>
					
</tr>
			</table>
		<div style="clear:both"></div>
		</br>
		<div class="table-responsive">
			<table class="table">
				<th colspan=5><h3>ORDER DETAILS</h3></th>
				<tr>
					<th width="40%">PRODUCT NAME</th>
					<th width="10%">PRICE</th>
					<th width="15%">QUANTITY</th>
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
					<td><a href="add_cart.php?action=delete&id=<?php echo $row1['product_id'];?>">
						<div class="btn-danger">Remove</div>
						</a>
					</td>
				</tr>
				<?php	
						$total=$total+$row1['product_price']*$row1['quantity'];
						}
				?>
						<tr ><td colspan="4" align="right"><b>TOTAL:</b></td>
						<td colspan="4" align="right"><b><?php echo number_format($total,2);?></b></td></tr>
				
				<?php
				
					}
					else if($_SESSION['count']==0)
					{
						?><td colspan=5><h4 align="center">YOUR CART IS EMPTY!</h4></td>
						<?php
					}
				?>
			</table>
		</div>
		 <div class="clearfix">
        <button type="button"  onclick="myfun();" class="cancelbtn">CONTINUE SHOPPING</button>
        <?php if(isset($_SESSION['user'])){?>
		<button type="submit"  onclick="document.getElementById('id03').style.display='block'" class="signupbtn">PURCHASE ORDER</button>
		
<!-- The Modal (contains the Sign Up form) -->
<div id="id03" class="modal">
  <form class="modal-content animate" method="post" action="purchase.php">
  <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="logo.jpg" alt="FILL THIS FORM!" class="avatar">
    </div>

    <div class="container1">
	
	 <label style="float: left;"><b>Enter full name:</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

	    <label style="float: left;"><b>Shipping Address:</b></label>
      <input type="text" placeholder="Enter Username" name="add" required>

     

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
	  
	   <label style="float: left;"><b>City</b></label>
      <input type="text" placeholder="Enter Username" name="city" required>

      
	   <label style="float: left;"><b>Pin Code</b></label>
      <input type="text" placeholder="Enter Pin Code" name="pin" required>
	  
	  
	   
	   
       <div class="clearfix">
       <button style="float: right;" onclick="myfun1();" class="signupbtn">PROCEED TO PAYMENT</button>
      </div>
    </div>
  </form>
</div> 
 <script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> 
		<script>
			function myfun()
			{
				window.location.href="index.php";
			}
			function myfun1()
			{
				window.location.href="purchase.php";
			}
		</script>
		</div><?php } else{ ?> <button type="submit"  onclick="myg();" class="signupbtn">PURCHASE ORDER</button>
		
		<script>function myg(){alert("Login to purchase....");}</script><?php }?>
   
	</body>
</html>