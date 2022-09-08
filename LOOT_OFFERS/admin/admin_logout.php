<?php

session_start();
unset($_SESSION["ad_username"]);
echo "<script type='text/javascript'>;
     alert('LOGOUT');
     window.location='../index.php';
     </script>";
            
?>