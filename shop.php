<?php
@include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];


if(isset($_POST['add_to_cart'])){
    if(!isset($user_id)){
        header('location:login.php');
    }
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart!';
    }
    else{
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php';?>

<div class="head">
   <h3>our shop</h3>
   <p><a href="home.php">home</a> / shop </p>
</div>

<section id="cat">
    <form method="post">
        <a href="shop.php" class="btn">all</a>
        <input type="submit" value="shirts" name="submit" class="btn">
        <input type="submit" value="suits" name="submit" class="btn">
        <input type="submit" value="accessories" name="submit" class="btn">
        <input type="submit" value="mental" name="submit" class="btn">
    </form>
</section>

<section class="products">
    <?php
        if(isset($_POST['submit'])){
            $search_item = $_POST['submit'];?>
            <h1 class="heading"><?php echo $search_item?></h1> 
    <div class="box-container">
    <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE type LIKE '%{$search_item}%'") or die('query failed');
            if(mysqli_num_rows($select_products)>0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
    ?>              
                    <form method="post" class="box">
                        <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" class="image">
                        <div class="name"><?php echo $fetch_product['name']; ?></div>
                        <div class="price">$<?php echo $fetch_product['price']; ?></div>
                        <div class="brand-type"><?php echo "{$fetch_product['brand']} | {$fetch_product['type']}"; ?> </div>
                        <input type="number"  class="qty" name="product_quantity" min="1" value="1">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="submit" class="btn" value="add to cart" name="add_to_cart">
                    </form>
    <?php
                }
            }
            else{
                echo '<p class="empty">no result</p>';
            }
        }
        else{
            echo '<p class="empty">choose a category</p>';
        }
    ?>
    </div>
</section>

<section class="products" style="padding-top: 0">
    <h1 class="heading">all products</h1>
    <div class="box-container">
    <?php  
        $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
        if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
    ?>
    <form method="post" class="box">
        <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
        <div class="name"><?php echo $fetch_products['name']; ?></div>
        <div class="price">$<?php echo $fetch_products['price']; ?></div>
        <div class="brand-type"><?php echo "{$fetch_products['brand']} | {$fetch_products['type']}"; ?></div>
        <input type="number" min="1" name="product_quantity" value="1" class="qty">
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
    </form>
    <?php
        }
    }
    else{
        echo '<p class="empty">no products added yet!</p>';
    }
    ?>
    </div>
</section>

<?php include 'footer.php';?>
<script src="js/user_animation.js"></script>
</body>
</html>