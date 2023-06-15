<h1 align="center">Change Password</h1>

<form action="" method="post">

<div class="form-group">
<label for="">Current Password</label>
<input type="text" name="old_pass" class="form-control" required id="">

</div>
<!-- form-group end -->

<div class="form-group">
<label for="">Enter New password</label>
<input type="password" name="new_pass" class="form-control" required id="">

</div>

<div class="form-group">
<label for="">Enter New password again</label>
<input type="password" name="new_pass_again" class="form-control" required id="">

</div>
<div class="text-center">
    <button type="submit" name="submit" class="btn btn-primary">
        Update Password
    </button>
</div>

</form>

<?php

if(isset($_POST['submit'])){

    $c_email = $_SESSION['customer_email'];

    $old_pass = $_POST['old_pass'];

    $new_pass = $_POST['new_pass'];
    $new_pass2 = $_POST['new_pass_again'];

    $set_old_pass = "select * from customers where customer_pass='$old_pass' and cus_email='$c_email'";

    $run_old_pass = mysqli_query($con,$set_old_pass);

    $check = mysqli_num_rows($run_old_pass);

    if($check==0){

        echo"
            <script>alert('your current password is not valid,try again')</script>";
    
        exit();
    }

    if($new_pass != $new_pass2){
        echo"
            <script>alert('your new passwords are does not match')</script>";

            exit();
    }

    $update_pass = "UPDATE customers SET customer_pass='$new_pass' WHERE cus_email='$c_email'";

    $run_update = mysqli_query($con,$update_pass);

    if($run_update){

        echo"
            <script>alert('Your password Has been changed successfully,please Log in again')</script>";
            echo"
            <script >window.open('../logout.php','_self')</script>";
    }

}

?>