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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   
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
                        <li><a href="Cart.php">GO to Cart</a></li>
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

    <div class="container">
    
    <?php
    $search_count = 0;
    
    if(isset($_GET['search']) && isset($_GET['u_query'])){
        
        $searchq = $_GET['u_query'];
        
        $searchq = preg_replace("#[^0-9a-z]#i"," ",$searchq);
        
        $search = "SELECT * FROM products WHERE product_title LIKE '%$searchq%' OR product_keyword LIKE '%$searchq%'";
        
        $run_search = mysqli_query($con,$search);
        
        $search_count = mysqli_num_rows($run_search);
        
        
    }else{

        echo"
        <h4>Search term not found</h4>";
    }
    
    ?>

<div class="row">
    <div class="col-lg-12">
        <p class="lead"><?php echo $search_count; ?> result found!!</p>
    </div>
</div>

<div class="row">

<?php
if($search_count==0){
    echo"
                <div class='row'>
                <h4 class='text-center'>Sorry we can't find your search procucts, lets look our latest products.. </h4>
                </div>

                <div class='row'>
                
                ";
                getpro(4);
                echo"<div>";
}

?>

<?php
    if(isset($_GET['search']) && isset($_GET['u_query'])){
        
        $searchq = $_GET['u_query'];
        
        $searchq = preg_replace("#[^0-9a-z]#i"," ",$searchq);
        
        $search = "SELECT * FROM products WHERE product_title LIKE '%$searchq%' OR product_keyword LIKE '%$searchq%'";
        
        $run_search = mysqli_query($con,$search);
        
        while($row_products = mysqli_fetch_array($run_search)){

            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
    
            echo"
    
                            
                <div class='col-md-3 col-sm-6 single'>
                <!--single stars-->
                <div class='product'>
                    <!--product-->
    
                    <a href='details.php?pro_id=$pro_id' id='product-image'>
                        <img src='admin_area/product_images/$pro_img1' alt='' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'>$ {$pro_price}</p>
                        <p class='buttons'>
    
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                View details
                            </a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                <i class='fa fa-shopping-cart'></i>Add to Cart
                            </a>
    
                        </p>
                    </div>
    
                </div>
                <!--product ends-->
                </div>
                <!-- single ends -->
            ";}}else{
                echo"
                <div class='row'>
                <h4 class='text-center'>Sorry we can't find your search procucts, lets look our latest products.. </h4>
                </div>

                <div class='row'>
                
                ";
                getpro(4);
                echo"<div>";
            };

?>





</div>


</div>
<!-- container end -->
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
    $(function() {
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