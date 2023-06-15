<?php
if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{
?>

<?php

if(isset($_GET['delete_product'])){

    $pro_id = $_GET['delete_product'];

    $delete_pro = "delete from products where product_id='$pro_id'";
    $run_delete = mysqli_query($con,$delete_pro);

    if($run_delete){

        echo"
        
<script>alert('product has been deleted succesfully');</script>
<script>window.open('index.php?view_products','_self');</script>
        ";
    }
}


?>







<?php

}
?>