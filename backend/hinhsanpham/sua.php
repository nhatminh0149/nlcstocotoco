<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cập nhật Hình Sản Phẩm</h1>

    <?php
//         $hsp_ma=$_GET['hsp_ma'];
//         //echo 'Đang sửa khóa chính là: ' . $hsp_ma;

//         require_once __DIR__ .'/../../dbconnect.php';

//         $sqlSelect=<<<EOT
//     SELECT hsp.hsp_ma, hsp.hsp_tentaptin, sp.sp_ten, sp.sp_gia
//     FROM hinhsanpham hsp
//     JOIN  sanpham sp  ON sp.sp_ma=hsp.sp_ma;
// EOT;
//         $resultSelect = mysqli_query($conn, $sqlSelect);

//         $hinhsanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
//         print_r($hinhsanphamRow);
//         die;
    $sqlSanPham = "select * from `sanpham`";
    $resultSanPham = mysqli_query($conn, $sqlSanPham);

    $dataSanPham = [];
    while($rowSanPham = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC))
    {
        //Sử dụng hàm sprintf() để chuẩn bị mẫu câu với các giá trị truyền vào tương ứng từng vị trí placeholder
        $sp_tomtat = sprintf("Sản phẩm %s, giá: %d", 
            $rowSanPham['sp_ten'],
            number_format($rowSanPham['sp_gia'], 2, ".", ",") . ' vnđ');

        $dataSanPham[] = array(
            'sp_ma' => $rowSanPham['sp_ma'],
            'sp_tomtat' => $sp_tomtat
        );
    }
    //print_r($sp_tomtat);
     //print_r($dataSanPham);
    //  die;
    $hsp_ma = $_GET['hsp_ma'];
    $sqlSelect = "SELECT * FROM `hinhsanpham` WHERE hsp_ma=$hsp_ma;";
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $hinhsanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
    // print_r($hinhsanphamRow);
    // die;
    ?>

    <form id="suahsp" name="suahsp" method="post" action="" enctype="multipart/form-data">
        Mã hình sản phẩm: <input type="text" id="hsp_ma" name="hsp_ma" readonly value="<?= $hinhsanphamRow['hsp_ma']?>" class="form-control"/><br><br>
        Mã sản phẩm:       <input type="text" id="sp_ma" name="sp_ma" readonly value="<?= $hinhsanphamRow['sp_ma']?>" class="form-control"/><br><br>
        Ảnh sản phẩm:     <img src="/nlcstocotoco/public/uploads/<?php echo $hinhsanphamRow['hsp_tentaptin'] ?>" style="max-width: 200px;"><br><br>
        Chọn ảnh mới:     <input type="file" name="hsp_tentaptin"><br><br>
        <button class="btn btn-outline-secondary" name="sua">Sửa hình ảnh</button>    
    </form>

    <?php
        //Khi bấm nút lưu
        // if(isset($_POST['sua'])) {
        //     $hsp_ma=$_POST['hsp_ma'];
        //     $upload_dir="./../public/uploads/";
        //     $hsp_tentaptin = $_POST['hsp_tentaptin'];

        //     if($_FILES['hsp_tentaptin']['error']>0){
        //         echo "File bị lỗi"; die;
        //     }
        //     else{
        //         $hsp_tentaptin=$_FILES['hsp_tentaptin']['name'];
        //         move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'],  $upload_dir.$hsp_tentaptin);
        //         echo "Cập nhật thành công thành công";
        //     }

        //     $sqlUpdate = "UPDATE hinhsanpham SET hsp_tentaptin= '$hsp_tentaptin' WHERE hsp_ma = $hsp_ma; ";
        //     mysqli_query($conn, $sqlUpdate);
        //     echo 'Lưu thành công!';

        //     // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        //     header('location:/nlcstocotoco/backend/index.php?page=hinhsanpham_danhsach');
        // }
        if(isset($_POST['sua'])) {
            $sp_ma = $_POST['sp_ma'];
            if (isset($_FILES['hsp_tentaptin'])){
                $upload_dir = "/nlcstocotoco/public/uploads/";
                if ($_FILES['hsp_tentaptin']['error'] > 0){
                    echo 'File Upload Bị Lỗi';die;
                }
                else{
                    $hsp_tentaptin = $_FILES['hsp_tentaptin']['name'];
                    move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir.$hsp_tentaptin);
                
                    // Xóa file cũ để tránh rác trong thư mục UPLOADS
                    $old_file = $upload_dir.$hinhsanphamRow['hsp_tentaptin'];
                    if(file_exists($old_file)) {
                        unlink($old_file);
                    }
                }
                $sql = "UPDATE `hinhsanpham` SET hsp_tentaptin='$hsp_tentaptin', sp_ma=$sp_ma WHERE hsp_ma=$hsp_ma;";
                mysqli_query($conn, $sql);
                header('location:/nlcstocotoco/backend/index.php?page=hinhsanpham_danhsach');
        }
    }
    ?>
</body>
</html>