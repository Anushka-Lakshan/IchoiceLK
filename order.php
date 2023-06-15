<?php

include("includes/db.php");
include("functions/functions.php");

?>

<?php

if(isset($_GET['c_id'])){

    $c_id = $_GET['c_id'];
    $ip_add = getRealUserIP();

    $status = "pending";

    $invoice_no = mt_rand(105,11150);

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($con,$select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){

        $pro_id = $row_cart['p_id'];
        $pro_qty = $row_cart['qty'];
        
        $get_product = "select * from products where product_id='$pro_id'";

        $run_pro = mysqli_query($con,$get_product);

        while($row_products=mysqli_fetch_array($run_pro)){

            $sub_total = $row_products['product_price'] * $pro_qty;

            $insert_cus_order = "insert into customer_orders (customer_id,amount,invoice_no,qty,order_status,order_date) values 
            ('$c_id','$sub_total','$invoice_no','$pro_qty','$status',NOW())";

            $run_cus_order = mysqli_query($con,$insert_cus_order);

            $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status) values 
            ('$c_id','$invoice_no','$pro_id','$pro_qty','$status')";

            $run_pending_order = mysqli_query($con,$insert_pending_order);


        }
    }
    $delete_cart = "delete from cart where ip_add='$ip_add'";
    $run_delete = mysqli_query($con,$delete_cart);

    echo" <script> alert('your order has been submited,thanks..');
    
            window.open('customer/my_account.php?my_orders','_self')</script>";
}

?>