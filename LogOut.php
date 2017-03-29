<?php
if(isset($_['logOut']))
session_start();
session_destroy();
unset($_SESSION['username']);
$_SERVER['message'] = "You are logged out";
header("location: LogIn.html");
die();
?>