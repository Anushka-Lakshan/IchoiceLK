<?php
if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-chalkboard-teacher" style="margin-right:5px;"></i>Dashboard / View Products
            </li>
        </ol>
    </div>
    <!-- col-lg 12 end -->
</div>
<!-- row end -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-cube fa-fw" style="margin-right:5px;"></i>View Products
                </h3>
            </div>
            <!-- panel-heading end -->

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Title</th>
                                <th>Product image</th>
                                
                                <th>Product price</th>
                                <th>Product sold</th>
                                <th>Product keywords</th>
                                <th>Product date</th>
                                <th>Product Delete</th>
                                <th>Product Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            $get_pro = "select * from products";
                            $run_pro = mysqli_query($con,$get_pro);

                            while($row_pro=mysqli_fetch_array($run_pro)){

                                $pro_id = $row_pro['product_id'];
                                $pro_title = $row_pro['product_title'];
                                $pro_image = $row_pro['product_img1'];
                                $pro_price = $row_pro['product_price'];
                                $pro_keywords = $row_pro['product_keyword'];
                                $pro_date = $row_pro['date'];

                                $i ++;

                                $get_sold = "select * from pending_orders where product_id='$pro_id'";
                                $run_sold = mysqli_query($con,$get_sold);
                                $sold = mysqli_num_rows($run_sold);

                                echo"

                                <tr>
                                <td>$i</td>
                                <td>$pro_title</td>
                                <td><image src='product_images/$pro_image' width='60' height='60'></td>
                                <td>$pro_price</td>
                                <td>$sold</td>
                                <td>$pro_keywords</td>
                                <td>$pro_date</td>
                                <td>
                                <button class='btn btn-danger' onclick='confirm_$pro_id()'><i class='fa fa-trash'></i> Delete</button>
                                <script>
                                    function confirm_$pro_id() {
                                    
                                    if (confirm('Do you want to delete [ $pro_title ] product?')){
                                        window.open('index.php?delete_product=$pro_id','_self');
                                    } else {
                                        
                                    }
                                    
                                    }
                                    </script>
                                </td>
                                <td><a class='btn btn-warning' href='index.php?edit_product=$pro_id'><i class='fa fa-pen'></i> Edit</a></td>
                                </tr>
                                ";
                            }

                        ?>
                        </tbody>
                                    
                    </table>
                </div>
                <!-- table responsive end -->
            </div>
            <!-- panel-body end -->
        </div>
        <!-- panel end -->
    </div>
    <!-- col-lg 12 end -->
</div>
<!-- row end -->


<?php } ?>