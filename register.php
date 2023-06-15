<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">


<?php




include("includes/db.php");
include("functions/functions.php");

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IChoice lk</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="styles/mystyles.css">
    <link rel="stylesheet" href="styles/vendors/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="styles/vendors/responsiveslides.css"> -->
    <!-- <link rel="stylesheet" href="styles/vendors/themes.css"> -->
    <!-- <link rel="stylesheet" href="styles/vendors/fontawesome/css/all.css" crossorigin="anonymous"> -->
    <!-- slide styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/other.css">




</head>

<body>
    <div id="top">
        <!-- top header -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 offer">
                    <a href="#" class="btn btn-success btn-sm">
                    <?php
                           
                            
                            if(isset($_SESSION['customer_email'])){
                                echo "welcome : " . $_SESSION['c_name'];
                                echo"<script> alert('you have already registered, No need to register again') </script>";
                            }else{
                                echo"Guest";
                            }
                        ?>
                    </a>
                    <a href="#">
                        Shopping cart Total Price :<?php total_price(); ?> Total items : <?php items(); ?>
                    </a>
                </div>
                <div class="col-md-6">
                    <!--col md start -->
                    <ul>
                        <li><a href="register.php">Register</a></li>
                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='checkout.php'>My Account</a>";
                            }else{
                                echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                        </li>
                        <li><a href="Cart.php">GO to Cart</a></li>
                        <li><a href="checkout.php">
                        <?php
                        if(isset($_SESSION['customer_email'])){
                            echo"<a href='logout.php'>Logout</a>";
                        }else{
                            echo"<a href='checkout.php'>Log in</a>";
                        }
                        ?>
                        </a></li>
                    </ul>
                </div>
                <!--col md ends -->
            </div>
        </div>
    </div><!-- top header closed -->
    <header class="navbar navbar-default" id="navbar">
        <!-- header bar starts -->
        <div class="container">
            <div class="navbar-header">
                <a href="index.php"><img id="logo" src="images/logo.png" alt="ichoice logo"></a>

                <button type="button" class="navbar-toggle" data-target="#navigation" data-toggle="collapse">
                    <span class="sr-only">Navigation</span>
                    <i class="fas fa-bars"></i>
                </button>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div><!-- navbar header end -->
            <div class="navbar-collapse collapse" id="navigation">
                <!-- nav bar collapse stars -->
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li><a href="shop.php">Shop</a></li>
                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='checkout.php'>My Account</a>";
                            }else{
                                echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                        </li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="contact.php">Contact US</a></li>
                    </ul>
                </div>
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> items in cart</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>

                    </button>
                </div>
            </div><!-- nav bar collapse ends -->
            <div class="collapse clearfix" id="search">
                <!--search box start-->
                <form action="results.php" class="navbar-form" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="u_query" required>
                        <span class="input-group-btn">
                            <button type="submit" value="search" name="search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>

    </header><!-- header bar ends -->
    </div><!-- container end -->


    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <!--breadcrumb starts-->
                    <li><a href="index.php">Home</a></li>
                    <li>Register</li>
                </ul>
                <!--breadcrumb ends-->

            </div>

            <div class="col-md-3">
                <?php
                    include_once("includes/sidebar.php");
                ?>
            </div>

            <div class="col-md-9">

                <div class="box conform">
                    <div class="box-header">
                        <h2 style="text-align:center;">Sign in(Register)</h2>
                        <p class="text-muted" style="text-align:center;">
                            Best prices and deals ... Sign in now.. 
                        </p>

                    </div>
                    <!-- end of box header -->
                    <form action="register.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fname">Name</label>
                            <input type="text" name="c_name" id="fname" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="fmail">Email</label>
                            <input type="text" name="c_email" id="fmail" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="pss">Enter Password</label>
                            <input type="password" name="c_pass" id="pss" class="form-control" placeholder="Enter password" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="addr">Your Address</label>
                            <input type="text" name="c_addr" id="addr" class="form-control" placeholder="Enter your address" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="cnum">Your Contact Number</label>
                            <input type="text" name="c_contact" id="cnum" class="form-control" placeholder="Enter your contact number" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="cima">Your Profile image</label>
                            <input type="file" name="c_image" id="cima" class="form-control" required>
                        </div>
                        <!-- form-group end -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="register">
                                
                                Sign up
                            </button>
                        </div>
                    </form>
                </div>
                <!-- end of box -->
            </div>
            <!-- end of col-md-9 -->
        </div>
        <!--container ends-->
    </div>
    <!--content end-->



    <?php
include("includes/footer.php");
?>



    <script src="js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>


<?php

if(isset($_POST['register'])){

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_addr = $_POST['c_addr'];
    $c_pass = $_POST['c_pass'];
    $c_contact = $_POST['c_contact'];

    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    $c_ip = getRealUserIP();

    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

    $insert_customer = "insert into customers (customer_name,cus_email,cus_addr,customer_pass,cus_contact,cus_img,customer_ip) values ('$c_name','$c_email','$c_addr','$c_pass','$c_contact','$c_image','$c_ip')";

    $run_customer = mysqli_query($con,$insert_customer);

    $sel_cart = "select * from cart where ip_add='$c_ip'";
    $run_cart = mysqli_query($con,$sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        echo" <script> alert('started again') </script>";

    }

 

    if($check_cart>0){
        
        $_SESSION['customer_email'] = $c_email;
        $_SESSION['c_name'] = $c_name;
        echo" <script> alert('You have been registerd successfully') </script>";
        echo" <script> window.open('checkout.php','_self') </script>";
    }else{
        $_SESSION["customer_email"] = $c_email;
        $_SESSION["c_name"] = $c_name;

        echo" <script> alert('You have been registerd successfully {$_SESSION["c_name"]}) </script>";
        echo" <script> window.open('index.php','_self') </script>";
    }

}

?>