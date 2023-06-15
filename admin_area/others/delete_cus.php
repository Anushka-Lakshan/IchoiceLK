<?php


if(!isset($_SESSION['admin_email'])){
    header("Location: ../login.php");
}else{
?>

<?php

if(isset($_GET['delete_cus'])){

    $delete_id = $_GET['delete_cus'];

    $delete_cus = "DELETE FROM customers WHERE customer_id='$delete_id'";

    $run_delete = mysqli_query($con,$delete_cus);

    if($run_delete){

        echo"
        <script>alert('Selected customer is deleted succesfully')</script>
        <script>window.open('index.php?view_customers','_self')</script>
        ";
    }


}




?>







<?php
}
?>