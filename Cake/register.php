<?php 
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cake';
$conn = mysqli_connect('localhost', 'root', '', 'cake') or die('connection failed');

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $select_users = mysqli_query($conn, $query);


    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'user already exist!';
    }else{
        if($password != $cpassword){
            $message[] = 'confirm password not matched!';
        }else{
            $qu = "INSERT INTO users(name, email, password, user_type) VALUES('$name', '$email', '$cpassword', 'user' )";
            mysqli_query($conn, $qu); 
            $message[] = 'registerd successfully!';
            header('location:login.php');
        }
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
<link href="source/css/form.css" rel="stylesheet">

<!-- Link for fontawesome -->
<script src="https://kit.fontawesome.com/affc06d9e8.js" crossorigin="anonymous"></script>
	
<title>Registation</title>
</head>
<body>

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

<div class="form-container">
    <form action="" method="post">
        <h3>Register now</h3>
        <input type="text" name="name" placeholder="enter your name" required class="box">
        <input type="email" name="email" placeholder="enter your email" required class="box">
        <input type="password" name="password" placeholder="enter your password" required class="box">
        <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
        <input type="submit" name="submit" value="register" class="btn">
        <p>alredy have a acoount? <a href="login.php">login now</a></p>
    </form>
</div>

<script src="source/js/popper.min.js"></script>
<script src="source/js/jquery-3.4.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html> 