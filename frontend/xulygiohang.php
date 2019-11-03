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
        // if(isset($_GET['sp_ma'])){
        //     $sp_ma = $_GET['sp_ma']
            

        //     $sql= "select * from `sanpham` where sp_ma = $sp_ma;";
        //     $result=mysqli_query($conn,$sql);
        //     $row=mysqli_fetch_array($result, MYSQLI_ASSOC);

        //     if(!empty($_SESSION['cart'])){
        //         if(array_key_exists($sp_ma, $cart)){
        //             $cart[$sp_ma] = array(
        //                 "sl"=>(int)$cart[$sp_ma]["sl"]+1,
        //                 "sp_gia"=>$row[2],
        //                 "sp_ten"=>$row[1]
        //             );
        //         }else{
        //             $cart[$sp_ma] = array(
        //                 "sl"=>1,
        //                 "sp_gia"=>$row[2],
        //                 "sp_ten"=>$row[1]
        //             );
        //         }
        //     }else{
        //         //lan dau tien mua hang
        //         $cart[$sp_ma]= array(
        //             "sl"=>1,
        //             "sp_gia" =>$row[2],
        //             "sp_ten"=>$row[1]
        //         );
        //     }

        //     $_SESSION['cart'] = $cart;

        // }else{

        // }
        // echo "<pre>";
        // print_r($_SESSION["cart"]);
        // die;

        $sp_ma = isset($_GET['sp_ma']) ? $_GET['sp_ma'] : '';

        $sql= "select * from `sanpham` where sp_ma = $sp_ma;";
        $result=mysqli_query($conn,$sql);
        $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // echo "<pre />";
        // print_r($product);
        // die;
        if(isset($_SESSION['cart'])){
            //var_dump("Da ton tai gio hang");
            if(isset($_SESSION['cart'][$sp_ma])){
                $_SESSION['cart'][$sp_ma]['qty'] += 1;
            }
            else{
                $_SESSION['cart'][$sp_ma]['qty'] = 1;
            }
            $_SESSION['cart'][$sp_ma]['lsp_ten'] = $product['lsp_ten'];
            $_SESSION['cart'][$sp_ma]['sp_ten'] = $product['sp_ten'];
            $_SESSION['cart'][$sp_ma]['sp_gia'] = $product['sp_gia'];
            $_SESSION['success'] = 'Tồn tại giỏ hàng! Cập nhật thành công';
            header("location: sanpham.php");
            exit();
        }
        else{
            //var_dump("Chua ton tai");
            $_SESSION['cart'][$sp_ma]['qty'] = 1;
            $_SESSION['cart'][$sp_ma]['lsp_ten'] = $product['lsp_ten'];
            $_SESSION['cart'][$sp_ma]['sp_ten'] = $product['sp_ten'];
            $_SESSION['cart'][$sp_ma]['sp_gia'] = $product['sp_gia'];
            $_SESSION['success'] = 'Tạo mới giỏ hàng thành công';
            header("location: sanpham.php");
            exit();
        }
    ?> 
</body>
</html>