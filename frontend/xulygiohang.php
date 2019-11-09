<?php
    require_once __DIR__ . '/../dbconnect.php';
    // if(!isset($_SESSION['kh_taikhoan'])){
    //     echo '<script>
    //       alert("Bạn phải Đăng nhập trước khi vào Giỏ hàng nhé!!!");
    //       window.location= "khachhangdangnhap.php" ;
    //     </script>';
    // }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xử lý giỏ hàng</title>
</head>
<body>
    <?php
       
    //    B1: Lấy id của sp cần thêm vào giỏ hàng
        $sp_ma = isset($_POST['sp_ma']) ? $_POST['sp_ma'] : '';
        $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '1';

        $sql= "SELECT sp.sp_ten, sp.sp_ma, sp.sp_gia, hsp.hsp_tentaptin
        FROM sanpham sp 
        LEFT JOIN hinhsanpham hsp ON sp.sp_ma = hsp.sp_ma
        WHERE sp.sp_ma = $sp_ma;";
        $result=mysqli_query($conn,$sql);
        $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // echo "<pre />";
        // print_r($product);
        // die;

        // B2: Ktra đã tồn tại của SESSION['cart'] (Lưu ý: SESSION['cart'] là do mình đặt)
        //Nếu chưa có thì khởi tạo và gán gtri dau tien cho nó 
        //Nếu tồn tại rồi thì ktra xem sp đó có trong giỏ hàng hay chưa, nếu có rồi thì tăng nó lên 1, nếu chưa thì thêm nó vào
        if(isset($_SESSION['cart'])){
            //var_dump("Da ton tai gio hang");
            if(isset($_SESSION['cart'][$sp_ma])){
                $_SESSION['cart'][$sp_ma]['qty'] += $soluong;
            }
            else{
                $_SESSION['cart'][$sp_ma]['qty'] = $soluong;
            }
           
            $_SESSION['cart'][$sp_ma]['hsp_tentaptin'] = $product['hsp_tentaptin'];
            $_SESSION['cart'][$sp_ma]['sp_ten'] = $product['sp_ten'];
            $_SESSION['cart'][$sp_ma]['sp_gia'] = $product['sp_gia'];
            $_SESSION['success'] = 'Tồn tại giỏ hàng! Cập nhật thành công';
            header("location: sanpham.php");
            exit();
        }
        else{
            //var_dump("Chua ton tai");
            $_SESSION['cart'][$sp_ma]['qty'] = 1;
            $_SESSION['cart'][$sp_ma]['hsp_tentaptin'] = $product['hsp_tentaptin'];
            $_SESSION['cart'][$sp_ma]['sp_ten'] = $product['sp_ten'];
            $_SESSION['cart'][$sp_ma]['sp_gia'] = $product['sp_gia'];
            $_SESSION['success'] = 'Tạo mới giỏ hàng thành công';
            header("location: sanpham.php");
            exit();
        }
    ?> 
</body>
</html>