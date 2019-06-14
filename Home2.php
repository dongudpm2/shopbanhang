<?php
	session_start();
	if($_SESSION['tk']==""){
		header('location:Home.php');
		}
	else{
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Trang chu</title>
<link rel="stylesheet" type="text/css" href="dinhdang.css">
</head>
<body>
<div id="dinhdang">
<div id="top"><img src="img/chup-anh-mon-an-chuyen-nghiep-tu-liam-min-min.jpg" width="1130px" height="150px"></div>
 <div align="right" style="margin-right:10px; color:#FFFFFF"><?php echo " Đăng nhập: ".$_SESSION['tk']?><span style="margin-right:10px; color:#FFFFFF"><a href="logout.php"><input type="button" value="Đăng xuất"></a></span><a href="Nhapdl.php"><input align="left" type="button" value="Nhập hàng"></a></div>
<div id="than">
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
<form style="background-color:#2d2d30" enctype="multipart/form-data">
  <div id="than" style="float:left; background:#2d2d30" >
<table>
<tr><td><img src="anh/<?php echo $anh ?>" width="200px" height="200px"></td></tr>
<tr><td>Mã SP: <?php echo $ma ?></td></tr>
<tr ><td  style="color:#FFFFFF">Tên: <?php echo $ten ?></td></tr>
<tr><td>Số lượng: <?php echo $sl ?></td></tr>
<tr><td  style="color:#FFFFFF">Giá bán:<?php echo $gia ?> VNĐ </td></tr>
<tr><td align="center"><a href="giohang.php"><input type="button" value="Mua hàng"></a> <a href="Chitiet.php"><input type="button" value="Chi tiết"></a> <a href="xoa.php"><input type="button" value="Xóa"></a> <a href="sua.php"><input type="button" value="Sửa"></a></td></tr>
</table>
</div>
<?php } ?>
</form></div>
</div>
<?php } ?>
</body>
</html>
