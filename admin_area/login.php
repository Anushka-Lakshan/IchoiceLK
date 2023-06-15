<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php



include("includes/db.php");

?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/vendors/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <form action="" method="post" class="form-login">
            <h2 class="form-login-heading text-center">Admin Login</h2>
            <h3 class="form-login-heading text-center">Ichoice lk</h3>

            <input type="text" class="form-control" name="admin_email" placeholder="Enter Email" required>
            <input type="password" name="admin_pass" class="form-control" placeholder="Enter Password" required>

            <button type="submit" class="btn btn-lg btn-primary btn-block text-center" name="admin_login">
                Login

            </button>



        </form>
    </div>
    <!-- container end -->

    <style>
    form {
        display: block;
        width: 350px;
        transform: translate(-50%, -50%);
        top: 45%;
        left: 50%;
        position: absolute;
    }

    input {
        margin-bottom: 8px;
        width: 95%;
    }

    h2 {
        color: rgb(62, 62, 255);

    }

    button {
        margin-top: 10px;
    }

    h3 {
        color: rgb(255, 105, 5);
        margin-bottom: 15px;
        margin-top: -4px;
    }
    </style>


</body>

</html>


<?php

if(isset($_POST['admin_login'])){

    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

    $run_admin = mysqli_query($con,$get_admin);

    $count = mysqli_num_rows($run_admin);

    if($count==1){
        $_SESSION['admin_email'] = $admin_email;

        echo"
        <script>alert('You are logged into admin panel')</script>
        <script>window.open('index.php?dashboard','_self')</script>";
    }else{
        echo"
        <script>alert('Your email or password is wrong, please try again')</script>";
        
    }
    
};

?>