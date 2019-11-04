<?php
    // Truy vấn database để lấy danh sách
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    require_once __DIR__ . '/../dbconnect.php'; 

    // //nếu tài khoản đăng nhập kh có ton tại
    // if(isset($_SESSION['kh_taikhoan'])){
    //     // Lấy thông tin khách hàng
    //     // Lấy dữ liệu người dùng đã đăng nhập từ SESSION
    //     $kh_taikhoan = $_SESSION['kh_taikhoan'];
    //     // Câu lệnh SELECT
    //     $sql = "SELECT * FROM `khachhang` WHERE kh_taikhoan = '$kh_taikhoan';";

    //     // Thực thi SELECT
    //     $result = mysqli_query($conn, $sql);
        
    //     $dataKhachHang;
    //     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //         $dataKhachHang = array(
    //             'kh_taikhoan' => $row['kh_taikhoan'],
    //             'kh_hoten' => $row['kh_hoten'],
    //             'kh_diachi' => $row['kh_diachi'],
    //             'kh_sdt' => $row['kh_sdt'],
    //             'kh_email' => $row['kh_email'],
    //         );
    //         //  print_r($row);
    //         // die;
    //     }

        // Kiểm tra dữ liệu trong session
        if (isset($_SESSION['cart'])) {
            $_SESSION['cart'];
            //  echo "<pre />";
            //  print_r($_SESSION['cart']);
            //  die;
        } 
        else '';
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đặt hàng</title>
    <link rel="stylesheet" href="./../public/vendor/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="./../public/vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli");
        header a {
            font-family: 'Muli', sans-serif;
            font-weight: bold;
            font-size: 1em;
            color: white;
        }
        header a:hover {
            font-size: 1em;
            color: rgb(231, 216, 76);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
            <nav class="navbar navbar-expand-lg bg-dark">
                <a class="navbar-brand" href="#" style="margin-left: 45px;">
                    <img src="/nlcstocotoco/public/img/thuonghieu/logo.jpg" width="200" height="50"  alt="thuonghieu">
                </a>
                <?php
                        if(isset($_SESSION['kh_taikhoan']) && $_SESSION['kh_taikhoan'] !=""){
                ?>
                    <a href="#" style="color:#FFF"><i class="fa fa-heartbeat" aria-hidden="true"></i> Hi! 
                <?php
                    echo $_SESSION['kh_taikhoan'];
                ?>
                </a>
                <?php
                    }
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/nlcstocotoco/frontend/index.php">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sanpham.php">SẢN PHẨM</a>
                        </li>
                    
                        <li class="nav-item" style="margin-left: 20px;">
                            <form class="form-inline my-2 my-lg-0" method="get" action="#">
                                <input class="form-control mr-sm-1" type="search" placeholder="Tìm kiếm" aria-label="Search" name="">
                                <button class="btn btn-warning mr-sm-5"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/nlcstocotoco/frontend/danhsachgiohang.php"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 25px;"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/nlcstocotoco/frontend/khachhangdangnhap.php"><i class="fa fa-user" aria-hidden="true"  style="font-size: 25px;"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/nlcstocotoco/frontend/khachhangdangxuat.php"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 25px;"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <!-- End Header --> 


    <div class="container mt-5">
        <form id="formthanhtoan" name="formthanhtoan" method="post" action="thanhtoan.php">
            <div class="row">
                <label class="col-md-12 control-label">Nơi giao hàng(*):  </label>
                <div class="col-md-12">
                    <input type="text" name="ddh_noigiao" id="ddh_noigiao" class="form-control" placeholder="Bạn muốn chúng tôi giao hàng cho bạn ở đâu??? " value=""/>
                </div>
            </div>
            <div class="row">      
                <div class="col-md-12" style='text-align: right; padding: 30px 50px 30px 0;'>
                    <input type="submit" name="btnCapNhat"  class="btn btn-outline-secondary" id="btnCapNhat" value="OK"/>
                </div>
            </div> 
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['btnCapNhat'])){

        // ktra su ton tai cua du lieu truoc khi them vao csdl
        if($_POST['ddh_noigiao'] != ""){
            //lay thong tin
            $ddh_noigiao = $_POST['ddh_noigiao'];

            //tao cau truy van va luu vao csdl
            $sql= "INSERT INTO dondathang(ddh_ngaylap, ddh_noigiao, ddh_trangthai, kh_taikhoan) VALUES ( NOW(), N'$ddh_noigiao', 0, N'{$_SESSION['kh_taikhoan']}')";
            $result=mysqli_query($conn,$sql) or die(mysqli_error());
            // print_r( $result);
            // die;

            //lay mã dondathang mới vừa insert vào
            $ddh_ma = mysqli_insert_id($conn);

            //lay tung san pham trong gio hang luu vao csdl
            foreach($_SESSION["cart"] as $key => $val){
                $query="INSERT INTO chitiet_sp_ddh (sp_ma, ddh_ma, sp_ddh_soluong, sp_ddh_dongia) VALUES ('$key', ' $ddh_ma', '{$val['qty']}', '{$val['sp_gia']}');";
                $kq=mysqli_query($conn,$query) or die(mysqli_error($conn));
            }
            // print_r( $query);
            // die;

            //xoa gio hang sau khi them
            unset($_SESSION["cart"]);

            // thong bao them gio hang thanh cong
            echo "<script>alert('Đơn hàng của bạn đã được ghi nhận. Hãy đợi trong vài phút, chúng tôi sẽ liên hệ xác nhận đơn hàng với bạn. Chúc bạn có một ngày tốt lành!');</script>";
            echo "<script>window.location='index.php'</script>";
        }
        // yeu cau nhap du thong tin khi chua nhap du data
        else{
            echo '<script>
                alert("Bạn vui lòng nhập Nơi giao hàng trước khi OK nhé!!!");
                window.location= "thanhtoan.php" ;
            </script>';
        }
    }
?>


