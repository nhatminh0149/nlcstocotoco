<?php
require_once __DIR__ . '/../dbconnect.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'loaisanpham_danhsach';
?>
<?php
	if($_SESSION['ad_tk'] == "")
  echo '<script>
          alert("Để vào được trang Admin, bạn vui lòng đăng nhập Tài khoản và Mật khẩu của Admin nhé!");
          window.location= "admindangnhap.php" ;
        </script>'; 
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
    <link rel="stylesheet" type="text/css" href="/nlcstocotoco/backend/css/style.css" >
  
</head>
<body>

<!--Header-->
  <nav class="navbar navbar-light justify-content-between" style="color: rgb(252, 222, 152); background: rgba(16,29,44,.70); text-decoration: none;">
  <div class="container">
        <div class="left-panel">
            <img src="/nlcstocotoco/public/img/thuonghieu/logo.jpg" width="200" height="50"  alt="thuonghieu">
        </div>
        <div class="right-panel">
          <a>  Xin chào Admin </a>&nbsp;&nbsp;&nbsp;
          <i class="fa fa-heart" aria-hidden="true"></i> <a href="" style="color: rgb(252, 222, 152); text-decoration: none;">Trang chủ</a>&nbsp;&nbsp;&nbsp;
          <i class="fa fa-sign-out" aria-hidden="true"></i> <a href="dangxuat.php"  style="color: rgb(252, 222, 152); text-decoration: none;">Đăng xuất</a>
        </div>
      </div>
  </nav>
<!-- End Header -->

<!-- Main-->

  <div id="content-wrapper" style="background: whitesmoke;">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12 mt-5 mb-5">
            <div class="menu-heading"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Danh mục quản lý</div>
            <div class="menu-items">
              <ul>
                <li><a href="?page=loaisanpham_danhsach"><i class="fa fa-align-right" aria-hidden="true"></i>&nbsp; Loại sản phẩm</a></li>
                <li><a href="?page=sanpham_danhsach"><i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp; Sản phẩm</a></li>
                <li><a href="?page=hinhsanpham_danhsach"><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp; Hình sản phẩm</a></li>
                <li><a href="?page=khachhang_danhsach"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Khách hàng</a></li>
                <li><a href="?page=dondathang_danhsach"><i class="fa fa-wpforms" aria-hidden="true"></i>&nbsp; Đơn đặt hàng</a></li>
              </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-6 col-12 mt-5 mb-5" style="min-height: 500px;">
          <!-- <div class="main-content"> -->
            <?php
              //tạo biến page, nếu tồn tại biến page thì hiện page, nếu chưa có thì xuất hiện trang danh sách sản phẩm
              $page = isset($_GET['page']) ? $_GET['page'] : 'loaisanpham_danhsach';

              //page loaisanpham
              if($page == 'loaisanpham_danhsach'){
                include('loaisanpham/danhsach.php');
              }
              else if($page =='loaisanpham_them'){
                include('loaisanpham/them.php');
              }
              else if($page =='loaisanpham_sua'){
                include('loaisanpham/sua.php');
              }
              else if($page =='loaisanpham_xoa'){
                include('loaisanpham/xoa.php');
              }

              //page sanpham
              else if($page =='sanpham_danhsach'){
                include('sanpham/danhsach.php');
              }
              else if($page =='sanpham_them'){
                include('sanpham/them.php');
              }
              else if($page =='sanpham_sua'){
                include('sanpham/sua.php');
              }
              else if($page =='sanpham_xoa'){
                include('sanpham/xoa.php');
              }

              //page khachhang
              else if($page =='khachhang_danhsach'){
                include('khachhang/danhsach.php');
              }
              else if($page =='khachhang_them'){
                include('khachhang/them.php');
              }
              else if($page =='khachhang_xoa'){
                include('khachhang/xoa.php');
              }

              //page hinhsanpham
              else if($page =='hinhsanpham_danhsach'){
                include('hinhsanpham/danhsach.php');
              }
              else if($page =='hinhsanpham_them'){
                include('hinhsanpham/them.php');
              }
              else if($page =='hinhsanpham_sua'){
                include('hinhsanpham/sua.php');
              }
              else if($page =='hinhsanpham_xoa'){
                include('hinhsanpham/xoa.php');
              }

              //page dondathang
              else if($page =='dondathang_danhsach'){
                include('dondathang/danhsach.php');
              }
              else if($page =='dondathang_xuly'){
                include('dondathang/xuly.php');
              }
            ?>
          <!-- </div>  -->
        </div>
      </div>
    </div>
  </div>
<!-- End Main -->

  <div class="clear-both"></div>

<!-- Footer -->
<footer class="page-footer font-small mdb-color" style="background:  rgba(16,29,44,.90); color: #d3b673; padding: 10px 0 0 0;">
    <!-- Footer Links -->
    <div class="container text-center text-md-left">
 
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
    <script src="./../public/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    
    <!-- Bat loi cac thuoc tinh -->
      <!-- Thêm : dùng jqueryvalidation để bắt lỗi -->
      <?php if($page == 'loaisanpham_them') : ?>
          <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
          <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
          <script src="./../public/js/loaisanpham/loaisanpham-them-validate.js"></script>

      <?php elseif($page == 'sanpham_them') : ?>
          <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
          <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
          <script src="./../public/js/sanpham/sanpham-them-validate.js"></script>

      <?php elseif($page == 'khachhang_them') : ?>
          <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
          <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
          <script src="./../public/js/khachhang/khachhang-them-validate.js"></script>

      <!-- Sửa : dùng jqueryvalidation để bắt lỗi -->
      <?php elseif($page == 'loaisanpham_sua') : ?>
          <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
          <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
          <script src="./../public/js/loaisanpham/loaisanpham-sua-validate.js"></script>

      <?php elseif($page == 'sanpham_sua') : ?>
          <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
          <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
          <script src="./../public/js/sanpham/sanpham-sua-validate.js"></script>
      
       <!-- Xóa : dùng sweetalert2 để bắt lỗi -->
      <?php elseif($page == 'loaisanpham_danhsach') : ?>
          <script src="./../public/js/loaisanpham/loaisanpham.js"></script>

      <?php elseif($page == 'sanpham_danhsach') : ?>
          <script src="./../public/js/sanpham/sanpham.js"></script>

      <?php elseif($page == 'khachhang_danhsach') : ?>
          <script src="./../public/js/khachhang/khachhang.js"></script>

      <?php elseif($page == 'hinhsanpham_danhsach') : ?>
          <script src="./../public/js/hinhsanpham/hinhsanpham.js"></script>

      <?php endif ?>
</body>
</html>