<?php
require 'embeded.php';
$results_per_page = 7; // number of results per page

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;



//all posts
$sel_all= "SELECT * FROM blog_post ORDER BY date ASC LIMIT $start_from, ".$results_per_page;
$dal=$conn->query($sel_all);


function make_excerpt($text,$text_len = 200, $append='...'){
	if ( strlen( $text ) < $text_len ) {
        echo $text;
    }
    else {
        $excerpt = substr( $text, 0, $text_len );
        $excerpt .= $append;
        echo $excerpt;
    }
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog | Homepage</title>
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
	<style>

.card{
	background-color: white;
  padding: 20px;
  margin-top: 20px;
}
	</style>
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
	  <li class=" active nav-item"><a class="nav-link" href="#">Blog</a></li>
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
<div class="row" style="margin-top:20px">
	
	<div class=" col-md-9" style="background-color:;margin-bottom:20px;">
		<?php 
		 
					while ($row = $dal->fetch_assoc()){
							if ($row['ID']!=1){
								
						echo '<div class="" style="background-color:#eceaef;margin-top:20px;padding:20px;margin-bottom:20px;">';
						echo '<img class="img-responsive" src="./images/blog.jpg" style="width:250px;float:left;margin:10px">';
						
							echo '<div style="color:#1d1a22">';
							echo '<p class="" style="font-size:24px;text-align:center"><a style="color:black;" href="viewblog.php?id='.$row['ID'].'"> '.strtoupper(''.$row['title'].'').'</a> <br>
						<span style="font-size:12px;color:#1d1a22">Posted by:'.ucfirst(''.$row['Author'].'').'</span> ,
						<span style="font-size:12px;color:#1d1a22">Posted on:'.$row['Date'].'</span>
						</p>';
							echo '<p style="margin:10px" > '.make_excerpt(''.$row['Content'].'').'</p>';
							echo '</div>';
							
							
						echo '</div>';
					 }else { echo "<script>alert('there are no post available')</script>";
					 }
					}
					
		?>
		
		
		 <div style="width:60%;margin:auto">
  <?php 
$sql = "SELECT COUNT(ID) AS total FROM blog_post ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  
  echo "<ul class='pagination' style=''>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            
			echo " <li class='page-item'><a class='page-link' href='blog.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> </li>";
			
}; 
echo "</ul>";
?>
</div>
	</div>
	
	<div class=" col-md-3" style="background-color:#eceaef;margin-bottom:10px"> 
		<div class="card">
      
    <div class="card">
       <h3>Filter Posts By Category</h3>
	  <form id="search_form" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' name='form_filter' enctype="multipart/form-data">

			<label class="radio-inline">
			<input type="radio" name="category" value="" checked onclick="javascript:submit()"/>All
			</label></br>
			<label class="radio-inline">
			<input type="radio" name="category" value="Business_posts" onclick="javascript:submit()" <?php if (isset($_POST['category']) && $_POST['category'] == 'Business_posts') echo ' checked="checked"';?>/>Business Posts
			</label></br>
			<label class="radio-inline">
			<input type="radio" name="category" value="Educational_posts" onclick="javascript:submit()" <?php if (isset($_POST['category']) && $_POST['category'] == 'Educational_posts') echo ' checked="checked"';?>/>Educational Posts
			</label></br>
	
			
	</form>
    </div>
    <div class="card">
      <h3>Follow Us</h3>
   <div style="width:auto">
				<a href="https://www.facebook.com/HowFarChina/" class="oni" > <span ><i class="fab fa-facebook fa-lg" aria-hidden="true"  ></i> </span></a>
				
				<a href="https://www.instagram.com/HowFarChina/" class="oni" > <span ><i class="fab fa-instagram fa-lg" aria-hidden="true"  ></i> </span></a>
			</div>
    </div>
	</div>
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
</html>