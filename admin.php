<?php
@include 'config.php';

session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
<?php include 'admin_header.php'; ?>

<section class="dashboard">
    <h1 class="heading">Dashboard</h1>
    <div class="box-container">
        <div class="box">
        <?php
            $total_pending = 0;
            $select_pending = mysqli_query($conn, "SELECT `total_price` FROM `orders` WHERE `payment_status`='pending'") or die('query fail');
            if(mysqli_num_rows($select_pending) > 0){
                while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                    $total_price = $fetch_pendings['total_price'];
                    $total_pending += $total_price;
                };
            };
        ?>
            <p>Pending Payments</p>
            <h3><?php echo $total_pending; ?></h3>
        </div>
        <div class="box">
        <?php
            $total_complete = 0;
            $select_complete = mysqli_query($conn, "SELECT `total_price` FROM `orders` WHERE `payment_status`='completed'") or die('query fail');
            if(mysqli_num_rows($select_complete) > 0){
                while($fetch_complete = mysqli_fetch_assoc($select_complete)){
                    $total_price = $fetch_complete['total_price'];
                    $total_complete += $total_price;
                };
            };
        ?>
            <p>Completed Payments</p>
            <h3><?php echo $total_complete; ?></h3>
        </div>
        <div class="box">
        <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
        ?>
            <p>Order Placed</p>
            <h3><?php echo $number_of_orders; ?></h3>
        </div>
        <div class="box">
        <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
        ?>
            <p>Products Added</p>
            <h3><?php echo $number_of_products; ?></h3>
        </div>
        <div class="box">
        <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
        ?>
            <p>Users</p>
            <h3><?php echo $number_of_users; ?></h3>
        </div>
        <div class="box">
        <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
        ?>
            <p>Admins</p>
            <h3><?php echo $number_of_admins; ?></h3>
        </div>
        <div class="box">
        <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
        ?>
            <p>Total Accounts</p>
            <h3><?php echo $number_of_account; ?></h3>
        </div>
        <div class="box">
        <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
        ?>
            <p>New Messages</p>
            <h3><?php echo $number_of_messages; ?></h3>
        </div>
    </div>
</section>

<script src="js/admin_animation.js"></script>
</body>
</html>