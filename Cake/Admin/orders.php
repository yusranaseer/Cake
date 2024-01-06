<?php 
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cake';
$conn = mysqli_connect('localhost', 'root', '', 'cake') or die('connection failed');

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_POST['update_order'])){
    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    $update_order = "UPDATE orders SET payment_status = '$update_payment' WHERE id = '$order_update_id'";
    mysqli_query($conn, $update_order);
    $message[] = 'payment status has been updated!';
}
    
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = "DELETE FROM orders WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_query);
    header('location:orders.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" >

<!--	Style CSS	-->
<link href="source/css/admin_style.css" rel="stylesheet">

<!-- Link for fontawesome -->
<script src="https://kit.fontawesome.com/affc06d9e8.js" crossorigin="anonymous"></script>
	
<title>Dashboard</title>
</head>
<body>	  

<?php 
    include 'nav/admin_nav.php'
?>

<section class="orders">
    <h1 class="title">placed orders</h1>

    <div class="box-container">
        <?php
            $order_query = "SELECT * FROM orders";
            $select_orders = mysqli_query($conn, $order_query);
            if(mysqli_num_rows($select_orders) > 0){
                while($fetch_orders = mysqli_fetch_assoc($select_orders)){

               
        ?>
        <div class="box">
            <p>useer id : <span><?php echo $fetch_orders['user_id']; ?></span></p>
            <p>name : <span><?php echo $fetch_orders['name']; ?></span></p>
            <p>number : <span><?php echo $fetch_orders['number']; ?></span></p>
            <p>email : <span><?php echo $fetch_orders['email']; ?></span></p>
            <p>address : <span><?php echo $fetch_orders['address']; ?></span></p>
            <p>total products : <span><?php echo $fetch_orders['total_products']; ?></span></p>
            <p>total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span></p>
            <p>payment method : <span><?php echo $fetch_orders['method']; ?></span></p>

            <form action="" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <select name="update_payment">
                    <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                    <option value="pending">pending</option>
                    <option value="completed">completed</option>
                </select>
                <input type="submit" value="update" name="update_order" class="option-btn">
                <a href="orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
            </form>
        </div>
        <?php
        }
            }else{
                echo '<p class="empty">no orders placed yet!</p>';
            }
        ?>
    </div>
    
</section>

<!-- custom admin js file link -->
<script src="source/js/admin_script.js"></script>
	  
<!-- Bootstrap JS -->
<script src="source/js/popper.min.js"></script>
<script src="source/js/jquery-3.4.1.slim.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>