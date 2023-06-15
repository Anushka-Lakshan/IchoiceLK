<div id="footer">
    <!--footer starts-->
    <div class="container">
        <div class="row">
            <!--row starts-->
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="Shop.php">Shop</a></li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='checkout.php'>My Account</a>";
                            }else{
                                echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                        </li>
                </ul>

                <h4>User Section</h4>
                <ul>
                    <li><?php
                        if(isset($_SESSION['customer_email'])){
                            echo"<a href='logout.php'>Logout</a>";
                        }else{
                            echo"<a href='checkout.php'>Log in</a>";
                        }
                        ?></li>
                    <li><a href="register.php">Register</a></li>

                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">
            </div>

            <div class="col-md-3 col-sm-6">
                <h4>Top Products Categories</h4>
                <ul>
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
                <hr class="hidden-md hidden-lg">
            </div>

            <div class="col-md-3 col-sm-6">
                <h4>How to Find us</h4>
                <p><strong>IchoiceLK.com</strong><br>
                    Maharagama <br>
                    Sri lanka.
                </p>
                <br>
                <a href="contact.php">Go to Contact Us page</a>
                <hr class="hidden-md hidden-lg">
            </div>

            <div class="col-md-3 col-sm-6">
                <h4>Get the News</h4>
                <p class="text-muted">Subscribe us to find New Products</p>
                <form action="" method="post">
                    <div class="input-group">

                        <input type="text" class="form-control" name="email">
                        <span class="input-group-btn">
                            <input type="submit" value="Subscribe" class="btn btn-default">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay in touch</h4>
                <p class="social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-google-plus"></i></a>
                    <a href="#"><i class="fab fa-envalope"></i></a>
                </p>
            </div>
        </div>
        <!--row ends-->
    </div>
</div>
<!--footer ends-->

<div id="copyright" style="background:#444444; color:white; padding:20px;">
    <!--copyright-->
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
                &copy; 2019 Anushka Lakshan - Educational project
            </p>
        </div>
    </div>
</div>