<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./../public/vendor/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="./../public/vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/nlcstocotoco/frontend/css/style.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    
</head>
<body>
<!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-dark">
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

        <div class="text-center" style="margin-top: 50px;">
            <h2 class="animated slideInDown">ToCoToCo Tea</h2>
            <h1 class="animated slideInLeft">TRÀ SỮA CỦA HẠNH PHÚC</h1>
            <p class="animated slideInRight">Với sứ mệnh mang tới niềm vui và hạnh phúc, TocoToco hy vọng sẽ tạo nên một nét văn hóa <br> giải trí bên cạnh ly trà sữa Ngon – sạch – tươi.</p>
            <a href="sanpham.php" class="btnToco">MUA NGAY THÔI</a>
        </div>
    </header>
<!-- End Header -->

<!-- Main -->
    <main>
        <!-- section 1 - about -->
        <section class="about">
            <div class="container">
                <div class="row align-items-lg-center">
                    <div class="col-md-6 col-12  text-center">
                        <div class="section-heading mb-3">
                            <h4>ToCoToCo Story</h4>
                            <h1>VỀ CHÚNG TÔI</h1>
                        </div>
                        <div>
                            <img class="img-fluid mb-3" src="/nlcstocotoco/public/img/thuonghieu/home_line.jpg" alt="homeline" width="50%" style="margin-left: 0px;">
                        </div>
                        <p>
                            Bên cạnh niềm tự hào về những ly trà sữa ngon – sạch – tươi, <br>
                            chúng tôi luôn tự tin mang đến khách hàng <br>
                            những trải nghiệm tốt nhất về dịch vụ và không gian.
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid" src="/nlcstocotoco/public/img/background/thubong.jpg" alt="section-1" width="300" height="300" style="margin-left: 90px;">
                    </div>
                </div>
            </div>
        </section>  
        <!-- End section 1 - about -->  
            
        <!-- section 2 - menu -->
        <section class="menu">
            <div class="container-fluid">
                <div class="row"> 
                    <h2 class="list-title">THƯƠNG HIỆU TOCOTOCO</h2>
                </div>
                <div class="row text-center text-white">
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="shop-info">
                            <img class="img-fluid" src="/nlcstocotoco/public/img/background/icon_1.jpg" alt="icon-1" width="60" height="60">
                            <h4>Nguyên liệu Việt Nam</h4>
                            <p>Thương hiệu trà sữa sử dụng 100% nông sản Việt</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="shop-info">
                            <img class="img-fluid" src="/nlcstocotoco/public/img/background/icon_2.jpg" alt="icon-1" width="60" height="50">
                            <h4>Quy mô</h4>
                            <p>Hơn 200 cửa hàng trên toàn quốc</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="shop-info">
                            <img class="img-fluid" src="/nlcstocotoco/public/img/background/icon_3.jpg" alt="icon-1" width="60" height="60">
                            <h4>1900.63.69.36</h4>
                            <p>Hotline hỗ trợ 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End section 2 - menu -->

        <!--  Section 3 -->
        <section class="product">
            <div class="container">
                <div class="row"> 
                    <h3 class="list-title">ToCoToCo Menu</h3>
                    <h1 class="list-title">SẢN PHẨM NỔI BẬT</h1>
                </div>
                <div class="linetocotoco">
                    <img class="img-fluid mb-4 mt-4" src="/nlcstocotoco/public/img/thuonghieu/home_line.jpg" alt="homeline" width="30%">
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="/nlcstocotoco/public/img/sanpham/tra_sua/ts_panda2.jpg" alt="" width="100%" heigh="80">
                                <div class="overlay">
                                
                                    <p>
                                        <a href="#">TRÀ SỮA PANDA</a>
                                    </p>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="/nlcstocotoco/public/img/sanpham/fresh_fruit_tea/fft_tradautamphaletuyet2.jpg" alt="fft_tradautamphaletuyet2"  width="100%" heigh="80">
                                <div class="overlay">
                                
                                    <p>
                                        <a href="#">TRÀ DÂU TẰM PHA LÊ TUYẾT</a>
                                    </p>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="/nlcstocotoco/public/img/sanpham/special_drink/db_suatuoitranchauduongho2.jpg" alt="db_suatuoitranchauduongho2" width="100%" heigh="80">
                                <div class="overlay">
                                    
                                    <p>
                                        <a href="#">SỮA TƯƠI TRÂN CHÂU ĐƯỜNG HỔ</a>
                                    </p>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="/nlcstocotoco/public/img/sanpham/macchiato/m_dautamkemphomai2.jpg" alt="m_dautamkemphomai2" width="100%" heigh="80">
                                <div class="overlay">
                                    
                                    <p>
                                        <a href="#">DÂU TẰM KEM PHÔ MAI</a>
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: -10px;"> 
                    <div class="text-center">
                        <a href="sanpham.php" class="btnToco">XEM TẤT CẢ</a>
                    </div>
                </div>
            </div>
        </section> 
        <!-- End Section 3 - Product -->
    </main>
    <!-- End Main -->

    <!-- Footer -->
    <footer class="page-footer font-small mdb-color pt-4">

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



    <script src="./../public/vendor/jquery/jquery.min.js"></script>
    <script src="./../public/vendor/popper/popper.min.js"></script>
    <script src="./../public/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>