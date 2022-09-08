<?php
session_start();
unset($_SESSION["customer"]);
//session_destroy();

?>
<script>
//alert("Logout..");
window.location="index.php"
</script>
