<?php
     require_once __DIR__ . '/../dbconnect.php'; 
    if(isset($_SESSION['cart'])){
        // echo "<pre />";
        // var_dump($_SESSION['cart']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách giỏ hàng</title>
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
        label{
            font-size: 15px;
            font-weight: bold;
        }
        input[type="submit"]{
            width: 200px;
            padding: 5px;
            border: 1px solid #D3B673;
            color: whitesmoke;
            background: rgb(204, 171, 95);
            text-decoration: none;
            font-family: 'Muli', sans-serif;
            font-size: 14px;
            font-weight: bold;
        }
        input[type="submit"]:hover{
            background: black;
            color: rgb(224, 186, 97);
            font-family: 'Muli', sans-serif;
            font-size: 14px;
        }
        h4{
            font-family: 'Muli', sans-serif;
            font-weight: bold;
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
                            <input class="form-control mr-sm-1" type="search" placeholder="Tìm kiếm" aria-label="Search" name="" id="searchKey">
                            <button type="button" class="btn btn-warning mr-sm-5" id="timkiem" name="timkiem"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/nlcstocotoco/frontend/danhsachgiohang.php"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 25px;"></i></a>
                    </li>

                    <?php
                    if(isset($_SESSION['kh_taikhoan']) && $_SESSION['kh_taikhoan'] !=""){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="khachhangdangxuat.php"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 25px;"></i></a>
                        </li>
                    <?php
                        }
                    else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="khachhangdangnhap.php"><i class="fa fa-user" aria-hidden="true"  style="font-size: 25px;"></i></a>
                        </li> 
                    <?php
                        }
                    ?> 
                    
                </ul>
            </div>
        </nav>
    </header>
<!-- End Header --> 

    <h4 style="color: black; margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px; margin-top: 50px;">DANH SÁCH GIỎ HÀNG CỦA BẠN</h4>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <div class="row">
                <div class="col-sm-2 text-center"><label>Tên sản phẩm</label></div>
                <div class="col-sm-2 text-center"><label>Hình sản phẩm</label></div>
                <div class="col-sm-2 text-center"><label>Giá</label></div>
                <div class="col-sm-2 text-center"><label>Số lượng</label></div>
                <div class="col-sm-2 text-center"><label>Thành tiền</label></div>
                <div class="col-sm-2 text-center"><label>Chức năng</label></div>             
            </div>

            <?php 
                if(isset($_SESSION['cart'])){
                    // print_r($_SESSION['cart']);
                    // die;
                    $tong = 0;
                    foreach($_SESSION['cart'] as $key => $val){
            ?>              
                        <div class="row">
                            <div class="col-md-2 text-center"><?php echo $val['sp_ten'] ?></div>
                            <div class="col-md-2 text-center">
                                <?php if ( $val['hsp_tentaptin'] ): ?>
                                        <img src="/nlcstocotoco/public/uploads/<?= $val['hsp_tentaptin'] ?>" class="img" height="40px" width="40px;" />
                                <?php else: ?>
                                        <img class="img" src="/nlcstocotoco/public/img/no_image.jpg" width="40px" height="40px" />
                                <?php endif ?>
                                   
                            </div>
                            <div class="col-md-2 text-center"><?php echo number_format($val['sp_gia'],2,",",".") ?></div>   
                            <div class="col-md-2 text-center"><input type='number' name='SP<?php echo $key ?>' readonly value='<?php echo $val['qty'] ?>' style='text-align: center; width: 50px;' min="1"; /></div>   
                            <div class="col-md-2 text-center"><?php echo number_format($val['sp_gia'] * $val['qty'],2,",",".")?></div>   
                            <div class="col-md-2 text-center"><a onclick='return confirmDelete()' href="/nlcstocotoco/frontend/danhsachgiohang.php?sp_ma=<?php echo $key ?>&action=xoa"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div> 
                        </div>
                        <?php $tong += $val['sp_gia'] * $val['qty']; 
                    }
                    echo "  <div class = 'row'>
                                <div class = 'col-md-12' style='text-align: right; padding: 30px 50px 30px 0;'>
                                    <lable style='font-weight: bold;'>Tổng tiền : </lable>
                                    <span class = 'Gia' > ".number_format($tong, 2,",",".")." VNĐ </span>
                                </div>
                            </div> ";
                }
                else{
                    echo "  <div class='row'>
                                <div class='col-md-12'>Chưa có sản phẩm nào trong giỏ hàng của bạn</div>
                            </div> ";
                }
                        ?>
                <div class='row'>
                    <div class='col-md-12' style='text-align: right; padding: 30px 50px 30px 0;'>
                        <input type="submit" value="Đồng ý và thanh toán" name="btnDongY" id="btnDongY" class="InputButton"/>
                    </div>
                </div>
        </form>
    </div>

     <script src="./../public/vendor/jquery/jquery.min.js"></script>
   
    <script src="./../public/vendor/bootstrap/js/bootstrap.min.js"></script>


    <script>
    $('#timkiem').click(function(e) {
        debugger;
        var searchVal = $('#searchKey').val(); // Trà sữa
        var href = "/nlcstocotoco/frontend/sanpham.php?page=danhsachsanpham_timkiem&searchKey=" + searchVal;
        location.href = href; // Chuyển trang bằng JS
    });

    </script> 
</body>
</html>

<script language="javascript">
        function confirmDelete(){
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không???")){
                return true;
            }
            else{
                return false;
            }
        }
</script>

<?php
    if(isset($_GET['action'])){
        if($_GET['action']=="xoa"){
            $sp_ma = $_GET['sp_ma'];
            unset($_SESSION['cart'][$sp_ma]);
            echo "<script>window.location='/nlcstocotoco/frontend/danhsachgiohang.php';</script>";
        }
    }

    if(isset($_POST['btnDongY']) && isset($_SESSION['cart'])  && ($_SESSION['cart'])!= null)
    {
        if(isset($_SESSION['kh_taikhoan'])){
            foreach($_SESSION['cart'] as $key => $row){
                $_SESSION['cart'][$key]['qty']=$_POST['SP'.$key];
            }
            echo "<script>window.location='thanhtoan.php'</script>";
        }
        else{
            echo "<script> alert('Bạn vui lòng đăng nhập trước khi thanh toán nhé!!!');
                            window.location= 'khachhangdangnhap.php' ;
                </script>";
        }
    }
?>

