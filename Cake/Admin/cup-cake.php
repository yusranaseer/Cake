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

if(isset($_POST['add_products'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price =  $_POST['price'];
    $image =  $_FILES['image']['name'];
    $image_size =  $_FILES['image']['size'];
    $image_temp_name =  $_FILES['image']['tmp_name'];
    $image_folder = 'uploarded_img/'.$image;

    $query = "SELECT name FROM cup WHERE name = '$name'";
    $select_product_name = mysqli_query($conn, $query);

    if(mysqli_num_rows($select_product_name) > 0){
        $message[] = 'product name alredy added';
    }else{

        $add_product_query = "INSERT INTO cup(name, price, image) VALUES('$name', '$price', '$image')";
        mysqli_query($conn, $add_product_query); 
        
        if($add_product_query){
            if($image_size > 2000000){
                $message[] = 'image size is too large';
            }else{
                move_uploaded_file($image_temp_name, $image_folder);
                $message[] = 'product added successully';
            }  
        }else{
            $message[] = 'product could not be added';  
        }
    }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $select_delete = "SELECT image FROM cup WHERE ID = '$delete_id'";    
    $delete_image_query = mysqli_query($conn, $select_delete);
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploarded_img/'.$fetch_delete_image['image']);
    $delete_query = "DELETE FROM cup WHERE id = '$delete_id'";
    mysqli_query($conn,$delete_query);
    header('location:cup-cake.php');
}

if(isset($_POST['update_products'])){
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];

    mysqli_query($conn, "UPDATE cup SET name ='$update_name', price ='$update_price' WHERE id = '$update_p_id'");

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploarded_img/'.$update_image;
    $update_old_image = $_POST['update_old_image'];

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'image size is too large';            
        }else{
            mysqli_query($conn, "UPDATE cup SET image ='$update_image' WHERE id = '$update_p_id'");
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('uploarded_img/'.$update_old_image);
        }
    }
    header('location:cup-cake.php');
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
	
<title>cup cake</title>
</head>
<body>	  

<?php 
    include 'nav/admin_nav.php'
?>

<!-- product CRUD session starts -->
<section class="add-products">
    <h1 class="title">cup cake</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <h3>add products</h3>
        <input type="text" name="name" class="box" placeholder="enter product name" required>
        <input type="number" name="price" min="0" class="box" placeholder="enter product price" required>
        
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" value="add product" name="add_products" class="btn">
    </form>
</section>
<!-- product CRUD session ends -->

<!-- show products -->
<section class="show-products">
    <div class="box-container">
        <?php
            $query_img = "SELECT * FROM cup";
            $select_products = mysqli_query($conn, $query_img);
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){                      
        ?>
        <div class="box shadow">
            <img src="uploarded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price">Price Rs<?php echo $fetch_products['price']; ?>/-</div>
            
            <a href="cup-cake.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
            <a href="cup-cake.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Delete this product?');">delete</a>
        </div>
        <?php
        }
            }else{
                echo '<p class="empty">no product added yet!</p>';
            }  
        ?>
    </div>
</section>

<!-- edit product form -->
<section class="edit-product-form">
    <?php
        if(isset($_GET['update'])){
            $update_id = $_GET['update'];
            $select_update = "SELECT * FROM cup WHERE id = '$update_id'";
            $update_query = mysqli_query($conn, $select_update);
            if(mysqli_num_rows($update_query) > 0){
                while($fetch_update = mysqli_fetch_assoc($update_query)){                
            
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
        <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
        <img src="uploarded_img/<?php echo $fetch_update['image']; ?>" alt="">
        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
        <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png" >
        <input type="submit" value="update" name="update_products" class="btn">
        <input type="reset" value="cancel" id="close-update" class="option-btn">
    </form>
    <?php
                }
            }
        }else{
            echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }

    ?>
</section>

<script>
    document.querySelector('#close-update').onclick = () =>{
    document.querySelector('.edit-product-form').style.display = "none";
    window.location.href = 'cup-cake.php';
}
</script>

<!-- custom admin js file link -->
<script src="source/js/admin_script.js"></script>
	  
<!-- Bootstrap JS -->
<script src="source/js/popper.min.js"></script>
<script src="source/js/jquery-3.4.1.slim.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>