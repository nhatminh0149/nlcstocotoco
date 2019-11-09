<?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    require_once __DIR__ . '/../dbconnect.php';

    // 2.Truy vấn dữ liệu Sản phẩm 
    //Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $sp_ma = $_GET['sp_ma'];

    $sqlSelectSanPham = <<<EOT
    SELECT sp.sp_ma, hsp.hsp_ma, hsp.hsp_tentaptin, sp.sp_ten, sp.sp_gia, sp.sp_mota, sp.lsp_ma
    FROM hinhsanpham hsp
    RIGHT JOIN  sanpham sp  ON sp.sp_ma=hsp.sp_ma
    WHERE sp.sp_ma = $sp_ma;
EOT;

    // print_r($sqlSelectSanPham);
    // die;

    // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
    $resultSelectSanPham = mysqli_query($conn, $sqlSelectSanPham);

    // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Tạo 1 mảng array để chứa các dữ liệu được trả về
    $sanphamRow;
    while ($row = mysqli_fetch_array($resultSelectSanPham, MYSQLI_ASSOC)) {
        $sanphamRow = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_gia_formated' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
            'sp_mota' => $row['sp_mota'],
            'hsp_tentaptin' => $row['hsp_tentaptin'],
            'lsp_ma' => $row['lsp_ma']
        );
    }
    // print_r($sanphamRow);
    // die;
    /* --- End Truy vấn dữ liệu Sản phẩm --- */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    .details .product-title{
        text-transform: uppercase;
        letter-spacing: 3px;
        font-family: 'Baloo', cursive;
        font-size: 32px;
    }
    .details .product-price{
        letter-spacing: 1px;
        font-family: 'Muli', sans-serif;
        font-size: 20px;
        margin: 20px 0 30px 0;
        font-weight: bold;
        color: #D3B673;
    }
    .details .product-mota{
        font-family: 'Muli', sans-serif;
        font-size: 18px;
        margin: 20px 0 20px 0;
        font-style: italic;
    }
    .details .soluong{
        font-family: 'Muli', sans-serif;
        font-size: 16px;
        font-weight: bold;
    }
    /* .details .btnAdd{
        line-height: 40px;
    } */
    .details a.btnAdd, .details button.btnAdd{
        /* width: 150px; */
        line-height: 10px;
        padding: 10px;
        border: 1px solid #D3B673;
        color: whitesmoke;
        background: rgb(204, 171, 95);
        text-decoration: none;
        font-family: 'Muli', sans-serif;
        font-size: 16px;
        font-weight: bold;
    }
    .details a.btnAdd:hover,  .details button.btnAdd:hover{
        background: black;
        color: rgb(224, 186, 97);
        font-family: 'Muli', sans-serif;
        font-size: 16px;
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



<!-- main -->
    <div class="container mt-5">
        
        <div class="khungchitiet">
            <div class="container-fluid">
                <form name="formchitietsanpham" id="formchitietsanpham" method="post" action="xulygiohang.php">
                    <input type="hidden" name="sp_ma" id="sp_ma" value="<?= $sanphamRow['sp_ma']?>" >
                    <input type="hidden" name="sp_ten" id="sp_ten" value="<?= $sanphamRow ['sp_ten']?>" >
                    <input type="hidden" name="sp_gia" id="sp_gia" value="<?= $sanphamRow ['sp_gia']?>" >
                    
                
                    <div class="wrapper row">
                        <div class="preview col-md-6 mt-3">
                            <?php if ( $sanphamRow['hsp_tentaptin'] ): ?>
                                    <a href="#"><img class="bd-placeholder-img card-img-top" src="/nlcstocotoco/public/uploads/<?= $sanphamRow['hsp_tentaptin']; ?>"  width="150" height="410" /></a>
                            <?php else: ?>
                                    <a href="#"><img class="bd-placeholder-img card-img-top" src="/nlcstocotoco/public/img/no_image.jpg" width="100%" height="410" /> </a>
                            <?php endif ?>
                        </div>

                        <div class="details col-md-6 pt-5">
                            <h3 class="product-title"><?php echo $sanphamRow['sp_ten'] ?></h3>
                            <p class="product-price"><?php echo $sanphamRow['sp_gia_formated'] ?></p>
                            <p class="product-mota"><?php echo $sanphamRow['sp_mota'] ?></p>
                            <div class="form-group">
                                <p class="soluong">Số lượng:</p>
                                
                                <input type="number" id="soluong" name="soluong" min="1">
                                <br><br>
                                <!-- <a href="xulygiohang.php?sp_ma=<?= $sanphamRow['sp_ma'] ?>&soluong=100" class="btnAdd" id="btnAdd"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 23px;"></i>&nbsp; Thêm vào giỏ hàng</a> -->

                                <button id="addCart" name="addCart" class="btnAdd"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 23px;"></i>&nbsp; Thêm vào giỏ hàng</button>
                            </div>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--End main -->
    
</body>
</html>