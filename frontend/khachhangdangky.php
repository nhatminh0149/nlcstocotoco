
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8"/>
        <title>KHÁCH HÀNG ĐĂNG KÝ TÀI KHOẢN</title>
        <style>
                body{
                    margin: 0;
					padding: 0;
                    background: linear-gradient(rgba(16,29,44,.70), rgba(16,29,44,.7)), url(/nlcstocotoco/public/img/background/bg3.jpg);
                }
				h2{
					color: white;
					margin-bottom: 36px;
				}
                div{
                padding-top:70px;
                margin: 50px 390px;
                width:500px;
                }
				
                td{
                    color:#F2F2F2;
                    font-size: 16px;
                }
				
                td input[type="text"],td input[type="password"],td input[type="file"]{
                    background: none; 
					display: block;
					margin-left: 50px; 
					text-align:center;
					border: 1px solid orange;
					padding:10px;
					width: 200px; 
					height:20px;
					outline:none;
					color:white; 
                    border-radius:10px;
                    font-size: 16px;
                }
				
                td input[type="submit"],td input[type="reset"] {
                    background: none;
					display: inline-block;
					margin-left: 15px;
					margin-top: 15px;
					text-align:center;
					border:2px solid #3498db; 
					border-radius:10px;
					border-color:#2ecc71;
					width: 80px;
					height:30px;
					line-height:20px; 
					outline:none;
					color:white;
                 
                }
				td input[type="radio"]{
					margin-left: 30px;
				}
                
        </style>
	</head>
	<body>
		<div>
			<form name="khdk" id="khdk" method="POST">
				<h2><center>KHÁCH HÀNG ĐĂNG KÝ TÀI KHOẢN</center></h2>
				<table>
					<tr>
						<td>Tên tài khoản:</td>
						<td>
							<input type="text" name="kh_taikhoan"/>
						</td>
					</tr>
					<tr>
						<td>Mật khẩu:</td>
						<td>
							<input type="password" name="kh_mk"/>
						</td>
                    </tr>
                    <tr>
						<td>Gõ lại mật khẩu: </td>
						<td>
							<input type="password" name="re_khmk"/>
						</td>
					</tr>
					<tr>
						<td>Họ tên:</td>
						<td>
							<input type="text" name="kh_hoten"/>
						</td>
					</tr>
					
					<tr>	
						<td>Địa chỉ:</td><td><input name="kh_diachi" type="text" value=""></td>
					</tr>
                    <tr>	
                        <td>SĐT:</td><td><input name="kh_sdt" type="text" value=""></td>
                    </tr>
                    <tr>	
                        <td>Email:</td><td><input name="kh_email" type="text" value=""></td>
                    </tr>
				
					<tr>
						<td></td>
						<td style="padding-left:50px">
							<input type="submit" name="submitDK" value="OK"/>
							<input type="reset" value="reset"/> 
						</td>
					</tr>
					
				</table>
			</form>
		</div>


	<?php
        require_once __DIR__ .'/../dbconnect.php';

        if(isset($_POST['submitDK'])){
            $kh_taikhoan=$_POST['kh_taikhoan'];
            $kh_mk= md5($_POST['kh_mk']);
            $kh_hoten=$_POST['kh_hoten'];
            $kh_sdt=$_POST['kh_sdt'];
            $kh_diachi=$_POST['kh_diachi'];
			$kh_email=$_POST['kh_email'];
			
			if($_POST['kh_taikhoan']=="" || $_POST['kh_mk']=="" || $_POST['re_khmk']=="" || $_POST['kh_hoten']=="" || $_POST['kh_sdt']=="" || $_POST['kh_diachi']=="" || $_POST['kh_email']==""){
				echo '<script>
                		alert("Vui lòng nhập đầy đủ thông tin có dấu!!!");
                		window.location= "khachhangdangky.php" ;
           			 </script>';
			}
			else if($_POST['kh_mk'] != $_POST['re_khmk']){
				echo '<script>
                		alert("Mật khẩu phải trùng nhau. Vui lòng nhập lại!!!");
                		window.location= "khachhangdangky.php" ;
           			 </script>';
			}
			else{
				$sqlInsert = "INSERT INTO khachhang(kh_taikhoan, kh_mk, kh_hoten, kh_sdt, kh_diachi, kh_email) VALUES (N'$kh_taikhoan', N'$kh_mk', N'$kh_hoten', N'$kh_sdt', N'$kh_diachi', N'$kh_email');";
				$resultInsert = mysqli_query($conn, $sqlInsert);
				print_r($resultInsert);
				header('location:/nlcstocotoco/frontend/khachhangdangnhap.php');

			}      
        }
	
	?>
	</body>
</html>