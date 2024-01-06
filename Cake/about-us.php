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

<title>Cherry Cake | About Us</title>
</head>
<body>

<?php
	include 'nav_footer/nav.php';
?>
	  
<!--Backgroun Start-->	  
<div class="container-fluid bg-1">
	<div class="container text-center">
		<div class="row">
			<div class="col-12 margin-3 margin-3-md">
				<a class="head-1" href="index.php">HOME</a>
				<span class="head-2">|</span>
				<span class="head-3">About Us</span>
			</div>
		</div>
	</div>
</div>
<!--Backgroun End-->	  
	  
<!--Cherry Cake Start-->	  
<div class="container margin-1">
	<div class="row">
		<div class="col-md-4">
			<img class="img-fluid img-thumbnail margin-2" src="images/about/about-cherry-cake.jpg" alt="Cake imge">
		</div>
		<div class="col-md-8">
			<h1 class="about-us-h1">Cherry Cake.</h1>
			<p class="about-us-p">We at Cherry Cake have over 30 years of experience in the art of making the finest wedding cakes and love cakes. All cakes made out of the finest ingredients by our well trained and committed skilled workforce. We indeed have perfected the 'art of rich cakes' - as our customers over the years readily agree. Cakes to any dimension and a variety of sizes and cakes without alcohol are made on customer requests.<br><br>We're an ISO 22000 certified company for Food Safety Management and a recipient of Lanka Star Awards and Asia Star Awards in 2017 for packaging excellence.<br><br>Our cakes are received by clients globally catering to both the local market as well as the overseas market - on client request orders are delivered through courier for the overseas market. Our distinctive recipes and scrumptious cakes prepared to the highest standards brings smiles to millions around the globe as there's nothing quite like a cake from Cherry Cake.
			</p>
		</div>
	</div>
</div>
<!--Cherry Cake End-->	  
	  
<!--Safty Policy Start-->	  
<div class="container margin-2">
	<div class="row">
		<div class="col-12">
			<h2 class="about-us-h2">Food Safety Policy</h2>
			<p class="about-us-p">The organization of Cherry cake involved in the business of Rich cake and Love cake production has a moral obligation to safeguard our customers. We are committed to ensure good hygienic conditions in order to provide safe food to satisfy our customers. And we shall ensure compliance with relevant statutory and regulatory requirements.<br><br>Measurable objectives shall be developed in line with the policy. We shall communicate our policy to all stakeholders. We shall communicate our policy to all stakeholders. We shall implement and maintain the policy at all levels of the organization and review for continuing sustainability.<br><br>We shall continually improve the system in order to maintain an effective Food Safety Management System in accordance with the requirements of ISO 22000.</p>
		</div>
	</div>
</div>
<!--Safty Policy End-->	  
	  
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