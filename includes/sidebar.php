<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Products Categories</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            
        <?php
                        $get_p_cats = "select * from product_category";
                        $run_p_cat = mysqli_query($con,$get_p_cats);

                        while($p_cat_row=mysqli_fetch_array($run_p_cat)){

                            $product_cats = $p_cat_row['p_cat_title'];
                            $product_cat_id = $p_cat_row['p_cat_id'];

                            echo"
                                <li><a href='shop.php?p_cat={$product_cat_id}'>{$product_cats}</a></li>
                            ";
                        }
                    

                    ?>

        </ul>
    </div>
</div>


<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Brands</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
           
            <?php
                $get_brands = "select * from categories";
                $run_brands = mysqli_query($con,$get_brands);

                while($brand_rows=mysqli_fetch_array($run_brands)){
                    
                    $brand_id = $brand_rows['cat_id'];
                    $brand_title = $brand_rows['cat_title'];

                    echo"
                        <li><a href='shop.php?brand_id={$brand_id}'>{$brand_title}</a></li>
                    
                    ";


                }

            ?>

        </ul>
    </div>
</div>