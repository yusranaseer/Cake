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
    $delete_query = "DELETE FROM message WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_query);
    header('location:messages.php');
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
	
<title>Messages</title>
</head>
<body>	  

<?php 
    include 'nav/admin_nav.php'
?>

<section class="messages">
    <h1 class="title">messages</h1>
    <div class="box-container">
        <?php
            $user_query = "SELECT * FROM message";
            $select_message = mysqli_query($conn, $user_query);

            if(mysqli_num_rows($select_message) > 0){
                while($fetch_message = mysqli_fetch_assoc($select_message)){
                        
        ?>
        <div class="box">
            <p>name : <span><?php echo $fetch_message['name']; ?></span></p>
            <p>number : <span><?php echo $fetch_message['number']; ?></span></p>
            <p>email : <span><?php echo $fetch_message['email']; ?></span></p>
            <p>message : <span><?php echo $fetch_message['message']; ?></span></p>
            <a href="messages.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
        </div>
        <?php
            };
        }else{
            echo '<p class="empty">you have no messages!</p>';
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