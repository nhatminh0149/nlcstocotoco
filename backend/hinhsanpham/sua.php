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
        $hsp_ma=$_GET['hsp_ma'];
        //echo 'Đang sửa khóa chính là: ' . $lsp_ma;

        require_once __DIR__ .'/../../dbconnect.php';

        $sqlSelect=<<<EOT
    SELECT hsp.hsp_ma, hsp.hsp_tentaptin, sp.sp_ten, sp.sp_gia
    FROM hinhsanpham hsp
    JOIN  sanpham sp  ON sp.sp_ma=hsp.sp_ma;
EOT;
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $hinhsanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($loaisanphamRow);
    ?>

    <form id="suahsp" name="suahsp" method="post" action="">
        Mã hình sản phẩm:   <input type="text" id="hsp_ma" name="hsp_ma" readonly value="<?= $hinhsanphamRow['hsp_ma']?>" class="form-control"/><br><br>
        Tên sản phẩm:       <input type="text" id="sp_ten" name="sp_ten" readonly value="<?= $hinhsanphamRow['sp_ten'] ?>" class="form-control"/><br><br>
        Giá sản phẩm:     <input type="text" id="sp_gia" name="sp_gia" readonly value="<?= $hinhsanphamRow['sp_gia'] ?>"class="form-control" /><br><br>
        Hình sản phẩm       <input type="file" id="hsp_tentaptin" name="hsp_tentaptin" value="<?= $hinhsanphamRow['hsp_tentaptin'] ?>"class="form-control" /><br><br>                     
                            <input type="submit" name="sua" id="sua" value="Cập nhật hình sản phẩm" class="btn btn-outline-secondary"/>
    </form>

    <?php
        //Khi bấm nút lưu
        if(isset($_POST['sua'])) {
            $hsp_ma=$_POST['hsp_ma'];
            $upload_dir="./../public/uploads/";
            $hsp_tentaptin = $_POST['hsp_tentaptin'];

            if($_FILES['hsp_tentaptin']['error']>0){
                echo "File bị lỗi"; die;
            }
            else{
                $hsp_tentaptin=$_FILES['hsp_tentaptin']['name'];
                move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'],  $upload_dir.$hsp_tentaptin);
                echo "Cập nhật thành công thành công";
            }

            $sqlUpdate = "UPDATE hinhsanpham SET hsp_tentaptin= '$hsp_tentaptin' WHERE hsp_ma = $hsp_ma; ";
            mysqli_query($conn, $sqlUpdate);
            echo 'Lưu thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:/nlcstocotoco/backend/index.php?page=hinhsanpham_danhsach');
        }
    ?>
</body>
</html>