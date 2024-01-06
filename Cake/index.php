<?php 
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cake';
$conn = mysqli_connect('localhost', 'root', '', 'cake') or die('connection failed');

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >

<!--	Style CSS	-->
<link href="source/css/style.css" rel="stylesheet">

<!-- Link for fontawesome -->
<script src="https://kit.fontawesome.com/affc06d9e8.js" crossorigin="anonymous"></script>
		
<title>Cherry Cake</title>
</head>
<body>	  

<?php
	include 'nav_footer/nav.php';
?>
	  
<!--Slider Start-->  
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="images/slider/cake-pice.jpg" class="d-block w-100" alt="">
			<div class="carousel-caption">
				<h2 class="slider-1-h2">DELICIOUS</h2> 
				<h3 class="slider-1-h3">CAKES FOR YOU</h3> 
				<p class="slider-1-p">Cherry Cake offers the best cakes and sweets for you.</p>
			</div>
		</div>
		<div class="carousel-item">
			<img src="images/slider/cup-cake.jpg" class="d-block w-100" alt="">
			<div class="carousel-caption">
				<h2 class="slider-2-h2">WHAT WE OFFER</h2>
				<p class="slider-2-p">We Bake the Best Baked Goods. </p>
			</div>			
		</div>
		<div class="carousel-item">
			<img src="images/slider/cup-cake02.jpg" class="d-block w-100" alt="">
			<div class="carousel-caption">
				<h2 class="slider-3-h2">Wedding Planning</h2>
				<p class="slider-2-p slider-3-md">Create &amp; plan your perfect wedding with Cherry Cake.</p>
			</div>			
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
	<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
</div>
<!--Slider End-->
	  
<!--About Start-->
<div class="container margin-1" >
	<div class="about-background">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="about-h1">Welcome to Cherry Cake</h1>
				<p class="about-p">We at Cherry Cake have over 30 years of experience in the art of making the finest wedding cakes and love cakes. All cakes made out of the finest ingredients by our well trained and committed skilled workforce. We indeed have perfected the 'art of rich cakes'- as our customers over the years readily agree.</p>
				<a href="about-us.php" class="about-a">Read more</a>
			</div>
		</div>			
	</div>
</div>
<!--About End-->
	  
<!--Offer Start-->	  
<div class="container margin-2">
	<div class="row">
		<div class="col-12">
			<h2 class="about-offer-h2">WHAT WE OFFER</h2>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md">
			<div class="shadow-1">
				<img src="images/home/wedding-cake.jpg" class="img-fluid img-thumbnail" alt="Wedding cake image" >
				<h3 class="about-offer-h3">WEDDING CAKE </h3>
				<p class="about-offer-p">Want to make your wedding unforgettable? Then you need to order a uniqe wedding cake at our online store.</p>
				<a href="wedding-cakes.php" class="about-offer-a">View Cakes</a>
			</div>
		</div>
		<div class="col-md">
			<div class="shadow-1">
				<img src="images/home/birthday-cake.jpg" class="img-fluid img-thumbnail" alt="Birthday cake image">
				<h3 class="about-offer-h3">BIRTHDAY CAKE</h3>
				<p class="about-offer-p">We provide a variety of cakes for any party made with high- quallity natural ingredients and no preservatives.</p>
				<a href="birthday-cakes.php" class="about-offer-a">View Cakes</a>
			</div>
		</div>
		<div class="col-md">
			<div class="shadow-1">
				<img src="images/home/cup-cake.jpg" class="img-fluid img-thumbnail" alt="Cup cake image">
				<h3 class="about-offer-h3">CUP CAKE</h3>
				<p class="about-offer-p">Nothing tasetes better than a cup cake with a variety of flavors,Which is always availlable at our online store.</p>
				<a href="cupcakes.php" class="about-offer-a">View Cakes </a>
			</div>
		</div>
	</div>
</div>
<!--Offer End-->
	  
<?php
	include 'nav_footer/footer.php'
?>	  

<!-- custom admin js file link -->
<script src="source/js/user_script.js"></script>
	  
	  
<!-- Bootstrap JS -->
<script src="source/js/popper.min.js"></script>
<script src="source/js/jquery-3.4.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>