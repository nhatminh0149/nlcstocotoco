<?php
    require_once __DIR__ . '/../dbconnect.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'danhsachsanpham_all';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang sản phẩm</title>
    <link rel="stylesheet" href="./../public/vendor/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="./../public/vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/nlcstocotoco/frontend/css/style_sanpham.css" >
</head>
<body>
<!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg" style="margin-top: -20px;">
            <a class="navbar-brand" href="#" style="margin-left: 45px;">
                <img src="/nlcstocotoco/public/img/thuonghieu/logo.jpg" width="200" height="50"  alt="thuonghieu">
            </a>
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
                        <a class="nav-link" href="#"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"  style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 25px;"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!-- End Header -->
    <div id="content-wrapper">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mt-5 mb-5">
                <div class="menu-heading">MENU</div>
                <div class="menu-items">
                    <ul>
                        <li><a href="?danhsachsanpham_all">TẤT CẢ CÁC MÓN</a></li>
                        <li><a href="">TRÀ SỮA</a></li>
                        <li><a href="">CHÈ</a></li>
                        <li><a href="">FRESH FRUIT TEA</a></li>
                        <li><a href="">MACCHIATO</a></li>
                        <li><a href="">SPECIAL DRINK</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-9 col-sm-6 col-12 mt-5 mb-5" style="min-height: 500px; background: grey;">
                <?php
                    //tạo biến page, nếu tồn tại biến page thì hiện page, nếu chưa có thì xuất hiện trang danh sách sản phẩm
                    $page = isset($_GET['page']) ? $_GET['page'] : 'danhsachsanpham_all';

                    //page loaisanpham
                    if($page == 'danhsachsanpham_all'){
                        include('danhsachsanpham/all.php');
                    }
                ?>
            </div>
        </div>
    </div>


</body>
</html>