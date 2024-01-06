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

if(isset($_POST['send'])){

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$number = $_POST['number'];
	$msg = mysqli_real_escape_string($conn, $_POST['message']);
 
	$select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
 
	if(mysqli_num_rows($select_message) > 0){
	   $message[] = 'message sent already!';
	}else{
	   mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
	   $message[] = 'message sent successfully!';
	}
 
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

<title>Cherry Cake | Cotact Us</title>
</head>
<body>

<?php
	include 'nav_footer/nav.php';
?>
	  
<!--Backgrond Start-->	  
<div class="container-fluid bg-1">
  <div class="container text-center">
	<div class="row">
		<div class="col-12 margin-3 margin-3-md">
			<a class="head-1" href="index.html">HOME</a>
			<span class="head-2">|</span>
			<span class="head-3">Contact Us</span>
		</div>
	  </div>
  </div>
</div>
<!--Backgrond end-->
	
<!--Contact Us Start-->	  
<div class="container margin-1">
	<div class="row">
		<div class="col-md-4">
			<h2 class="contact-us-h2">Contact us</h2>
			<p class="contact-us-p">We, Cherry Cake is here to provide you with more information, answer any questions you may have.</p>
			<p>Here's how you can reach us...</p>
			<h3 class="margin-1 contact-us-h3">Address:</h3>
			<address class="contact-us-address">No. 82 Ja Ela Ekala, <br>Gampaha Yakkala Hwy,<br> Gampaha,<br>Sri Lanka.</address>
			<h3 class="margin-5 contact-us-h3">Phone number:</h3>
			<a class="contact-us-link" href="tel:+94770123456">+94 770 123 456</a>
			<h3 class="margin-5 contact-us-h3">E-mail Addres</h3>
			<a class="contact-us-link" href="mailto:info@cherrycake.com">info@cherrycake.com</a>
		</div>
		<div class="col-md-8">
			<h2 class="contact-us-h2 md-get-in">Get in Tuch</h2>
			<form method="POST" class="contact-us-bg padding-1" name="myForm" onsubmit="return validateForm()">
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control" type="text" name="name" placeholder="Your Name">
				</div>
				<div class="form-group">
					<label for="email">E-mail Address</label>
					<input class="form-control" type="email" name="email" placeholder="Your Mail Address">
				</div>
				<div class="form-group">
					<label for="phone">Phone Number</label>
					<input class="form-control" type="number" name="number" placeholder="Your Contact Number">
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" class="form-control"></textarea>
				</div>
				<button class="submit" name="send">submit</button>
			</form> 
		</div>
	</div>
	
	
	
	
	<div class="row margin-1">
		<div class="col-12">
			<h2 class="contact-us-h2">Location</h2>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4047329.221962244!2d80.7061035071877!3d7.845783199886115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2fb8963502ec9%3A0xe0fcd5b6d2d42516!2sCherry%20Cake%20Decorations!5e0!3m2!1sen!2slk!4v1611166078739!5m2!1sen!2slk" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
</div>	  
<!--Contact Us End-->	  
	  
<?php
	include 'nav_footer/footer.php'
?>	

<!-- custom admin js file link -->
<script src="source/js/user_script.js"></script>
	
<!-- Bootstrap JS -->
<script src="source/js/popper.min.js"></script>
<script src="source/js/jquery-3.4.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
<script>
	function validateForm(){
		var x = document.forms["myForm"]["email"].value;
		if (x == ""){
			alert("E-mail Addres must be filled out. ");
			return false;
		}
	}
</script>	
</body>
</html>