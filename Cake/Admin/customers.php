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

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = "DELETE FROM users WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_query);
    header('location:customers.php');
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
	
<title>Customers</title>
</head>
<body>	  

<?php 
    include 'nav/admin_nav.php'
?>

<section class="users">
    <h1 class="title">customer accounts</h1>
    <div class="box-container">
        <?php
            $user_query = "SELECT * FROM users WHERE user_type='user'";
            $select_users = mysqli_query($conn, $user_query);

            while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <div class="box">
            <p>username : <span><?php echo $fetch_users['name']; ?></span></p>
            <p>email : <span><?php echo $fetch_users['email']; ?></span></p>            
            <a href="customers.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
        </div>
        <?php
            };
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