<?php session_start(); ?>
<?php 
	include ('connect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nhập hàng</title>
</head>

<body>
<form method="post" enctype="multipart/form-data">
<table align="center" style="color:#FFFFFF; background-color:#FF99CC">
	<tr><td colspan="2"><div align="center" style="color:#FFFF00; background-color:#FF99CC" >NHẬP HÀNG</div></td></tr>
	<tr>
    	<td>Tên món ăn: </td>
        <td><input type="text" name='ten'></td>
    </tr>
    <tr>
    	<td>Số Lượng</td>
        <td><input type="text" name='sl'></td>
    </tr>
    <tr>
    	<td>Giá</td>
        <td><input type="text" name='gia' ></td>
    </tr>
    <tr>
    	<td>Ảnh</td>
        <td><input type="file" name="anh" /></td>
    </tr>
    <tr><td colspan="2" align="center"><input type="submit" value="Nhập dữ liệu" name="ok"></td></tr>
   
    <tr><td align="center" colspan="2"><a href="home.php"><input type="button" value="Trang chủ"></a></td></tr>
</table>
</form>
<?php
	if(isset($_POST['ok']))
{
	$ten=$_POST['ten'];
	$soluong=$_POST['sl'];
	$gia=$_POST['gia'];
	$tp1=$_FILES['anh']['tmp_name'];
	$tp2=$_FILES['anh']['name'];
	$up=move_uploaded_file($tp1,'anh/'.$tp2 );
	$sql="insert into thongtin1(ten,soluong,gia,anh)
values('$ten','$soluong','$gia','$tp2')";
	$thucthi=mysqli_query($conn,$sql);
	if($thucthi)echo "thành công";
	}
	else echo "<script> alert('Vui lòng thử lại.')</script>";
?>
</body>
</html>