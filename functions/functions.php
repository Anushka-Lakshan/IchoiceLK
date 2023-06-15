<?php


$db = mysqli_connect("localhost","root","","ichoice");



function getPro($pcount=8){

    global $db;

    $get_products = "select * from products order by 1 DESC LIMIT 0,$pcount";

    $run_product = mysqli_query($db,$get_products);

    while($row_products = mysqli_fetch_array($run_product)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];

        echo"

                        
            <div class='col-md-3 col-sm-6 single'>
            <!--single stars-->
            <div class='product'>
                <!--product-->

                <a href='details.php?pro_id=$pro_id' id='product-image'>
                    <img src='admin_area/product_images/$pro_img1' alt='' class='img-responsive'>
                </a>
                <div class='text'>
                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                    <p class='price'>$ {$pro_price}</p>
                    <p class='buttons'>

                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                            View details
                        </a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                            <i class='fa fa-shopping-cart'></i>Add to Cart
                        </a>

                    </p>
                </div>

            </div>
            <!--product ends-->
            </div>
            <!-- single ends -->
        ";
    }

}

?>



<?php

    function getcatprot(){
        global $db;

        if(isset($_GET['p_cat'])){

            $p_cat_id = $_GET['p_cat'];

            $get_cat_pro = "select * from product_category where p_cat_id='$p_cat_id'";
            $run_p_cato = mysqli_query($db,$get_cat_pro);

            $row_p_cat = mysqli_fetch_array($run_p_cato);

            $p_cat_title = $row_p_cat['p_cat_title'];
            $p_cat_desc = $row_p_cat['p_cat_desc'];

            $get_products = "select * from products where p_cat_id='$p_cat_id'";
            
            $run_product = mysqli_query($db,$get_products);

            $count = mysqli_num_rows($run_product);

            if($count==0){
                echo"
                    <div class='box'><h4>No products in this category</h4></div>
                ";
            }else{
                echo"
                
                    <h1>$p_cat_title</h1>
                    <p>$p_cat_desc</p>
                
                ";
            }
        }
    }


?>


<?php

function getbrandt(){

    global $db;

if(isset($_GET['brand_id'])){

    $p_brand_id = $_GET['brand_id'];

    $get_brand_pro = "select * from categories where cat_id='$p_brand_id'";

    $run_brand_cato = mysqli_query($db,$get_brand_pro);

    $row_brand_cat = mysqli_fetch_array($run_brand_cato);

    $p_brand_title = $row_brand_cat['cat_title'];
    $p_brand_desc = $row_brand_cat['cat_desc'];

    $get_products = "select * from products where cat_id='$p_brand_id'";
    
    $run_product = mysqli_query($db,$get_products);

    $count = mysqli_num_rows($run_product);

    if($count==0){
        echo"
            <div class='box'>
            <center><h4>Sorry.. No products in this brand({$p_brand_title}) yet.</h4>
            </center></div>
        ";
    }else{
        echo"
        
            <h1>$p_brand_title</h1>
            <p>$p_brand_desc</p>
        
        ";
    }
}
}





?>

<!-- get catogory products -->
<?php

function getcatproducts(){
    global $db;

    if(isset($_GET['p_cat'])){
        $cato_id = $_GET['p_cat'];

        $getcatoPro = "select * from products where p_cat_id='$cato_id' order by 1 DESC";

        $run_getCato = mysqli_query($db,$getcatoPro);

        while($row_products=mysqli_fetch_array($run_getCato)){
            
                            $pro_id = $row_products['product_id'];
                            $pro_title = $row_products['product_title'];
                            $pro_price = $row_products['product_price'];
                            $pro_img1 = $row_products['product_img1'];

                            echo"

                                            
                                <div class='col-md-4 col-sm-6 single center-responsive'>
                                <!--single stars-->
                                <div class='product'>
                                    <!--product-->

                                    <a href='details.php?pro_id=$pro_id' id='product-image'>
                                        <img src='admin_area/product_images/$pro_img1' alt='' class='img-responsive'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                        <p class='price'>$ {$pro_price}</p>
                                        <p class='buttons'>

                                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                                View details
                                            </a>
                                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                                <i class='fa fa-shopping-cart'></i>Add to Cart
                                            </a>

                                        </p>
                                    </div>

                                </div>
                                <!--product ends-->
                                </div>
                                <!-- single ends -->
                                ";
                        }

    }
}

