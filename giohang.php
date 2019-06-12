<?php
				include('connect.php');
				$sql="select * from muahang ";
				$tt=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($tt)
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Giỏ hàng</title>
</head>
<body>
    
	<form method="post" enctype="multipart/form-data">
    	<table border="1">
        	<tr>
            	<th colspan="5"> <h1> Giỏi hàng</h1></th>
            </tr>
            <tr>
            	<td> Tên Món ăn </td>
                <td> Giá bán </td>
 				<td> Ảnh món ăn</td>
                <td> Số Lượng</td>
            </tr>
            <tr>
            	<td> <?php echo $row['ten'];?></td>
                <td> <?php echo $row['gia'];?></td>
                <td> <?php echo "<img src='anh/{$row['anh']}' width='200px' height='150px'>";?></td>
                <td><input type="textbox" name="sl" value="<?php 
						if(isset($_POST['ok'])) {$sl=$_POST['sl']; echo $sl;} else {echo "1";}
						
				?>" /> <br /> <?php if($row['soluong']==0) echo " Hết hàng !"; else echo" Mua tối đa ".$row['soluong']." Hết!!!";?> 
                </td>
                <td> <input type="submit" name="ok"/> </td>
            </tr>
            <tr>
            	<td colspan="3"> Tổng tiền : </td>
                <td>
   <?php
	if(isset($_POST['ok']))
						{
	if($_POST['soluong']<=$row['soluong'])
							{
								$tong=0; $sl=($row['soluong']-$_POST['soluong']);
								echo $tong=$row['gia']*$_POST['soluong']." VNĐ";
							}
							echo $tong=$row['gia']." VNĐ"; 	
							} 
						else {echo $tong=$row['gia']." VNĐ";}
						
					?>
                </td>
            </tr>
            <tr>
            	<th colspan="5"> <input type="submit" name="OK"  value="Mua"/> <a href="Home.php"><input type="button" value="Trang chủ"></a> </th>
                <?php
				if(isset($_POST['OK'])){
				$ten=$row['ten'];
				$gia=$row['gia'];		
				$sl=$_POST['soluong'];
				if($sl > $row['soluong'] ){
					$tong=0; $tong=$row['gia']*$_POST['soluong']." VNĐ"; 	
				$tonkho=($row['soluong']-$sl);
				$sql2="update muahang set Soluong='$tonkho' ";
				$tt2=mysqli_query($conn,$sql2);
				$sql3="insert into giohang (id,ten,gia,soluong,sum) values ('$ten,'$gia','$sl','$tong')";
				$tt3=mysqli_query($conn,$sql3); if($tt3)"ok em ơi"; else echo "not ok!";
				}
				}
                ?>
            </tr>
        </table>
    </form>
</body>
</html>