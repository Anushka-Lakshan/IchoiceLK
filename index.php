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
    <link rel="stylesheet" href="styles/vendors/responsiveslides.css">
    <link rel="stylesheet" href="styles/vendors/themes.css">
    <!-- <link rel="stylesheet" href="styles/vendors/fontawesome/css/all.css" crossorigin="anonymous"> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- slide styles -->
    
    <!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
    


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
                    <a href="#" style="color:white;">
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
                        <li><a href="cart.php">GO to Cart</a></li>
                        <li>
                        <?php
                        if(isset($_SESSION['customer_email'])){
                            echo"<a href='logout.php'>Logout</a>";
                        }else{
                            echo"<a href='checkout.php'>Log in</a>";
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
                        <li class="active">
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
    <div class="container" id="slider">
        <!-- slider starts -->
        <div class="col-md-8 slide-div">

            <div class="rslides_container">

                <ul class="rslides" id="slider2">

                <?php
                    $get_slider = "select * from slider LIMIT 0,3";

                    $run_slider = mysqli_query($con,$get_slider);

                    while($row_slide = mysqli_fetch_array($run_slider)){
                        $slide_name = $row_slide['slide_name'];
                        $slide_image = $row_slide['slide_image'];

                        echo"
                        <li><img src='admin_area/slide_images/{$slide_image}'></li>
                        ";
                    }
                ?>


                    <!-- <li><img src="admin_area/slide_images/1.png" alt=""></li>
                    <li><img src="admin_area/slide_images/2.png" alt=""></li>
                    <li><img src="admin_area/slide_images/3.png" alt=""></li> -->
                </ul>

            </div>

        </div>
        <div class="col-md-4">
            <div class="side-img-div">
                <div class="side-image"><img src="admin_area/slide_images/side1.png" alt=""></div>
                <div class="side-image"><img src="admin_area/slide_images/side2.png" alt=""></div>
            </div>
        </div>
    </div><!-- slider ends -->
    <div id="hot">
        <!-- hot starts -->
        <div class="box">
            <!--box starts-->
            <div class="container">
                <div class="col-md-12">
                    <H2>LATEST PRODUCTS</H2>
                </div>
            </div>
        </div>
        <!--box ends-->
    </div><!-- hot ends -->

    <div id="content" class="container">
        <!--content starts-->
        <div class="row">
                    
                <?php
                    getPro();
                ?>


        </div>
    </div>
    <!--content ends-->


<?php

include("includes/footer.php");

?>

    
    
<script src="js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.js"></script>
    <!-- slider componens -->
    <script src="js/responsiveslides.min.js"></script>
    <!-- slider scripts -->
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 2
            $("#slider2").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                maxwidth: 800,
                namespace: "transparent-btns"
            });

        });
    </script>



</body>

</html>