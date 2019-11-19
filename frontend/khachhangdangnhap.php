<?php
	require_once __DIR__ . '/../dbconnect.php';
?>
<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8">
		<title>NƠI KHÁCH HÀNG ĐĂNG NHẬP</title>
		<style>
			body{
				background: linear-gradient(rgba(16,29,44,.60), rgba(16,29,44,.60)), url(/nlcstocotoco/public/img/background/bg1.jpg);
			}
			.khungdangnhap{
				width: 350px;
				height: 330px;
				margin-left: 480px;
				margin-top: 200px;
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
		<form action="khachhangdangnhap.php" method="POST">
			<div class="khungdangnhap">
				<h2>KHÁCH HÀNG ĐĂNG NHẬP</h2>
				<hr>
                <table align="center">
                    <tr align="center">
                        <td>TÀI KHOẢN</td>
                    </tr>
                    <tr>
                        <td><input name="kh_taikhoan" type="text"></td>
                    </tr>
    
                    <tr align="center">	
                        <td>MẬT KHẨU</td>
                    </tr>
                    <tr>
                        <td><input name="kh_mk" type="password"></td>
                    </tr>
            
                    <tr>	
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center"><input value="ĐĂNG NHẬP" type="submit" name="btnDangNhapKH" style="height:25px; width: 100px; background: #4A39BD; color: white"></td>
                    </tr>
                    <tr>
                        <td align="center"><input value="ĐĂNG KÝ" name="btnDangKyKH" type="submit" style="height:25px; background:blue; color:white"></td> 
                    </tr>
                
                </table>				
			</div>
		</form>
	
	<?php
		if(isset($_POST["btnDangNhapKH"])){
            // print_r($_POST["kh_mk"]);
            // print_r("them ham trim()");
            // print_r(trim($_POST["kh_mk"]));
            // print_r("them ham md5(trim())");
            // print_r(md5(trim($_POST["kh_mk"])));
            // die;

            $kh_taikhoan = trim($_POST["kh_taikhoan"]);
            $kh_mk = md5(trim($_POST["kh_mk"]));


            if(!$kh_taikhoan || !$kh_mk){
                echo '<script>
                    alert("Khách hàng hãy nhập đầy đủ Tài khoản và Mật khẩu nhé!!!");
                    window.location= "khachhangdangnhap.php" ;
                    </script>'; 
            }
            else
            {
                //$kh_taikhoan = mysqli_real_escape_string($conn, $kh_taikhoan);
                //$kh_mk = mysqli_real_escape_string($conn, $kh_mk);
                $sqlQuery = "SELECT * FROM khachhang WHERE kh_taikhoan = '$kh_taikhoan' AND kh_mk = '$kh_mk' ";
                // print_r($sqlQuery);
                // die;
                $result = mysqli_query($conn, $sqlQuery) or die(mysql_error());
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $_SESSION["kh_taikhoan"] = $kh_taikhoan;
                    echo "<script language='javascript'>window.location='index.php'</script>";
                }
                else{
                    echo '<script>
                        alert("Khách hàng đã nhập sai Tài khoản hoặc Mật khẩu. Vui lòng nhập lại nào!!!");
                        window.location= "khachhangdangnhap.php" ;
                    </script>'; 
                }
            }
        } 
        
        if(isset($_POST['btnDangKyKH'])){
            echo '<script>
                    window.location= "khachhangdangky.php" ;
                </script>';
        }
       


	?>
	</body>
</html>
