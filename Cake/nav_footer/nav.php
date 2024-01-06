<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<!--Nevigation start-->   
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php"><img src="images/home/chery-logo.jpg" alt="logo"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about-us.php">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="wedding-cakes.php">Wedding Cakes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="birthday-cakes.php">Birth-Day Cakes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="cupcakes.php">Cup Cakes </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact-us.php">Contact Us</a>
				</li>
			</ul>
		</div>

		<div class="icons">
            <div id="user-btn" class="fas fa-user"></div>
             <?php
            	$query = "SELECT * FROM cart WHERE user_id='$user_id'";
                $select_cart_number = mysqli_query($conn, $query);
                $carts_row_number = mysqli_num_rows($select_cart_number)
            ?>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $carts_row_number; ?>)</span></a>
        </div>

		<div class="account-box">
            <p>username: <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email: <span><?php echo $_SESSION['user_email']; ?></span></p>
           <a href="logout.php" class="delete-btn">logout</a>
        </div>
	</nav>
</div>
<!--Nevigation end-->  