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

if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $query = "SELECT * FROM cart WHERE name='$product_name' AND user_id = '$user_id'";
    $check_cart_number = mysqli_query($conn, $query);

    if(mysqli_num_rows($check_cart_number)> 0 ){
        $message[] = 'already added to cart';
    }else{
        $insert_cart = "INSERT INTO cart(user_id, name, price, quantity, image) VALUES ('$user_id','$product_name','$product_price','$product_quantity','$product_image')";
        mysqli_query($conn, $insert_cart);

        $message[] = 'product added to cart';
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

<title>Cherry Cake | Cup Cakes</title>
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
			<span class="head-3">Cup Cakes</span>
		</div>
	  </div>
  </div>
</div>
<!--Background End-->	  
	  
<!--Images Start-->
<div class="container margin-1">
	<div class="row text-center">
		<?php
			$select_query = "SELECT * FROM cup";
			$select_products = mysqli_query($conn, $select_query);
			if(mysqli_num_rows($select_products) > 0){
				while($fetch_products = mysqli_fetch_assoc($select_products)){                
		?>
		<div class="col-md-3">			
			<div class="shadow-1 margin-4">				
				<img class="img-fluid" src="Admin/uploarded_img/<?php echo $fetch_products['image']; ?>" alt="Two Tier Printed Fondant Cake">
				<h2 class="wd-product-h2"><?php echo $fetch_products['name']; ?></h2>
				<h3 class="wd-product-h3"><strong>Price </strong>Rs <?php echo $fetch_products['price']; ?>/-</h3>
				
				<form action="" method="POST">
				<input type="number" min="1" name="product_quantity" value="1" class="qty">
            	<input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            	<input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            	<input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
				
            	<input type="submit" value="add to cart" name="add_to_cart" class="btn">
				</form>					
			</div>			
		</div>
		<?php
			}
		}else{
			echo '<p class="empty">no product added yet!</p>';
		}
		?>		
	</div>
</div>
<!--Images End-->
	  
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