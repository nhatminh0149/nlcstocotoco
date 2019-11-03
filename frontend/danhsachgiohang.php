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
        .InputButton{
            line-height: 40px;
        }
        a.InputButton{
            width: 150px;
            padding: 10px;
            border: 1px solid #D3B673;
            color: whitesmoke;
            background: rgb(204, 171, 95);
            text-decoration: none;
            font-family: 'Muli', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }
        a.InputButton:hover{
            background: black;
            color: rgb(224, 186, 97);
            font-family: 'Muli', sans-serif;
            font-size: 16px;
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
                        <a class="nav-link" href="/nlcstocotoco/frontend/khachhangdangky.php"><i class="fa fa-user" aria-hidden="true"  style="font-size: 25px;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/nlcstocotoco/frontend/khachhangdangxuat.php"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 25px;"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!-- End Header --> 

    <h4 style="color: black; margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px; margin-top: 50px;">DANH SÁCH GIỎ HÀNG CỦA BẠN</h4>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <div class="row">
                <div class="col-sm-4"><label>Tên sản phẩm</label></div>
                <div class="col-sm-2"><label>Giá</label></div>
                <div class="col-sm-2"><label>Số lượng</label></div>
                <div class="col-sm-2"><label>Thành tiền</label></div>
                <div class="col-sm-2"><label>Chức năng</label></div>
            </div>

            <?php 
                if(isset($_SESSION['cart'])){
                    $tong = 0;
                    foreach($_SESSION['cart'] as $key => $val){
            ?>              
                        <div class="row">
                            <div class="col-md-4"><?php echo $val['sp_ten'] ?></div>
                            <div class="col-md-2"><?php echo number_format($val['sp_gia'],2,",",".") ?></div>   
                            <div class="col-md-2"><input type='number' name='SP<?php echo $key ?>' value='<?php echo $val['qty'] ?>' style='text-align: center; width: 50px;' min="1"; /></div>   
                            <div class="col-md-2"><?php echo number_format($val['sp_gia'] * $val['qty'],2,",",".")?></div>   
                            <div class="col-md-2"><a onclick='return confirmDelete()' href="/nlcstocotoco/frontend/danhsachgiohang.php?sp_ma=<?php echo $key ?>&action=xoa"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div> 
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
                        <!-- <input type="submit" value="Đồng ý và thanh toán" name="btnDongY" id="btnXoa" class="InputButton"/> -->
                        <a href="#" class="InputButton" id="btnDongY" name="btnDongY"><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp; Đồng ý và thanh toán</a>
                    </div>
                </div>
        </form>
    </div> 
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

    if(isset($_POST['btnDongY'])){
        
    }
?>