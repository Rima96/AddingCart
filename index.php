<?php
	session_start();
	$con=mysqli_connect("localhost","root","","shopat");
		
		
	$total=0;
	if(isset($_SESSION['shopping_cart']))
	{	
		foreach($_SESSION['shopping_cart'] as $key => $row1)
       {
		   $total=$total+$row1['quantity'];
		   $_SESSION['count']=$total;
		}
	}
	else
	{
		$_SESSION['count']=0;
		$count=0;
			$query="select * from track";
			$rs=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($rs))
			{
				$_SESSION['shopping_cart'][$count]=array
				(
					'product_id' => $row[0],
					'product_name' => $row[1],
					'product_price' => $row[2],
					'quantity' => $row[3]
					
				);
				$count++;
			}
		
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	
<style>
.w3-badge{background-color:#000;color:#fff;display:inline-block;padding-left:8px;padding-right:8px;text-align:center;border-radius:50%}
.w3-green{color:#fff!important;background-color:#4CAF50!important}

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 10px;
  padding: 8px 12px;
  position: absolute;
  top: 100px;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.right{
			align: right;
			width: 100%;
			border: 3px solid #73AD21;
			padding: 10px 10px 10px 800px;
			background-color:  	#F0FFFF;
			
		  }
		
			.left{
				width: 100%;
				border: 3px solid #73AD21;
				padding: 10px 1000px 10px 10px;
				background-color: 	#F0FFFF;
			
				}
		  
		  .center {
					padding-left: 50px;
					border: 3px solid green;
					width: 100%;
					background-color:  	#F0FFFF;
				}

.fa {
  padding: 20px;
  font-size: 30px;
  width: 80px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

</style>
</head>
<body>

<?php if(isset($_SESSION['user'])){
	$_SESSION['user']=$_SESSION['user'];
	?>
	
	<table class="right">
				<tr><td><img src="logo.jpg" width="80px" height="70px" align="left"/></td>
				
				<td>Hello <?php echo $_SESSION['user'];?>!</td>
					<td><a href='add_cart.php'>CART<span class="w3-badge w3-green"><?php echo $_SESSION['count'];?></span></a></td>
					<td><a href="#">TRACK ORDER</a></td>
					<td><a href="out.php">LOG OUT</a></td>
					
			</tr>
			</table>
<?php }
		else	{
		?>
		
	<table class="right">
				<tr><td><img src="logo.jpg" width="80px" height="70px" style="float: left;"/></td>
				
				<td><a href='add_cart.php'>CART<span class="w3-badge w3-green"><?php echo $_SESSION['count'];?></span></a></td>
					<td><a href="mens.php">SIGN UP</a></td>
					<td><a href="mens.php">LOG IN</a></td>
					
			</tr>
			</table>
		<?php } ?>
	
<table	class="left">
					<tr><td><div class="dropdown">
							<span class="dropbtn"><b>MENS</b></span>
							<div class="dropdown-content">
							<dl>
							<dt><b>Top Wear</b></dt>
							<dd><a href="mens.php?pid=Shirts">Shirts</a></dd>
							<dd><a href="mens.php?pid=T-Shirts">T-Shirts</a></dd>
							<dd><a href="mens.php?pid=kurta">Kurtas</a></dd>
							</dl>
							
							<dl>
							<dt><b>Bottom Wear</b></dt>
							<dd><a href="#">Jeans</a></dd>
							<dd><a href="#">Trousers</a></dd>
							<dd><a href="#">Track pants</a></dd>
							</dl>
							</div>
							</div> </td>
					<td><div class="dropdown">
							<span class="dropbtn"><b>WOMENS</b></span>
							<div class="dropdown-content">
							<dl>
							<dt><b>Top Wear</b></dt>
							<dd><a href="mens.php?pid=wshirts">Shirts</a></dd>
							<dd><a href="mens.php?pid=wts">T-Shirts</a></dd>
							<dd><a href="mens.php?pid=wks">Kurtas</a></dd>
							</dl>
						</div>
						</div>
						</td>
					<td><div class="dropdown">
							<span class="dropbtn"><b>KIDS</b></span>
							<div class="dropdown-content">
							<dl>
							<dt><b>Top Wear</b></dt>
							<dd><a href="#">Shirts</a></dd>
							<dd><a href="#">T-Shirts</a></dd>
							<dd><a href="#">Ethnic Wear</a></dd>
							</dl>
							
							<dl>
							<dt><b>Bottom Wear</b></dt>
							<dd><a href="#">Jeans</a></dd>
							<dd><a href="#">Trousers</a></dd>
							<dd><a href="#">Track pants</a></dd>
							</dl>
							</div>
							</div> </td>
							</table>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img_1.jpg" style="width:100%">
  <div class="text">Sale at 50% Discount</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img_2.jpg" style="width:100%">
  <div class="text">Sale at 50 % discount</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img_3.jpg" style="width:100%">
  <div class="text">Sale at 50% discount</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<table class="center">
				<tr><td>CONNECT WITH US:</td>
					<td><a href="https:\\www.facebook.com" class="fa fa-facebook"></a></td>
					<td><a href="www.twitter.com" class="fa fa-twitter"></a></td>
					<td><a href="www.google.com" class="fa fa-google"></a></td>
					<td><a href="www.linkedin.com" class="fa fa-linkedin"></a></td>
					<td><a href="www.youtube.com" class="fa fa-youtube"></a></td>
				</table>
<table style="background-color: #F0FFFF; width:100%; padding-left: 50%; padding-top: 20px">
				<tr><td>&copy;All rights Reserved!</td></table>
		

</body>
</html> 
