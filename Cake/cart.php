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


if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM cart WHERE id='$delete_id'");
    header('location: cart.php');
}

if(isset($_GET['delete_all'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");
    header('location: cart.php');
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
	
<title>Cherry Cake | cart</title>
</head>
<body>

<?php
	include 'nav_footer/nav.php';
?>
	  
<!--Background Start-->	  
<div class="container-fluid bg-1">
  <div class="container text-center">
	<div class="row">
		<div class="col-12 margin-3 margin-3-md">
			<a class="head-1" href="index.php">HOME</a>
			<span class="head-2">|</span>
			<span class="head-3">cart</span>
		</div>
	  </div>
  </div>
</div>
<!--Background Start-->	

<!--Images Start-->
<div class="container margin-1">
	<div class="row text-center">
    <?php
            $grand_total = 0;
            $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
            $select_cart = mysqli_query($conn, $query);
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){                
        ?>
        <div class="col-md-3">
            <div class="shadow-1 margin-4">
                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
                <img class="img-fluid" src="Admin/uploarded_img/<?php echo $fetch_cart['image']; ?>" alt="">
                <div class="wd-product-h2"><?php echo $fetch_cart['name']; ?></div>
                <br>
                <div class="wd-product-h3">Rs <?php echo $fetch_cart['price']; ?>/-</div>
                

                <div class="sub-total">sub total : <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-S</span></div>
                
            </div>
        </div>
        <?php
            $grand_total += $sub_total;
                }
            }else{
                echo '<p class="empty">your cart is empty</p>';
            }
        ?>		
	</div>
</div>
<!--Images End--> 


    <div style="margin-top:2rem; text-align:center;">
        <a href="cart.php?delete_all" class="delete-btn <?php echo($grand_total > 1)?'':'disabled';?>" onclick="return confirm('delete all from cart?');">delete all  </a>
    </div>

    <div class="cart-total">
        <p>grand total : <span>$<?php echo $grand_total; ?></span></p>
        <div class="flex">
            <a href="index.php" class="option-btn">continue shopping</a>
            <a href="checkout.php" class="btn <?php echo($grand_total > 1)?'':'disabled';?>">proceed to checkout</a>
        </div>
    </div>
</section>

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