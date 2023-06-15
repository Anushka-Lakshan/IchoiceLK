<?php


if(!isset($_SESSION['admin_email'])){
    header("Location: ../login.php");
}else{
?>

<?php

if(isset($_GET['delete_cat'])){

    $delete_id = $_GET['delete_cat'];

    $delete_cat = "DELETE FROM product_category WHERE p_cat_id='$delete_id'";

    $run_delete = mysqli_query($con,$delete_cat);

    if($run_delete){

        echo"
        <script>alert('Selected category is deleted succesfully')</script>
        <script>window.open('index.php?view_p_cat','_self')</script>
        ";
    }


}




?>







<?php
}
?>