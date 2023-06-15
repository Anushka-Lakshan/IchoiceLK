<?php

if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{
?>

<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">
            <li class="active"><i style="margin-right:5px" class="fa fa-users"></i>Dashboard / View customers</li>
        </ol>

    </div>
    <!-- col lg 12 end -->
</div>
<!-- row end -->


<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    View Customers
                </h3>
            </div>
            <!-- panel-heading end -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Customer no</th>
                                <th>Customer name</th>
                                <th>Customer email</th>
                                <th>Customer image</th>
                                <th>Customer address</th>
                                <th>Contact</th>
                                <th>Delete Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $get_cus = "select * from customers";

                            $run_cus = mysqli_query($con,$get_cus);

                            $i = 1;

                            while($row_cus=mysqli_fetch_array($run_cus)){
                                $cus_id = $row_cus['customer_id'];
                                $cus_name = $row_cus['customer_name'];
                                $cus_email = $row_cus['cus_email'];
                                $cus_img = $row_cus['cus_img'];
                                $cus_addr = $row_cus['cus_addr'];
                                $cus_contact = $row_cus['cus_contact'];

                                echo"
                                <tr>
                                <td>$i</td>
                                <td>$cus_name</td>
                                <td>$cus_email</td>
                                <td><img class='img-responsive' width='100' src='../customer/customer_images/$cus_img'></td>
                                <td>$cus_addr</td>
                                <td>$cus_contact</td>
                                <td>
                                <button class='btn btn-danger' onclick='confirm_$cus_id()'><i class='fa fa-trash'></i> Delete</button>
                                <script>
                                    function confirm_$cus_id() {
                                    
                                    if (confirm('Do you want to delete [ $cus_name ] customer?')){
                                        window.open('index.php?delete_cus=$cus_id','_self');
                                    } else {
                                        
                                    }
                                    
                                    }
                                    </script>
                                </td>
                                </tr>
                                ";
                                $i ++;
                            }

                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- table-responsive end -->
            </div>
            <!-- panel-body end -->
        </div>
        <!-- panel end -->
    </div>
    <!-- col lg 12 end -->
</div>
<!-- row end -->

















<?php

}

?>