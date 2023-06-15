<center>
    <h1>
        My orders
    </h1>
    <p class="lead">
        All your orders on one place.
    </p>
    <p class="text-muted">
        if you have any problem please <a href="../contact.php">contact us.</a>
    </p>

</center>

<hr>

<div class="table-responsive">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order N.</th>
                <th>Due Ammount</th>
                <th>invoice N</th>
                <th>Qty:</th>
                
                <th>order date</th>
                <th>Paid/unpaid</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $cus_email = $_SESSION['customer_email'];

                $get_cus = "select * from customers where cus_email='$cus_email'";

                $run_cus = mysqli_query($con,$get_cus);

                $row_customer = mysqli_fetch_array($run_cus);

                $customer_id = $row_customer['customer_id'];

                $get_orders = "select * from customer_orders where customer_id='$customer_id'";

                $run_orders = mysqli_query($con,$get_orders);

                $i = 0;

                while($row_orders = mysqli_fetch_array($run_orders)){
                    
                    $order_id = $row_orders['order_id'];
                    $due_amount = $row_orders['amount'];
                    $invoice_no = $row_orders['invoice_no'];
                    $qty = $row_orders['qty'];
                    $order_date = substr($row_orders['order_date'],0,11);
                    $order_status = $row_orders['order_status'];

                    $i++;

                    if($order_status == "pending"){
                        
                        $order_status = "unpaid";
                    }else{
                        $order_status = "Paid";
                    }
         
            ?>
            <tr>
                <th><?php  echo $i; ?></th>
                <td><?php  echo $due_amount; ?></td>
                <td><?php  echo $invoice_no; ?></td>
                <td><?php  echo $qty; ?></td>
                
                <td><?php  echo $order_date; ?></td>
                <td><?php  echo $order_status; ?></td>
                <td>
                    <a href="confirm.php?order_id=<?php  echo $order_id; ?>" class="btn btn-primary btn-small" target="blank">confirm if paid</a>
                </td>
            </tr>

            <?php
            }
            ?>

            
        </tbody>

    </table>

</div>
<!-- table-resp end -->