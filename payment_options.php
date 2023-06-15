<div class="box">


<?php

$session_email = $_SESSION['customer_email'];

$select_cus = "select * from customers where cus_email='$session_email'";

$run_cus = mysqli_query($con,$select_cus);

$row_customer = mysqli_fetch_array($run_cus);

$cus_id = $row_customer['customer_id'];

?>



<h1 class="text-center">Payment options for you</h1>

<p class="lead text-center"><a href="order.php?c_id=<?php echo $cus_id; ?>">Pay offline</a></p>

<center>
    <p class="lead">
    
        <a href="#" Onclick='lol();'>Pay online with Paypal</a>
        <img src="images/paypal.png" alt="" width='60%' style='display:block'>
    
    
    </p>
</center>
<script>
function lol(){
    alert('sorry... This is education project you can not buy anything from this site');
}

</script>

</div>
<!-- box end -->