<?php


if(!isset($_SESSION['admin_email'])){
    header("Location: ../login.php");
}else{
?>

<?php

if(isset($_GET['delete_slide'])){

    $delete_id = $_GET['delete_slide'];

    $delete_slide = "DELETE FROM slider WHERE slide_id='$delete_id'";

    $run_delete = mysqli_query($con,$delete_slide);

    if($run_delete){

        echo"
        <script>alert('Selected slide is deleted succesfully')</script>
        <script>window.open('index.php?view_slide','_self')</script>
        ";
    }else{
        echo"
        <script>alert('Something gone wrong!! please contact developer')</script>
        <script>window.open('index.php?view_slide','_self')</script>";
    }


}




?>







<?php
}
?>