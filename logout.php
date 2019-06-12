<?php
session_start();
if(isset($_SESSION['tk']))
{
	session_destroy();
	header('location:dangnhap.php');
}
 ?>
 
