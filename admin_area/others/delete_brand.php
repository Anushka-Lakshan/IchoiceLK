<?php


if(!isset($_SESSION['admin_email'])){
    header("Location: ../login.php");
}else{
?>

<?php

if(isset($_GET['delete_brand'])){

    $delete_id = $_GET['delete_brand'];

    $delete_cat = "DELETE FROM categories WHERE cat_id='$delete_id'";

    $run_delete = mysqli_query($con,$delete_cat);

    if($run_delete){

        echo"
        <script>alert('Selected Brand is deleted succesfully')</script>
        <script>window.open('index.php?view_brand','_self')</script>
        ";
    }else{
        echo"
        <script>alert('Something gone wrong!! please contact developer')</script>
        <script>window.open('index.php?view_brand','_self')</script>";
    }


}




?>







<?php
}
?>