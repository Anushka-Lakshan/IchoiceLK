<div class="box">
<div class="box-header">
<center>
<h1>Login</h1>
<p class="lead">Login here if you are already our customer</p>
</center>
</div>
<div class="boxboby" style="width:80%;margin: 5px auto;">
<form action="checkout.php" method="post">
<br>
<div class="form-group">
<label for="mail">Email</label>
<input type="email" name="c_email" id="mail" class="form-control" required>
</div>
<!-- form-group end -->
<div class="form-group">
<label for="pass">Password</label>
<input type="password" name="c_pass" id="pass" class="form-control" required>
</div>

<div class="text-center">

<?php



if(isset($wrong_log)){
    if($wrong_log==true){
        echo"
        <p style='color:red'> your email or password is wrong please enter again</p>";
    }
}

?>

<button type="submit" name="login" value="Login" class="btn btn-primary">Login</button>
<br>

</div>
<br>
<p class="text-center"><a href="register.php">New user? Register here</a></p>
</form>
</div>
</div>

<?php

if(isset($_POST['login'])){
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];

    $select_customer = "select * from customers where cus_email='$c_email' AND customer_pass='$c_pass'";

    $run_customer = mysqli_query($con,$select_customer);
    $get_ip = getRealUserIP();

    $check_customer = mysqli_num_rows($run_customer);

    $select_cart = "select * from cart where ip_add='$get_ip'";

    $run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer==0){
        echo"<script>alert('your email or password is wrong')</script>";
        $wrong_log = true;

        exit();
        $wrong_log = true;
    }

    if($check_customer==1 AND $check_cart==0){
        $_SESSION['customer_email'] = $c_email;
        
        $row_cus = mysqli_fetch_array($run_customer);

        $_SESSION['c_name'] = $row_cus['customer_name'];

        echo"<script>alert('You are logged in')</script>";
        echo"<script>window.open('index.php','_self')</script>";
        $wrong_log = false;
    }else{
        $_SESSION['customer_email'] = $c_email;
        
        $row_cus = mysqli_fetch_array($run_customer);

        $_SESSION['c_name'] = $row_cus['customer_name'];

        echo"<script>alert('You are logged in')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";
        $wrong_log = false;
    }
}
?>
