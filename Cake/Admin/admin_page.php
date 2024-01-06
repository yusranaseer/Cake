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

<!-- dashboard starts -->
<section>
    <h1 class="title">dashboard</h1>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $total_pendings = 0;
                        $select_pending = mysqli_query($conn, "SELECT total_price FROM orders WHERE payment_status ='pending'") or die();
                        if(mysqli_num_rows($select_pending) > 0){
                            while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                                $total_price = $fetch_pendings['total_price'];
                                $total_pendings += $total_price;
                            };
                        }
                    ?>
                    <h3><?php echo '$'.$total_pendings.'/-'; ?></h3>
                    <p>total pendings</p>
                </div>                
            </div> 
            
            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $total_completed = 0;
                        $select_completed = mysqli_query($conn, "SELECT total_price FROM orders WHERE payment_status ='completed'") or die('query failed');
                        if(mysqli_num_rows($select_completed) > 0){
                            while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                                $total_price = $fetch_completed['total_price'];
                                $total_completed += $total_price;
                            };
                        }
                    ?>
                    <h3><?php echo '$'.$total_completed.'/-'; ?></h3>
                    <p>completed payments</p>
                </div>                
            </div> 

            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $query = "SELECT * FROM orders";
                        $select_users = mysqli_query($conn, $query);
                        $number_of_orders = mysqli_num_rows($select_users);
                    ?>
                    <h3><?php echo $number_of_orders; ?></h3>
                    <p>order placed</p>
                </div>                
            </div>

            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $query1 = "SELECT * FROM wedding";
                        $select_products1 = mysqli_query($conn, $query1);
                        $number_of_products1 = mysqli_num_rows($select_products1);

                        $query2 = "SELECT * FROM birthday";
                        $select_products2 = mysqli_query($conn, $query2);
                        $number_of_products2 = mysqli_num_rows($select_products2);

                        $query3 = "SELECT * FROM cup";
                        $select_products3 = mysqli_query($conn, $query3);
                        $number_of_products3 = mysqli_num_rows($select_products3);

                        $number_of_products = $number_of_products1 + $number_of_products2 + $number_of_products3;
                    ?>
                    <h3><?php echo $number_of_products; ?></h3>
                    <p>products added</p>
                </div>                
            </div>

            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $query = "SELECT * FROM users WHERE user_type = 'user'";
                        $select_users = mysqli_query($conn, $query);
                        $number_of_users = mysqli_num_rows($select_users);
                    ?>
                    <h3><?php echo $number_of_users; ?></h3>
                    <p>normal users</p>
                </div>                
            </div>

            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $query = "SELECT * FROM users WHERE user_type = 'admin'";
                        $select_admins = mysqli_query($conn, $query);
                        $number_of_admins = mysqli_num_rows($select_admins);
                    ?>
                    <h3><?php echo $number_of_admins; ?></h3>
                    <p>admin users</p>
                </div>                
            </div>

            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $query = "SELECT * FROM users";
                        $select_account = mysqli_query($conn, $query);
                        $number_of_account = mysqli_num_rows($select_account);
                    ?>
                    <h3><?php echo $number_of_account; ?></h3>
                    <p>total users</p>
                </div>                
            </div>

            <div class="col-md-4">
                <div class="box-1 shadow">
                    <?php
                        $query = "SELECT * FROM message";
                        $select_messages = mysqli_query($conn, $query);
                        $number_of_messages = mysqli_num_rows($select_messages);
                    ?>
                    <h3><?php echo $number_of_messages; ?></h3>
                    <p>new messages</p>
                </div>                
            </div>
                         
        </div>  
    </div>
</section>
<!-- dashboard ends -->

<!-- custom admin js file link -->
<script src="source/js/admin_script.js"></script>
	  
<!-- Bootstrap JS -->
<script src="source/js/popper.min.js"></script>
<script src="source/js/jquery-3.4.1.slim.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>