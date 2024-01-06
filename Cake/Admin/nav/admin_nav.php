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

<div class="container-fluid bg-light">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="admin_page.php">Admin<span>Panal</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="admin_page.php">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item nav-link" href="wedding-cake.php">wedding cake</a>
							<a class="dropdown-item nav-link" href="birthday-cake.php">birthday cake</a>
							<a class="dropdown-item nav-link" href="cup-cake.php">cup cake</a>							
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="orders.php">Orders</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="customers.php">Customers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="messages.php">Messages</a>
					</li>                
				</ul>
			</div>
			
			<div id="user-btn" class="fas fa-user icons"></div>

			<div class="account-box">
            <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
        	</div>
			
		</nav>
	</div>
</div>