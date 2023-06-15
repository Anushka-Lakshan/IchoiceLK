<?php


if(!isset($_SESSION['admin_email'])){
  //  echo"<script>window.open('login.php','_self')</script>";
    header("Location: login.php");
}else{

?>




<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </div>
    <!-- col-lg-12 end -->
</div>
<!-- row end -->


<div class="row">
    <div class="col-lg-3 col-md-6">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cubes fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo get_products_count();  ?></div>
                        <div>products</div>
                    </div>
                </div>
            </div>
            <!-- panel-heading end -->
            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">View-products</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
        <!-- panel panel-primary end -->

    </div>
    <!-- col-lg-3 col-md-6 end -->

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo get_customers_count();  ?></div>
                        <div>Customers</div>
                    </div>
                </div>
            </div>
            <!-- panel-heading end -->
            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left">View-Customers</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
        <!-- panel panel-green end -->

    </div>
    <!-- col-lg-3 col-md-6 end -->

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-suitcase fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo get_category_count();  ?></div>
                        <div>categories</div>
                    </div>
                </div>
            </div>
            <!-- panel-heading end -->
            <a href="index.php?view_p_cat">
                <div class="panel-footer">
                    <span class="pull-left">View-categories</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
        <!-- panel panel-yellow end -->

    </div>
    <!-- col-lg-3 col-md-6 end -->

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo get_order_count();  ?></div>
                        <div>Orders</div>
                    </div>
                </div>
            </div>
            <!-- panel-heading end -->
            <a href="index.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left">View-ordes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
        <!-- panel panel-red end -->

    </div>
    <!-- col-lg-3 col-md-6 end -->
</div>
<!-- .row end end -->
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">

                <h3 class="panel-title">
                    <i class="fa fa-coins fa-fw"></i>New Orders
                </h3>
            </div>
            <!-- panel-heading end -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderd table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Customer Email</th>
                                <th>Invoice No</th>
                                <th>Product id</th>
                                <th>product qty</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $i = 0;
                            $get_order = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,5";

                            $run_order = mysqli_query($con,$get_order);
                            while($row_order=mysqli_fetch_array($run_order)){

                                $order_id = $row_order['order_id'];
                                $cus_id = $row_order['customer_id'];
                                $invoice_no = $row_order['invoice_no'];
                                $product_id = $row_order['product_id'];
                                $qty = $row_order['qty'];
                                $order_status = $row_order['order_status'];

                                $get_cus = "select cus_email from customers where customer_id='$cus_id'";
                                $run_cus = mysqli_query($con,$get_cus);
                                $row_cus = mysqli_fetch_array($run_cus);
                                $cus_email = $row_cus['cus_email'];

                                echo"
                                
                                        <tr>
                                        <td>$order_id</td>
                                        <td>$cus_email</td>
                                        <td>$invoice_no</td>
                                        <td><a href='../details.php?pro_id=$product_id' target='_blank'>$product_id</a></td>
                                        <td>$qty</td>
                                        <td>$order_status</td>
                                        </tr>
                                
                                ";


                            }
                        ?>

                            
                            

                        </tbody>
                    </table>
                </div>
                <!-- table-responsive end -->
                <div class="text-right">
                    <a href="index.php?view_orders">View All Orders</a>
                </div>
            </div>
            <!-- panel-body end -->
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="admin_images/<?php echo $admin_image; ?>" alt="" class="rounded img-responsive">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo $admin_name; ?></span>
                        <span class="thumb-info-type"><?php echo $admin_job; ?></span>
                    </div>
                </div>
                <!-- thumb-info mb-md end -->
                <div class="widget-content-expanded">
                    
                    <span>Email:</span><?php echo $_SESSION['admin_email']; ?><br>
                    
                    <span>contact:</span> <?php echo $admin_contact; ?> <br>
                    
                    <span>Address:</span><?php echo $admin_address; ?><br>

                    
                </div>
                <!-- widget-content-ex end -->
            </div>
            <!-- panel-body end -->
        </div>
    </div>
    <!-- col-md-4 end -->
</div>
<!-- row end -->

<?php
}
?>