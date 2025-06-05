<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>';
    }
}
?>

<header class="header">
    <div class="flex">
        <a href="admin.php" class="logo">Admin<span>Panel</span></a>
        <nav class="nav-bar">
            <a href="admin.php">Home</a>
            <a href="admin_products.php">Products</a>
            <a href="admin_orders.php">Orders</a>
            <a href="admin_users.php">Users</a>
            <a href="admin_contacts.php">Contact</a>
            <a href="home.php" style="color: #FAF0D7">Shop Home</a>
        </nav>
        <div class="icon">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="account-box">
            <p>username: <span><?php echo $_SESSION['admin_name'];?></span></p>
            <p>email: <span><?php echo $_SESSION['admin_email'];?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
            <div>new<a href="login.php">login</a> | <a href="register.php">register</a></div>
        </div>
    </div>
</header>