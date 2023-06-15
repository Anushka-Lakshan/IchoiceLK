<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

session_destroy();

echo" 

<script>alert('you have succussfully logout. ')</script>
<script>window.open('index.php','_self')</script> ";

?>
