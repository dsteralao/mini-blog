<?php
require 'embeded.php';
if(!isset($_GET['ID']) || $_GET['ID'] == ''){ //if no id is passed to this page take user back to previous page
    
}
$id = $_GET['id'];
$v = "SELECT * FROM blog_post WHERE ID='$id'";
$vp = $conn->query($v);
$row = $vp->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog | Post</title>
    <meta name="description" content="">
    <meta name="Author" content="Adedayo Alao">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
	<!--icon-->
	<link rel="icon" type="image/png" href="./images/logos/logo1.png">
	<link rel="apple-touch-icon" href="./images/logos/logo1.png">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500i|Roboto" rel="stylesheet">
    <script src="scripts/jquery.min.js"></script>
	<script src="scripts/popper.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
	<link rel="stylesheet" href="stylesheets/animate.css">
    <script src="scripts/jquery.aniview.js"></script>
    <link rel="stylesheet" href="stylesheets/bootstrap.min.css">
    <script src="scripts/script.js"></script>
	<link rel="stylesheet" href="stylesheets/style.css">
	
</head>
<body class="main">
<div class="loader"> </div>
<div style="height:350px;width:100%; background-color:black">
<img class="img-responsive" src="./images/blog.jpg" style="height:100%;width:100%;">
</div>
<nav  class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
	 
        <a class="navbar-brand animated tada " style="color:White">
		<img class=" img-fluid " style="width:40px;"src="./images/logos/logo1.png" > HowFar China</a>
		
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar"> 
			<span class="navbar-toggler-icon"></span>	  
      </button>
   
    <div class="collapse navbar-collapse justify-content-between" id="myNavbar">
      <ul class=" navbar-nav">
        <li class=" nav-item "><a class="nav-link" href="https://www.howfarchina.com/" >Home</a></li>
        <li class="nav-item " ><a class="nav-link" href="https://www.howfarchina.com/index.php#aboutus" >About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="https://www.howfarchina.com/services.php"> Our Services</a></li>
      </ul>
	  
      <ul class="navbar-nav ">
	  <li class=" active nav-item"><a class="nav-link" href="https://www.blog.howfarchina.com/">Blog</a></li>
	  <li class="nav-item"><a class="nav-link" href="https://www.howfarchina.com/faq.php">FAQ</a></li>
		<li class="nav-item"><a class="nav-link" href="https://www.howfarchina.com/offers.php">Study Offers</a></li>
        <li class="nav-item" style="background-color:#BF55EC;margin:1px"><a class="nav-link" href="https://www.howfarchina.com/index.php#contact">Get In Touch</a></li>
      </ul>
	  
    </div>  
</nav>

<div class="container" style="height:250px;background-color:#BDC3C7;margin-top:20px">
<p style="text-align:center;color:white;position:relative;top:35%"><b style="font-size:44px;"> OUR BLOG</b> <br>
<em style="font-size:22px;">Stories from across... </em> </p>


</div>
<div class="container-fluid">


</div>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<?php 
		 
				echo '<div class="cont-div" style="background-color:#eceaef;margin-top:20px;padding:20px;margin-bottom:20px;">';
							echo '<div class="top-div">';
							echo '<p class="" style="font-size:24px;text-align:center;color:black">';
								echo strtoupper(''.$row['title'].'');
								echo '</p>';
								
									echo '<img class="img-responsive" src="./images/blog.jpg" style="height:200px;width:100%;">';
								
								echo '<p  style="font-size:15px;text-align:center;color:black">Posted by:';
								echo ucfirst(''.$row['Author'].'');
								echo '</p>';
							echo '</div>';
							echo '<div class="cont">';
							echo $row["Content"];
							echo '</div>';
							
						echo '</div>';
					
					
						?>
	</div>
	<div class="col-md-1"></div>
</div>


<section class="footer" style="background-color:#000000;color:white;min-height:250px"> 
 <div style="padding:10px;" class="container">
	<div class=" row">
		<div class="col-md-6">
		<h4>  About Us</h4>
				<p>
				HowFarChina can be seen as a platform created for anyone wanting to expand their reach and explore China. 
				Founded in 2014 by both Pacer Groups in China and Rarewood Bridge Nigeria with the aim of assisting you gain useful information about China and help you with your dealings with China.	
					
				</p> 
				
		</div>
		<div class="col-md-3">
		<h4>  Internal Links</h4>
				<ul>
					<li><a  href="https://www.howfarchina.com/faq.php">FAQs</a></li>
					<li><a  href="https://www.howfarchina.com/services.php" >Services</a></li>
					<li><a href="https://www.howfarchina.com/offers.php" >Current Offers</a></li>
					
				</ul> 
		</div>
		<div class="col-md-3"> <h4> External Links</h4>
				<ul>
					
					<li><a  href="https://www.rwb.howfarchina.com/" >Rarewood Bridge</a></li>
					<li><a href="https://www.ace.howfarchina.com/portfolio.php" >D-ster's Portfolio</a></li>
					<li><a href="https://www.ace.howfarchina.com/" >D-ster's Webpage</a></li>
					
				</ul>
		</div>
	
	
	
	</div>

	
	<p style="text-align:center; margin:3px;color:white;bottom:0;left:40%;padding:20px"> Page developed and managed by <a href="https://www.ace.howfarchina.com/"> dster</a> </p>
</div>
</section>

</body>