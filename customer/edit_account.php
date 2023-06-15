
<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where cus_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_addr = $row_customer['cus_addr'];
$customer_cont = $row_customer['cus_contact'];
$customer_mail = $row_customer['cus_email'];
$customer_img = $row_customer['cus_img'];

?>

<h1 align="center">
    Edit your Account
</h1>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name ?>" required>
</div>
<!-- form-control end -->

<div class="form-group">
    <label for="">Address</label>
    <input type="text" name="c_address" class="form-control" value="<?php echo $customer_addr ?>" required>
</div>
<!-- form-control end -->

<div class="form-group">
    <label for="">E mail</label>
    <input type="email" name="c_email" class="form-control" value="<?php echo $customer_mail ?>" required>
</div>



<div class="form-group">
    <label for="">contact number</label>
    <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_cont ?>" required>
</div>
<!-- form-control end -->



<div class="form-group">
    <label for="">Image</label>
    <input type="file" name="c_image" class="form-control" required>
    <img src="customer_images/<?php echo $customer_img ?>" width="100" height="100" class="img-responsive" alt="">
</div>
<!-- form-control end -->


<div class="text-center">
    <button name="update" class="btn btn-primary" type="submit">
        Update Your account
    </button>
</div>

</form>

<?php

if(isset($_POST['update'])){

    $update_id = $customer_id;

    $c_name = $_POST['c_name'];
    $c_addr = $_POST['c_address'];
    $c_email = $_POST['c_email'];
    $c_contact = $_POST['c_contact'];
    $c_img = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp,"customer_image/$c_img");

    $update_customer = "UPDATE customers SET customer_name='$c_name',cus_addr='$c_addr',cus_img='$c_img',cus_contact='$c_contact',cus_email='$c_email' WHERE customer_id='$update_id'";

    $run_update = mysqli_query($con,$update_customer);

    if($run_update){

        echo"

        <script>alert('Your account has been updated successfully, please Login again.')</script>

        <script>window.open('../logout.php','_self')</script>";

    }
    


}


?>