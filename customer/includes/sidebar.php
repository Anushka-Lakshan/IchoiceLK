<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">

    <?php
        $cus_session = $_SESSION['customer_email'];

        $get_cus = "select * from customers where cus_email='$cus_session'";

        $run_cus = mysqli_query($con,$get_cus);

        $row_customer = mysqli_fetch_array($run_cus);

        $cus_name = $row_customer['customer_name'];
        $cus_image = $row_customer['cus_img'];

        echo"
        <img src='customer_images/$cus_image' class='img-responsive'>
        </center>
        <br>
        <h3 align='center' class='panel-title'><b>$cus_name</b></h3>
        ";

    ?>
        
    </div>
    <!-- panel-heading end -->

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if(isset($_GET['my_orders'])){echo"active";} ?>">
                <a href="my_account.php?my_orders"> <i class="fa fa-list"></i> My orders </a>
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){echo"active";} ?>">
                <a href="my_account.php?pay_offline"> <i class="fa fa-bolt"></i> Pay offline </a>
            </li>
            <li class="<?php if(isset($_GET['edit_account'])){echo"active";} ?>">
                <a href="my_account.php?edit_account"> <i class="fa fa-pen"></i> Edit account </a>
            </li>
            <li class="<?php if(isset($_GET['change_pass'])){echo"active";} ?>">
                <a href="my_account.php?change_pass"> <i class="fa fa-user"></i> Change Password </a>
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){echo"active";} ?>">
                <a href="my_account.php?delete_account"> <i class="fa fa-trash"></i> Delete account </a>
            </li>
            <li>
                <a href="../logout.php"> <i class="fa fa-sign-out-alt"></i> Logout </a>
            </li>
            
        </ul>

    </div>
    <!-- panel bby endkk -->
</div>