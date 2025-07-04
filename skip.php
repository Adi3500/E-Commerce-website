<?php
session_start();
echo"entered";
$_SESSION['username']="";
$_SESSION['user']="";
//$user=$_SESSION['username'];
//echo"welcome.$user"
session_destroy();

header('Location:user_home.php');
?>