<?php

if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{

?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-sitemap"></i> Dashboard / Insert Category
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
                <h3 class="panel-title">Insert Category</h3>
            </div>
            <!-- panel head end -->
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product category title</label>
                        <div class="col-md-6">
                            <input type="text" name="cat_title" id="" class="form-control" required>
                        </div>
                    </div>
                    <!-- form group end -->
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Category Description</label>
                        <div class="col-md-6">
                            <input type="text" name="cat_desc" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert category" id="" class="form-control btn btn-primary">
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

 if(isset($_POST['submit'])){

    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];

    $add_cat = "INSERT INTO product_category (p_cat_title,p_cat_desc) VALUES ('$cat_title','$cat_desc')";
    $run_cat = mysqli_query($con,$add_cat);

    if($run_cat){
        echo"
                            
            <script>alert('New Category is successfully added')</script>
            <script>window.open('index.php?view_p_cat','_self')</script>
        ";
    }
 }





?>

















<?php
}

?>