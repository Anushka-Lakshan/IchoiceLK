<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

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


        <?php

        include("includes/db.php");
        include("functions/functions.php");
        
        ?>

       



</head>

<body>
    <div id="top">
        <!-- top header -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 offer">
                    <a href="#" class="btn btn-success btn-sm">
                    <?php
                            if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

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
                        <li class="active"><a href="contact.php">Contact US</a></li>
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
                    <li>Contact us</li>
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
                        <h2 style="text-align:center;">Contact us</h2>
                        <p class="text-muted" style="text-align:center;">
                            If you have any problem or questions, please feel free to contact us...
                        </p>

                    </div>
                    <!-- end of box header -->
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label for="fname">Name</label>
                            <input type="text" name="name" id="fname" class="form-control" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="fmail">Email</label>
                            <input type="mail" name="email" id="fmail" class="form-control" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="fsub">Subject</label>
                            <input type="text" name="subject" id="fsub" class="form-control" required>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                            <label for="fxt">Massage</label>
                            <textarea name="massage" id="fxt" class="form-control">
                            </textarea>
                        </div>
                        <!-- form-group end -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit">
                                Send massage
                            </button>
                        </div>
                    </form>
                    <?php

                        if(isset($_POST['submit'])){
                            
                            $sender_name = $_POST['name'];
                            $sender_email = $_POST['email'];
                            $sender_subject = $_POST['subject'];
                            $sender_msg = $_POST['massage'];

                            $admin_mail = "4thhokageanushka@gmail.com";

                            @mail($admin_mail,$sender_subject,$sender_name,$sender_msg);

                            echo"
                            <script> alert('Thank you for contact us') </script>
                            ";

                            // send mail to sender

                            @mail($sender_email,"Thank u for contact us IchoiceLK","IchoiceLK is a educational project site so this site some functions are not working properly and you can not buy any thing from this site - IchoiceLK  Admin");


                        }

                    ?>

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