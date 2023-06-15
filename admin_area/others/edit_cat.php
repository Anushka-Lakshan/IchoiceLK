<?php

if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{

?>


<?php
if(isset($_GET['edit_cat'])){

    $edit_cat_id = $_GET['edit_cat'];

    $get_cat = "select * from product_category where p_cat_id='$edit_cat_id'";

    $run_get_cat = mysqli_query($con,$get_cat);

    $row_cat = mysqli_fetch_array($run_get_cat);

    $cat_title = $row_cat['p_cat_title'];
    $cat_desc = $row_cat['p_cat_desc'];

?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-pen"></i> Dashboard / edit Category
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
                <h3 class="panel-title">Edit Category</h3>
            </div>
            <!-- panel head end -->
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">edit category title</label>
                        <div class="col-md-6">
                            <input type="text" name="new_cat_title" id="" class="form-control" value="<?php echo $cat_title; ?>" required>
                        </div>
                    </div>
                    <!-- form group end -->
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Category Description</label>
                        <div class="col-md-6">
                            <input type="text" name="new_cat_desc" id="" class="form-control" value="<?php echo $cat_desc; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Edit category" id="" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <!-- panel body end -->
        </div>
        <!-- panel end -->
    </div>
    <!-- col lg 12 end -->

</div>
<!-- row end -->
<?php
}
?>

<?php

 if(isset($_POST['update'])){

    $new_cat_title = $_POST['new_cat_title'];
    $new_cat_desc = $_POST['new_cat_desc'];

    $update_cat = "UPDATE product_category SET p_cat_title='$new_cat_title',p_cat_desc='$new_cat_desc' WHERE p_cat_id='$edit_cat_id'";

    $run_update = mysqli_query($con,$update_cat);

    if($run_update){
        echo"
                            
            <script>alert('selected Category is updated')</script>
            <script>window.open('index.php?view_p_cat','_self')</script>
        ";
    }
 }





?>

















<?php
}

?>