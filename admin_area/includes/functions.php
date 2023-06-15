<?php

function get_products_count(){

global $con;

$get_products = "select * from products";

$run_products = mysqli_query($con,$get_products);

$num_rows = mysqli_num_rows($run_products);

return $num_rows;

}

?>

<!-- /* get customer count */ -->

<?php


function get_customers_count(){

    global $con;
    
    $get_customers = "select * from customers";
    
    $run_customers = mysqli_query($con,$get_customers);
    
    $num_rows = mysqli_num_rows($run_customers);
    
    return $num_rows;
    
    }
    

?>

<!-- /* get categories */ -->

<?php

function get_category_count(){

    global $con;
    
    $get_product_category = "select * from product_category";
    
    $run_product_category = mysqli_query($con,$get_product_category);
    
    $num_rows = mysqli_num_rows($run_product_category);
    
    return $num_rows;
    
    }
   


?>

<!-- get pending orders -->

<?php

function get_order_count(){

    global $con;
    
    $get_pending_orders = "select * from pending_orders";
    
    $run_pending_orders = mysqli_query($con,$get_pending_orders);
    
    $num_rows = mysqli_num_rows($run_pending_orders);
    
    return $num_rows;
    
    }
   


?>