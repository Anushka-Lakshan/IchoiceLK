

  <script src="//cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>


    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fas fa-chalkboard-teacher"></i>Dashboard / insert Product
                </li>
            </ol>
        </div>
        <!-- col lg 12 end -->
    </div>
    <!-- row end -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fas fa-money-check-alt"></i>Insert product
                    </h3>
                </div>
                <!-- panel-heading end -->
                <div class="panel-body">
                    <form action="" class="form-horizontal" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product title</label>
                            <div class="col-md-6">
                                <input type="text" name="product_title" class="form-control" required id="">
                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category</label>
                            <div class="col-md-6">

                                <select name="product_cat" class="form-control" id="">
                                    <option value="">select a product category</option>

                                    <?php
                                    $get_p_cats = "select * from product_category";

                                    $run_p_cats = mysqli_query($con,$get_p_cats);

                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                        $p_cat_title = $row_p_cats['p_cat_title'];
                                        $p_cat_id = $row_p_cats['p_cat_id'];

                                        echo" <option value='{$p_cat_id}'> 
                                        $p_cat_title</option> ";
                                    }
                                ?>

                                </select>

                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"> Product Brand</label>
                            <div class="col-md-6">
                                <select name="brand" class="form-control" id="">
                                    <option value="">select a Brand</option>

                                    <?php
                                        $get_brand = "select * from categories";
                                        $run_brand = mysqli_query($con,$get_brand);

                                        while($row_brands=mysqli_fetch_array($run_brand)){

                                            $p_brand_id = $row_brands['cat_id'];
                                            $p_brand_name = $row_brands['cat_title'];

                                            echo" 
                                                <option value='{$p_brand_id}'>{$p_brand_name}</option>   
                                            ";
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product image(Main)</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img1" class="form-control" required id="">
                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product image2</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img2" class="form-control" id="">
                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product image3</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img3" class="form-control" id="">
                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product price </label>
                            <div class="col-md-6">
                                <input type="text" name="product_price" class="form-control" required id="">
                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product keywords</label>
                            <div class="col-md-6">
                                <input type="text" name="product_keywords" class="form-control" required id="">
                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-6">

                                <textarea name="product_desc" class="form-control" id="txtedit" cols="19"
                                    rows="6"></textarea>

                            </div>
                        </div>
                        <!-- form-group end -->

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary form-control"
                                    value="Insert Product">

                            </div>
                        </div>
                        <!-- form-group end -->

                    </form>
                </div>
                <!-- panel body end -->
            </div>
            <!-- panel end -->
        </div>
        <!-- cl lg 12 end -->
    </div>
    <!-- row 2nd end -->






    <style>
    i {
        padding: 5px;
    }
    </style>

    <script>
    CKEDITOR.replace('txtedit');
    </script>


    <?php

    if(isset($_POST['submit'])){

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $brand = $_POST['brand'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];

        
        
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];


        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");


        $insert_product = "insert into products (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword) values ('$product_cat','$brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keywords')";

       

        $run_product = mysqli_query($con,$insert_product);



        if($run_product){
            echo" <script> alert('Your Product inserted Successfully') </script> ";
            echo" <script> window.open('index.php?view_products','_self') </script> ";
        }
        

    }

?>
