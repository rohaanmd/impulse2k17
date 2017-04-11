<?php
session_start();
$_SESSION["admin"]=0;
session_destroy();
echo "You are Logged Out Successfully";
header("Location: ./index.php")
 ?>
