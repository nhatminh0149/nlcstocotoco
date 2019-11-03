<?php
    require_once __DIR__ . '/../dbconnect.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'danhsachsanpham_all';
    if(isset($_SESSION['cart'])){
        // echo "<pre />";
        // var_dump($_SESSION['cart']);
    }

    if(isset($_SESSION['success'])){
        echo '<script>
          alert("Bạn đã thêm 1 sản phẩm vào giỏ hàng. Hãy vào giỏ hàng của bạn để kiểm tra nhé!!!");
          window.location= "sanpham.php" ;
        </script>';
    }
    unset($_SESSION['success']);
    
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
                        <a class="nav-link" href="danhsachgiohang.php"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="khachhangdangky.php"><i class="fa fa-user" aria-hidden="true"  style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="khachhangdangxuat.php"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 25px;"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!-- End Header -->



<!-- Main -->
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12 mt-5 mb-5">
                    <div class="menu-heading">MENU</div>
                    <div class="menu-items">
                        <ul>
                            <li><a href="?danhsachsanpham_all">TẤT CẢ SẢN PHẨM</a></li>
                            <li><a href="">TRÀ SỮA</a></li>
                            <li><a href="">CHÈ</a></li>
                            <li><a href="">FRESH FRUIT TEA</a></li>
                            <li><a href="">MACCHIATO</a></li>
                            <li><a href="">SPECIAL DRINK</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-9 col-sm-6 col-12 mt-5 mb-5" style="min-height: 500px;">
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
    </div>
<!--End Main -->

<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4" style=" background: linear-gradient(rgba(23, 23, 24, 0.85), rgba(30, 30, 31, 0.85)),
            url(/nlcstocotoco/public/img/background/footer.jpg) center no-repeat;
            background-size: cover;
            color: #d3b673;
            font-family: 'Muli', sans-serif;" >

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

            <!-- Grid column -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="logo mx-auto mt-3 mr-3">
                    <img src="/tocotoco/public/img/thuonghieu/logo2.jpg" alt="logo2">
                </div>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-5 col-sm-6 col-12">
                <h6 class="text-uppercase mb-4 font-weight-bold">CÔNG TY CP TM & DV TACO VIỆT NAM</h6>
                <p><i class="fa fa-home mr-3"></i>Tầng 2 tòa nhà T10, Times City Vĩnh Tuy, Hà Nội.</p>
                <p> <i class="fa fa-phone mr-3"></i>1900.63.69.36</p>
                <p><i class="fa fa-envelope mr-3"></i>info@tocotocotea.com</p>
                <p>Số ĐKKD: 0106341306. Ngày cấp: 16/03/2017. <br>
                    Nơi cấp: Sở kế hoạch và Đầu tư Thành phố Hà Nội.</p>
                <div class="text-center text-md-left">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fa fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fa fa-google"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="text-center text-md-left">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <img src="/tocotoco/public/img/thuonghieu/appstore.jpg" alt="logo2"  width="150px" height="40px">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <img src="/tocotoco/public/img/thuonghieu/googleplay.jpg" alt="logo2"  width="150px" height="40px">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-sm-6 col-12">
            <h6 class="text-uppercase mb-4 font-weight-bold">VỀ CHÚNG TÔI</h6>
            <p>Giới thiệu ToCoToCo</p>
            <p>Nhượng quyền</p>
            <p>Quy định chung</p>
            <p>TT Liên hệ và ĐKKD</p>

            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-sm-6 col-12">
            <h6 class="text-uppercase mb-4 font-weight-bold">CHÍNH SÁCH</h6>
            <p>Hình thức thanh toán</p>
            <p>Đổi trả và hoàn tiền</p>
            <p>Bảo vệ TT cá nhân</p>
            <p>Bảo hành, bảo trì</p>
            </div> 
            <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <hr>

        <!-- Grid row -->
        <div class="row d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-md-left">
                    <strong>ToCoToCo - Thương hiệu trà sữa tiên phong sử dụng nguồn nông sản Việt Nam</strong>
                </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-4 ml-lg-0">

                <!-- Social buttons -->
                <div class="text-center text-md-left">
                    <p>Copyrights © 2019 by ToCoToCoTea.</p>
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

</footer>
<!-- End Footer -->

    <script src="./../public/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>