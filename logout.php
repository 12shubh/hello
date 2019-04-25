<?php 
session_start();
session_unset('uid');
session_destroy();
header('location:login.php');

?>