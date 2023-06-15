<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">


<?php

include("includes/db.php");
include("functions/functions.php");

session_start();

if(!isset($_SESSION['customer_email'])){
    echo"<script> window.open('../checkout.php','_self') </script>";
}else{




?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IChoice lk</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="styles/mystyles.css">
    <link rel="stylesheet" href="styles/vendors/bootstrap.min.css">
    
    <!-- <link rel="stylesheet" href="../styles/vendors/fontawesome/css/all.css" crossorigin="anonymous"> -->
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
                        <li><a href="../register.php">Register</a></li>
                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='../checkout.php'>My Account</a>";
                            }else{
                                echo"<a href='my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                        </li>
                        <li><a href="../cart.php">GO to Cart</a></li>
                        <li>
                        <?php
                        if(isset($_SESSION['customer_email'])){
                            echo"<a href='../logout.php'>Logout</a>";
                        }else{
                            echo"<a href='../checkout.php'>Log in</a>";
                        }
                        ?>
                        </li>
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
                <a href="../index.php"><img id="logo" src="images/logo.png" alt="ichoice logo"></a>

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
                            <a href="../index.php">Home</a>
                        </li>
                        <li><a href="../shop.php">Shop</a></li>
                        <li class="active">
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='../checkout.php'>My Account</a>";
                            }else{
                                echo"<a href='my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                        </li>
                        <li><a href="../cart.php">Shopping Cart</a></li>
                        <li><a href="../contact.php">Contact US</a></li>
                    </ul>
                </div>
                <a href="../cart.php" class="btn btn-primary navbar-btn right">
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
                    <li><a href="../index.php">Home</a></li>
                    <li>My Account</li>
                </ul>
                <!--breadcrumb ends-->

            </div>

            <div class="col-md-3">
                <?php
                    include_once("includes/sidebar.php");
                ?>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <?php
                            if(isset($_GET['my_orders'])){
                                include("my_order.php");
                            }
                            if(isset($_GET['pay_offline'])){
                                include("pay_offline.php");
                            }
                            if(isset($_GET['edit_account'])){
                                include("edit_account.php");
                            }
                            if(isset($_GET['change_pass'])){
                                include("change_pass.php");
                            }
                            if(isset($_GET['delete_account'])){
                                include("delete_account.php");
                            }
                    ?>
                </div>
                <!-- box end -->
            </div>
            <!-- col-md-9 end -->


        </div>
        <!--container ends-->
    </div>
    <!--content end-->


<?php
}
//close of up else

include("includes/footer.php");
?>



    <script src="js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>