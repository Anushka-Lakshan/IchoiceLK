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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                        <li class="active"><a href="cart.php">Shopping Cart</a></li>
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
                    <li>Shopping Cart</li>
                </ul>
                <!--breadcrumb ends-->

            </div>

            <div class="col-md-9" id="cart">
                <div class="box">
                    <form action="cart.php" method="post" enctype="multipart-form-data">
                        <h1>shopping cart</h1>
                        <p class="text-muted">
                        <?php items(); ?> item(s) in your cart
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        
                                        <th colspan="1">Delete</th>
                                        <th colspan="2"> Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $total = 0;
                                        $ip_add = getRealUserIp();
                                        $select_cart = "select * from cart where ip_add='$ip_add'";

                                        $run_cart = mysqli_query($con,$select_cart);

                                        while($row_cart=mysqli_fetch_array($run_cart)){
                                            
                                            $pro_id = $row_cart['p_id'];
                                            $pro_qty = $row_cart['qty'];

                                            $get_products = "select * from products where product_id='$pro_id'";

                                            $run_products = mysqli_query($con,$get_products);

                                            while($row_products=mysqli_fetch_array($run_products)){

                                                $product_title = $row_products['product_title'];
                                                $product_img1 = $row_products['product_img1'];
                                                $only_price = $row_products['product_price'];
                                                $sub_total = $row_products['product_price']*$pro_qty;
                                                
                                                $total += $sub_total;



                                    ?>
                                    <tr>
                                        <td>
                                            <img src="admin_area/product_images/<?php  echo"$product_img1" ?>" alt="">
                                        </td>
                                        <td><a href="details.php?pro_id=<?php  echo"$pro_id" ?>"><?php  echo"$product_title" ?></a></td>
                                        <td><?php  echo"$pro_qty" ?></td>
                                        <td>$<?php  echo"$only_price" ?></td>
                                        
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php  echo"$pro_id" ?>">
                                        </td>
                                        <td>$<?php  echo"$sub_total" ?></td>
                                    </tr>
                                    
                                        <?php }} ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">$<?php  echo"$total" ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- table-responsive ends -->
                        <div class="box-footer">
                            <div class="pull-left">
                                
                                    <a class="btn btn-default" href="index.php">
                                        Continue Shopping
                                    </a>
                                
                            </div>
                            <!-- pull-left -->
                            <div class="pull-right">
                                <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                                    <i class="fa fa-refresh"></i>
                                    Update cart
                                </button>
                                <a href="checkout.php" class="btn btn-primary">
                                    checkout <i class="fa fa-chevron"></i>
                                </a>
                            </div>
                        </div>
                        <!-- box-footer -->
                    </form>
                </div>
                <!-- box end -->
                <?php
                    function update_cart(){
                        global $con;

                        if(isset($_POST['update'])){
                            foreach($_POST['remove'] as $remove_id){

                                $remove_product = "DELETE FROM cart WHERE p_id='$remove_id'";

                                $run_remove = mysqli_query($con,$remove_product);

                                if($run_remove){
                                    echo"
                                    <script>window.open('cart.php','_self')</script>";
                                }

                            }
                        }
                    }

                    echo @$up_cart = update_cart();

                ?>

            </div>
            <!-- col-md-9 end -->

            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>order subtotal</td>
                                    <th>$<?php  echo"$total" ?></th>
                                </tr>
                                <tr>
                                    <td>shipping and handling</td>
                                    <td>$2.00</td>
                                    <?php
                                    $Ttotal = $total + 2 ;
                                    ?>
                                </tr>
                                <tr>
                                    <td>tax</td>
                                    <td>$0.00</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>$<?php  echo"$Ttotal" ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- table res div end -->
                </div>
                <!-- order-sum box end -->
            </div>
            <!-- col-md-3 -->
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