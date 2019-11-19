<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Thêm Khách Hàng Mới</h1> 
    <form id="themkh" name="themkh" method="post" action="">
        Tên tài khoản của KH: <input type="text" id="kh_taikhoan" name="kh_taikhoan" class="form-control"><br><br>
        Mật khẩu của KH: <input type="password" id="kh_mk" name="kh_mk" class="form-control"><br><br>
        Họ tên của KH: <input type="text" id="kh_hoten" name="kh_hoten" class="form-control"><br><br>
        SĐT của KH: <input type="text" id="kh_sdt" name="kh_sdt" class="form-control"><br><br>
        Địa chỉ của KH: <input type="text" id="kh_diachi" name="kh_diachi" class="form-control"><br><br>
        Email của KH: <input type="text" id="kh_email" name="kh_email" class="form-control"><br><br>
       
        <input type="submit" id="tkh" name="tkh" class="btn btn-outline-secondary" value="Thêm Khách Hàng">
    </form>

<?php  
    require_once __DIR__ .'/../../dbconnect.php';

    if(isset($_POST['tkh'])){
        //print_r('fgfdgd'); die;
        $kh_taikhoan=$_POST['kh_taikhoan'];
        $kh_mk=md5($_POST['kh_mk']);
        $kh_hoten=$_POST['kh_hoten'];
        $kh_sdt=$_POST['kh_sdt'];
        $kh_diachi=$_POST['kh_diachi'];
        $kh_email=$_POST['kh_email'];

        $sqlInsert = "INSERT INTO khachhang(kh_taikhoan, kh_mk, kh_hoten, kh_sdt, kh_diachi, kh_email) VALUES (N'$kh_taikhoan', N'$kh_mk', N'$kh_hoten', N'$kh_sdt', N'$kh_diachi', N'$kh_email');";
        $resultInsert = mysqli_query($conn, $sqlInsert);
        print_r($resultInsert);
        header('location:/nlcstocotoco/backend/index.php?page=khachhang_danhsach');
    }
?>
</body>
</html>
