<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>
<?php
if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{

include("includes/db.php");
include("includes/functions.php");
?>


<?php

$admin_session = $_SESSION['admin_email'];

$get_admin = "select * from admins where admin_email='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_name = $row_admin['admin_name'];
$admin_job = $row_admin['admin_job'];
$admin_contact = $row_admin['admin_contact'];
$admin_address = $row_admin['admin_address'];
$admin_image = $row_admin['admin_image'];

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/vendors/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../styles/vendors/fontawesome/css/all.css"> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin area</title>
</head>

<body>
    <div id="wrapper">
    <?php include("includes/sidebar.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                    if(isset($_GET['dashboard'])){
                        include('dashboard.php');
                    }
                    if(isset($_GET['insert_product'])){
                        include('insert_product.php');
                    }
                    if(isset($_GET['view_products'])){
                        include('view_products.php');
                    }
                    if(isset($_GET['delete_product'])){
                        include('others/delete_product.php');
                    }
                    if(isset($_GET['edit_product'])){
                        include('others/edit_product.php');
                    }
                    if(isset($_GET['insert_p_cat'])){
                        include('others/insert_cat.php');
                    }
                    if(isset($_GET['view_p_cat'])){
                        include('others/view_category.php');
                    }
                    if(isset($_GET['delete_cat'])){
                        include('others/delete_cat.php');
                    }
                    if(isset($_GET['edit_cat'])){
                        include('others/edit_cat.php');
                    }
                    if(isset($_GET['insert_brand'])){
                        include('others/insert_brand.php');
                    }
                    if(isset($_GET['view_brand'])){
                        include('others/view_brand.php');
                    }
                    if(isset($_GET['delete_brand'])){
                        include('others/delete_brand.php');
                    }
                    if(isset($_GET['edit_brand'])){
                        include('others/edit_brand.php');
                    }
                    if(isset($_GET['insert_slide'])){
                        include('others/insert_slide.php');
                    }
                    if(isset($_GET['view_slide'])){
                        include('others/view_slides.php');
                    }
                    if(isset($_GET['delete_slide'])){
                        include('others/delete_slide.php');
                    }
                    if(isset($_GET['view_customers'])){
                        include('view_customers.php');
                    }
                    if(isset($_GET['delete_cus'])){
                        include('others/delete_cus.php');
                    }
                    if(isset($_GET['view_payments'])){
                        include('view_payments.php');
                    }
                    if(isset($_GET['delete_pay'])){
                        include('others/delete_pay.php');
                    }
                    if(isset($_GET['view_orders'])){
                        include('view_orders.php');
                    }
                    if(isset($_GET['order_delete'])){
                        include('others/order_delete.php');
                    }
                    if(isset($_GET['insert_users'])){
                        include('others/insert_user.php');
                    }
                    if(isset($_GET['view_users'])){
                        include('view_users.php');
                    }
                    if(isset($_GET['user_delete'])){
                        include('others/user_delete.php');
                    }
                    
                    if(isset($_GET['user_profile'])){

                        include("user_profile.php");
                    }
    
    
                    
                    
                ?>
            </div>
            <!-- container-fluid end -->
        </div>
        <!--page wrapper end -->
    </div>
    <!-- wrapper end   -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php
}
?>