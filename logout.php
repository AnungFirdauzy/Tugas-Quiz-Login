<?php 
session_start();
session_unset();
session_destroy();
setcookie('login','',time() - 1);
header("Location: login.php");
exit;
?>