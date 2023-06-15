<?php

session_start();

session_destroy();

echo"

<script>alert('you have successfully logout, Good bye!!')</script>
<script>window.open('login.php','_self')</script>
";


?>