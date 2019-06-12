<?php
	include('connect2.php');
	$sql="delete from muahang ";
	$tt=mysqli_query($conn,$sql);
	if($tt) header('location:xoa.php');
?>