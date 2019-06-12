<?php
	include('connect.php');
	$sql="delete from muahang";
	$tt=mysqli_query($conn,$sql);
	if($tt) header('location:home.php');
?>