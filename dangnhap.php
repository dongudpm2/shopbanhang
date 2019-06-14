<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
</head>
<body>
<form method="post">
<table align="center" style="color:#FFFFFF; background-color:#FF99CC">
	<tr><td colspan="2"><marquee width="350px">Vui lòng nhập đúng thông tin! Nêu chưa có thì hãy đăng ký</marquee></td></tr>
	<tr><td colspan="2"><div align="center" style="color:#FFFF00; background-color:#FF99CC" >ĐĂNG NHẬP</div></td></tr>
	<tr>
    	<td>Tên đăng nhập</td>
        <td><input type="text" name="tk"></td>
    </tr>
    <tr>
    	<td>Mật khẩu</td>
        <td><input type="password" name="mk"></td>
    </tr>
    <tr><td colspan="2" align="center"><input type="submit" value="Đăng nhập" name="ok"> <a href="dangky.php"><input type="button" value="Đăng ký"></a></td></tr>
    <!--<tr><td colspan="2">Nếu chưa có tài khoản vui lòng <a href="dangkythongtin.php">Đăng ký</a> tại đây</td></tr> -->
    <tr><td align="center" colspan="2"><a href="home.php"><input type="button" value="Trang chủ"></a></td></tr>
</table>
</form>
<?php
include('connect.php');
if (isset($_POST['ok']))
{
	$tk=$_POST['tk'];
	$mk=$_POST['mk'];
	
	$sql="select * from thongtin
					where tk='$tk'
					and mk='$mk'";
	$thucthi=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($thucthi); 
	if($num==1)
	{ 
		$_SESSION['tk']=$tk;
		header('location:home.php');
		
	}
	else echo "<script> alert('Vui lòng thử lại.')</script>";
}
 ?>
</body>
</html>
