<?php


if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else{



?>





<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>


        </button>

        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>

    </div>
    <!-- navbar-header end-->

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <?php echo $admin_name; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-cube"></i>Products
                        <span class="badge"><?php echo get_products_count();  ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-child"></i>Customers
                        <span class="badge"><?php echo get_customers_count();  ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_p_cat">
                        <i class="fa fa-fw fa-cubes"></i>Produst categories
                        <span class="badge"><?php echo get_category_count();  ?></span>
                    </a>
                </li>
                <li class="divider">
                <li>
                    <a href="logout.php">Log out</a>
                </li>
        </li>
    </ul>
    <!-- dropdown-menu end -->
    </li>
    </ul>
    <!-- nav navbar-right top-nav -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li><a href="index.php?dashboard">Dashboard</a></li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    products<i class="fa fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li><a href="index.php?view_products">View Products</a></li>
                    <li>
                        <a href="index.php?insert_product">Insert Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    products categories<i class="fa fa-caret-down"></i>
                </a>
                <ul id="p_cat" class="collapse">
                    <li><a href="index.php?view_p_cat">View Products categories</a></li>
                    <li>
                        <a href="index.php?insert_p_cat">Insert Product categories</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_brand">
                    products Brands<i class="fa fa-caret-down"></i>
                </a>
                <ul id="p_brand" class="collapse">
                    <li><a href="index.php?view_brand">View Products brand</a></li>
                    <li>
                        <a href="index.php?insert_brand">Insert Product brand</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    slides<i class="fa fa-caret-down"></i>
                </a>
                <ul id="slides" class="collapse">
                    <li><a href="index.php?view_slide">View slides</a></li>
                    <li>
                        <a href="index.php?insert_slide">Insert slides</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_customers">View Customers</a>
            </li>
            <li>
                <a href="index.php?view_orders">View Orders</a>
            </li>
            <li>
                <a href="index.php?view_payments">View Payments</a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#Users">
                    Admin users<i class="fa fa-caret-down"></i>
                </a>
                <ul id="Users" class="collapse">
                    <li>
                        <a href="index.php?insert_users">Insert Admin users</a>
                    </li>
                    <li><a href="index.php?view_users">View Admin users</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="logout.php">Log out</a>
            </li>
        </ul>
        <!-- nav navbar-nav side-nav end -->
    </div>
    <!-- collapse navbar-collapse navbar-ex1-collapse end -->

</nav>

<?php
}
?>