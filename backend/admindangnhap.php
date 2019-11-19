<?php
    require_once __DIR__ . '/../dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Đăng Nhập</title>
		<style>
			body{
				background: linear-gradient(rgba(16,29,44,.60), rgba(16,29,44,.60)), url(/nlcstocotoco/public/img/background/bg5.jpg);
			}
			.khungdangnhap{
				width: 300px;
				height: 320px;
				margin: 200px 500px;
				background: #F0FFF0;
				border: 1px solid black;
			}
	
			.khungdangnhap h2{
				text-align: center;
				color: 	#382C85;
			}
			td input[type="text"],td input[type="password"]{
				 background: none; 
				 display: block;
				 margin-top:10px;
				 text-align:center;
				 border:2px solid #3498db;
				 padding:10px;
				 width: 200px; 
				 outline:none;
				 color:blue; 
				 border-radius:10px;
			}
			td input[type="submit"]{
				 margin-top:10px;
				 margin-bottom: 10px;
			}
			
		</style>
		
	</head>
	
	<body>
		<form action="" method="POST">
			<div class="khungdangnhap">
				<h2>ADMIN ĐĂNG NHẬP</h2>
				<hr>
					<table align="center">
						<tr align="center">
							<td>TÀI KHOẢN</td>
						</tr>
						<tr>
							<td><input name="ad_tk" type="text"></td>
						</tr>
		
						<tr align="center">	
							<td>MẬT KHẨU</td>
						</tr>
						<tr>
							<td><input name="ad_mk" type="password"></td>
						</tr>
				
						<tr>	
							<td></td>
						</tr>
						<tr>
							<td align="center"><input value="ĐĂNG NHẬP" type="submit" name="btnDangNhap" style="height:25px; width: 100px; background: #4A39BD; color: white"></td>
						</tr>
					
					</table>
				
			</div>
		</form>
	
	<?php
	if(isset($_POST["btnDangNhap"])){
		$ad_tk=trim($_POST["ad_tk"]);
		$ad_mk=trim($_POST["ad_mk"]);
		if(!$ad_tk || !$ad_mk){
			echo '<script>
				alert("Bạn hãy nhập đầy đủ tài khoản và mật khẩu!!!");
				window.location= "admindangnhap.php" ;
				</script>'; 
		}
		else
		{
			$ad_tk = mysqli_real_escape_string($conn, $ad_tk);
			//$ad_mk = md5($ad_mk);
			$result = mysqli_query($conn, "SELECT * FROM admin WHERE ad_tk='$ad_tk' AND ad_mk='$ad_mk' ") or die(mysql_error());
			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$_SESSION["ad_tk"] = $ad_tk;
				echo "<script language='javascript'>window.location='index.php'</script>";
			}
			else{
				echo '<script>
					alert("Bạn đã nhập sai Tài khoản hoặc Mật khẩu. Bạn phải đăng nhập ĐÚNG tài khoản và mật khẩu của Admin!!!");
					window.location= "admindangnhap.php" ;
				</script>'; 
			}
		}
	}   
	?>
</body>