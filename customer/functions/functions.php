<?php


$db = mysqli_connect("fdb21.awardspace.net","3091031_ichoice","sadungamage39","3091031_ichoice");



function getPro(){

    global $db;

    $get_products = "select * from products order by 1 DESC LIMIT 0,8";

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

                $sub_total = $row_product['product_price'] * $pro_qty; 
                $total += $sub_total;
            }

        }
        echo"$". $total;
    }

?>




            