<?php
	include('connect.php');
	$sql="select * from muahang";
	$tt=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($tt);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng ký</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<table align="center" bgcolor="##FF99CC" style="color:#FF0">
	<tr>
    	<td align="center" colspan="2" style="color:#FF0"><h2>Món Ăn</h2></td>
    </tr>
	<tr>
    	<td style="color:#FF0">Món ăn</td>
        <td><input type="text" name="ten" value="<?php echo $row['ten']; ?>" /></td>
    </tr>
    <tr>
    	<td>Số Lượng</td>
        <td><input type="text" name="sl" value="<?php echo $row['soluong']; ?>" /></td>
    </tr>
    <tr>
    	<td>Giá bán</td>
        <td><input type="text" name="gia" value="<?php echo $row['gia']; ?>" /></td>
    </tr>
    <tr>
    	<td>Ảnh</td>
        <td><input type="file" name="anh"><br><?php echo  "<img src='anh/$row[anh] width=200px height=150px' />"; ?></td>
    </tr>
    <tr>
    	<td colspan="2" align="center" style="color:#090"><input type="submit" name="OK" value="Đồng ý" /></td>
    </tr>
    <tr><td colspan="2">Nếu đã có tài khoản? <a href="dangnhap.php">CLick</a> để đăng nhập</td></tr>
</table>
</form>
<?php
	if(isset($_POST['OK']))
{
	$ten=$_POST['ten'];
	$sl=$_POST['soluong'];
	$gia=$_POST['gia'];
	$tp1=$_FILES['anh'] ['tmp_name'];
	$tp2=$_FILES['anh'] ['name'];
	$up=move_uploaded_file($tp1,'anh/'.$tp2 );
	$sql="update muahang set ten='$ten',soluong='$sl',gia='$gia',anh='$tp2'";										
			$tt=mysqli_query($conn,$sql);
			if($tt) header('location:Home.php'); else echo "Sửa thông tin thất bại";
	}
	else echo "Vui lòng thử lại";
?>
</body>
</html>
</body>
</html>