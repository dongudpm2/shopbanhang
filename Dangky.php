<?php session_start(); ?>
<?php
	include('connect.php');
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
    	<td align="center" colspan="2" style="color:#FF0"><h2>Đăng ký</h2></td>
    </tr>
	<tr>
    	<td style="color:#FF0">Họ và tên</td>
        <td><input type="text" name="ten" /></td>
    </tr>
    <tr>
    	<td>Điện thoại</td>
        <td><input type="tel" name="sdt" /></td>
    </tr>
    <tr>
    	<td>Giới tính</td>
        <td><input type="radio" name="gt" value="Nam" />Nam
        	<input type="radio" name="gt" value="Nu" />Nữ</td>
    </tr>
    <tr>
    	<td>Tên Tài Khoản</td>
        <td><input type="text" name="tk" /></td>
    </tr>
    <tr>
    	<td>Mật Khẩu</td>
        <td><input type="password" name="mk" /></td>
    </tr>
    <tr>
    	<td>Nhập lại Mật Khẩu</td>
        <td><input type="password" name="mk" /></td>
    </tr>
    <tr>
    	<td>Ảnh Avanta</td>
        <td><input type="file" name="anh" wight=100px height=100px /></td>
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
	$dienthoai=$_POST['sdt'];
	$gioitinh=$_POST['gt'];
	$tentk=$_POST['tk'];
	$matkhau=$_POST['mk'];
	$mk=$_POST['mk'];
	if($matkhau == $mk)
	{
	$tp1=$_FILES['anh'] ['tmp_name'];
	$tp2=$_FILES['anh'] ['name'];
	$up=move_uploaded_file($tp1,'anh/'.$tp2 );
	$sql="insert into thongtin(ten,sdt,gt,tk,mk,anh)
values('$ten','$dienthoai','$gioitinh','$tentk','$matkhau','$tp2')";
	$thucthi=mysqli_query($conn,$sql);
	if($thucthi) header('location:dangnhap.php');
	}
	else echo "<script> alert('Vui lòng thử lại.')</script>";
	
	
}
?>


</body>
</html>