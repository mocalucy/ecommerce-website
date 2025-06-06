<?php
include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    /*$user_type = $_POST['user_type'];*/
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query fail');
    if(mysqli_num_rows($select_users) > 0){
       $message[] = 'user already exist';
    }
    else{
        if($pass != $cpass){
            $message[] = 'confirm password doesn\'t match';
        }
        else{
            mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$cpass')") or die('query fail');
            $message[] = 'registered successfully';
            //sleep(5);
            header("Refresh:3; url='login.php'");
        }
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php';?>
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

    <div class="form-container">
        <form action="" method="post">
        <h3>REGISTER NOW!</h3>
        <input type="text" name="name" placeholder="username" required class="box">
        <input type="email" name="email" placeholder="email" required class="box">
        <input type="password" name="password" placeholder="password" required class="box">
        <input type="password" name="cpassword" placeholder="confirm password" required class="box">
        <!--<select name="user_type" class="box">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>-->
        <input type="submit" name="submit" value="register" class="btn">
        <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>
<?php include 'footer.php';?>
</body>
</html>
