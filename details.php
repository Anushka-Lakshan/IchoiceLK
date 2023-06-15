<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<?php

include("includes/db.php");
include("functions/functions.php");


?>

<?php

if(isset($_GET['pro_id'])){

    $product_id = $_GET['pro_id'];

    $get_pro = "select * from products where product_id='$product_id'";

    $run_get_pro = mysqli_query($con,$get_pro);

    $row_product = mysqli_fetch_array($run_get_pro);

    $pro_title = $row_product['product_title'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $pro_img3 = $row_product['product_img3'];
    $pro_desc = $row_product['product_desc'];
    $pro_price = $row_product['product_price'];
    $pro_brand_id = $row_product['cat_id'];
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IChoice lk</title>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="styles/vendors/fontawesome/css/all.css" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   
    <link rel="stylesheet" href="styles/vendors/bootstrap.min.css">

    <link rel="stylesheet" href="styles/mystyles.css">

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
                        <li class="active"><a href="shop.php">Shop</a></li>
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
                    <li><a href="shop.php">Shop</a></li>
                    <li><?php echo"$pro_title"; ?></li>
                </ul>
                <!--breadcrumb ends-->

            </div>

            <div class="col-md-3">
                <?php
                    include_once("includes/sidebar.php");
                ?>
            </div>

            <div class="col-md-9">
                <!--col md 9-->
                <div class="row" id="productmain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active">
                                    </li>
                                    <li data-target="#myCarousel" data-slide-to="1">
                                    </li>
                                    <li data-target="#myCarousel" data-slide-to="2">
                                    </li>
                                </ol>

                                <div class="carousel-inner">

                                    <div class="item active">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo"$pro_img1"; ?>" alt=""
                                                class="img-responsive">
                                        </center>
                                    </div>

                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo"$pro_img2"; ?>" alt=""
                                                class="img-responsive">
                                        </center>
                                    </div>

                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo"$pro_img3"; ?>" alt=""
                                                class="img-responsive">
                                        </center>
                                    </div>

                                </div>
                                <!-- carousel-inner end-->
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">

                                    <i class="fas fa-angle-left"
                                        style="display: inline-block; position:relative; top: 40%;"></i>
                                    <span class="sr-only">Previous</span>

                                </a>

                                <a href="#myCarousel" class="right carousel-control" data-slide="next">

                                    <i class="fas fa-angle-right"
                                        style="display: inline-block; position:relative; top: 40%;"></i>
                                    <span class="sr-only">Next</span>

                                </a>
                            </div>
                            <!-- carousel end -->
                        </div>
                        <!-- main image ends -->
                    </div>
                    <!-- col-sm6 ends -->
                    <div class="col-sm-6" id="productBox">
                        <div class="box">
                            <h1 id="productName" class="text-center">
                                <?php echo"$pro_title"; ?>
                            </h1>

                            <?php add_cart(); ?>

                            <form action="details.php?pro_id=<?php echo"$product_id"; ?>&add_cart=<?php echo"$product_id"; ?>" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-5">Product Quantity</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <p class="price" style='margin-top:80px;'>$<?php echo"$pro_price"; ?></p>
                                <p class="text-center buttons">
                                    <button class="btn btn-primary" type="submit">
                                        
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </p>
                            </form>
                        </div>
                        <div class="row" id="thumbs">
                            <div class="col-xs-4 litimg">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo"$pro_img1"; ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4 litimg">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo"$pro_img2"; ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4 litimg">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo"$pro_img3"; ?>" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <!-- thumbs ends -->
                    </div>
                    <!-- col sm 6 ends -->
                </div>
                <!-- row ends -->
                <div class="box" id="details">
                    
                        <h4>Product Details</h4>

                        <?php echo"$pro_desc"; ?>
                    <hr>
                </div>
                <!-- details end -->
                <div id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline" id="samehpro">
                            <h3 class="text-center">
                                You also like...
                            </h3>
                        </div>
                    </div>

                    <?php

                        $get_products = "select * from products where cat_id='$pro_brand_id' Order by 1 LIMIT 0,3";

                        $run_products = mysqli_query($con,$get_products);

                        while($row2_product=mysqli_fetch_array($run_products)){
                            $pro_title = $row2_product['product_title'];
                            $pro_img1 = $row2_product['product_img1'];   
                            $pro_price = $row2_product['product_price'];
                            $pro_id = $row2_product['product_id'];

                            if($pro_id != $_GET['pro_id']){

                                echo"
                                
                                <div class='center-responsive col-md-3 col-sm-6'>
                                <div class='same-height' id='samehpro'>
                                <a href='details.php?pro_id={$pro_id}'>
                                    <img src='admin_area/product_images/{$pro_img1}' class='img-responsive'>
                                </a>
                                <div class='text'>
                                    <h3>
                                        <a href='details.php?pro_id={$pro_id}'>
                                            {$pro_title}
                                        </a>
                                    </h3>
                                    <p class='price'>
                                        $ {$pro_price}
                                    </p>
                                </div>
                                
                                </div>
                                </div> 
                                
                                
                                ";}else{
                                    $total_records = mysqli_num_rows($run_products);
                                    if($total_records==1){
                                    echo"
                                    <div class='center-responsive col-md-3 col-sm-6'>
                                    <div class='same-height' id='samehpro'>
                                    <h4 style='padding:60px 5px;font-weight:bold;text-align:center;'>
                                    More Products will be added later stay with us
                                    </h4>
                                    
                                    </div>
                                    </div> 
                                    ";}
                                }
                        }

                    ?>
                  
                </div>
                <!-- row same-height-row -->
            </div>
            <!--col md 9 end-->










        </div>
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