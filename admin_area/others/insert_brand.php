<?php

if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{

?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-sitemap"></i> Dashboard / Insert Brand
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
                <h3 class="panel-title">Insert Brand</h3>
            </div>
            <!-- panel head end -->
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Brand title</label>
                        <div class="col-md-6">
                            <input type="text" name="brand_title" id="" class="form-control" required>
                        </div>
                    </div>
                    <!-- form group end -->
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Brand Description</label>
                        <div class="col-md-6">
                            <input type="text" name="brand_desc" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Brand" id="" class="form-control btn btn-primary">
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

    $brand_title = $_POST['brand_title'];
    $brand_desc = $_POST['brand_desc'];

    $add_brand = "INSERT INTO categories (cat_title,cat_desc) VALUES ('$brand_title','$brand_desc')";
    $run_brand = mysqli_query($con,$add_brand);

    if($run_brand){
        echo"
                            
            <script>alert('New brand is successfully added')</script>
            <script>window.open('index.php?view_brand','_self')</script>
        ";
    }
 }





?>

















<?php
}

?>