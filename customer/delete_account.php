<center>
    <h1 style="color:red;">
        DO YOU WANT TO DELETE YOUR ACCOUNT
    </h1>
    <br>
    <br>
    <form action="" method="POST">
        
        <input class="btn btn-danger" type="submit" name="yes" value="Yes,delete my account">

        <input type="submit" name="no" class="btn btn-success" value="No,just kidding">
    </form>
</center>

<?php

$c_email = $_SESSION['customer_email'];

if(isset($_POST['yes'])){

    $delete_acc = "DELETE FROM customers WHERE cus_email='$c_email'";

    $run_delete = mysqli_query($con,$delete_acc);

    if($run_delete){

        session_destroy();
        echo "<script> alert('your account has been deleted.  good bye!!!')</script>";
        echo "<script> window.open('../index.php','_self')</script>";
    }
}

if(isset($_POST['no'])){

    echo "<script> alert('Do not kidding again')</script>";
    echo "<script> window.open('my_account.php?my_orders','_self')</script>";
}

?>