?>


<!-- get brand products -->

<?php

function getbrandpro(){

    global $db;

    if(isset($_GET['brand_id'])){
        $brand_id = $_GET['brand_id'];

        $getbrandPro = "select * from products where cat_id='$brand_id' order by 1 DESC";

        $run_getBrand = mysqli_query($db,$getbrandPro);

        while($row_products=mysqli_fetch_array($run_getBrand)){
            
                            $pro_id = $row_products['product_id'];
                            $pro_title = $row_products['product_title'];
                            $pro_price = $row_products['product_price'];
                            $pro_img1 = $row_products['product_img1'];

                            echo"

                                            
                                <div class='col-md-4 col-sm-6 single center-responsive'>
                                <!--single stars-->
                                <div class='product'>
                                    <!--product-->

                                    <a href='details.php?pro_id=$pro_id' id='product-image'>
                                        <img src='admin_area/product_images/$pro_img1' alt='' class='img-responsive'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                        <p class='price'>$ {$pro_price}</p>
                                        <p class='buttons'>

                                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                                View details
                                            </a>
                                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                                <i class='fa fa-shopping-cart'></i>Add to Cart
                                            </a>

                                        </p>
                                    </div>

                                </div>
                                <!--product ends-->
                                </div>
                                <!-- single ends -->
                                ";
                        }
                    }
}
            


?>

<!-- get products in details page -->

<?php
function getProDetails(){

    global $db;

    if(isset($_GET['pro_id'])){

        $product_id = $_GET['pro_id'];

        $get_pro = "select * from products where product_id='$product_id'";

        $run_get_pro = mysqli_query($db,$get_pro);

        $row_product = mysqli_fetch_array($run_get_pro);

        $pro_title = $row_product['product_title'];
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];
        $pro_desc = $row_product['product_desc'];
        $pro_price = $row_product['product_price'];
            
        
    }






}

?>


<!-- /* get user ip address */ -->

<?php

    function getRealUserIP(){

        switch(true){
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }


?>


<!-- /* add cart function */ -->

<?php

function add_cart(){

    global $db;
    if(isset($_GET['add_cart'])){

        $ip_add = getRealUserIP();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $product_size = $_POST['product_sizes'];

        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

        $run_check = mysqli_query($db,$check_product);

        if(mysqli_num_rows($run_check)){
            echo"<script> alert('This product is already added in cart') </script>";
            echo"<script> window.open('details.php?pro_id=$p_id','_self') </script>";
        }else{
            $query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";

            $run_query = mysqli_query($db,$query);
            echo"<script> alert('your product is added to cart')</script>";
            echo"<script> window.open('details.php?pro_id=$p_id','_self') </script>";
        }
    }

}

?>


<!-- item function -->

<?php

    
    function items(){
        global $db;

        $ip_add = getRealUserIP();

        $get_items = "select * from cart where ip_add='$ip_add'";

        $run_items = mysqli_query($db,$get_items);

        $count_items = mysqli_num_rows($run_items);

        echo"$count_items";

    }

?>


<!-- get total price -->

<?php

    function total_price(){

        global $db;

        $ip_add = getRealUserIP();

        $total = 0;

        $select_cart = "select * from cart where ip_add='$ip_add'";

        $run_cart = mysqli_query($db,$select_cart);

        while($record=mysqli_fetch_array($run_cart)){

            $pro_id = $record['p_id'];
            $pro_qty = $record['qty'];

            $get_price = "select * from products where product_id='$pro_id'";
            $run_price = mysqli_query($db,$get_price);

            while($row_price=mysqli_fetch_array($run_price)){

                $sub_total = $row_price['product_price'] * $pro_qty; 
                $total += $sub_total;
            }

        }
        echo"$". $total;
    }

?>