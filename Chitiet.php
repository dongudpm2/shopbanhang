<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Chi tiết</title>
</head>
<body>
<?php
include('connect.php');
	$sql="select * from muahang";
	$tt=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($tt))
	{
	$ma=$row['id'];
	$ten=$row['ten'];
	$sl=$row['soluong'];
	$gia=$row['gia'];
	$anh=$row['anh'];
 ?>
<form method="post" enctype="multipart/form-data">
<table border="1" cellspacing="0">
<tr>
<td>Tên món: </td>
<td><?php echo $ten ?></td>
</tr>
<tr>
<td>Số lượng:</td>
<td><?php echo $sl ?></td>
</tr>
<tr>
<td>Giá:</td>
<td><?php echo $gia ?></td>
</tr>
<tr>
<td>Hình ảnh món ăn</td>
<td><img src="anh/<?php echo $anh ?>" width="200px" height="200px"></td>
</tr>
<tr><td colspan="2"><a href="Home.php">QUAY LẠI</a></td></tr>
</table>
<?php } ?>
</form>
</body>
</html>