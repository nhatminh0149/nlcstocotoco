<?php
    // Truy vấn database để lấy danh sách
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    require_once __DIR__ .'/../../dbconnect.php';

    // 2. Chuẩn bị câu truy vấn $sql
    $sql= <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_mota, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_mota, lsp.lsp_ten
EOT;

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $sql);

    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $dataDanhSachSanPham = [];
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $dataDanhSachSanPham[] = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
            'sp_mota' => $row['sp_mota'],
            'lsp_ten' => $row['lsp_ten'],
            'hsp_tentaptin' => $row['hsp_tentaptin'],
        );
    }
    //  print_r($data);
    // die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli");
        .topic{
            font-family: 'Baloo', cursive;
            margin: 10px 0 0 12px;
        }
        .topic a{
            color: black;
        }
        .topic a:hover{
            text-decoration: none;
        }
        .card-body .card-title{
            height: 40px;
            text-align: center;
            font-family: 'Muli', sans-serif;
            color: black;
        }
        .card-body a:hover{
            text-decoration: none;
        }
        .card-price{
            text-align: center;
            color:#D3B673;
            font-family: 'Muli', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .card-body .text-center .btnToco{
            line-height: 40px;
        }
        .card-body a.btnToco{
            width: 150px;
            padding: 10px;
            border: 1px solid #D3B673;
            color: whitesmoke;
            background: rgb(204, 171, 95);
            text-decoration: none;
            font-family: 'Muli', sans-serif;
            font-size: 12px;
            font-weight: bold;
        }
        .card-body .text-center a.btnToco:hover{
            background: black;
            color: rgb(224, 186, 97);
            font-family: 'Muli', sans-serif;
            font-size: 12px;
            font-weight: bold;
        }
    
    </style>
</head>
<body>
    <h3 class="topic"><a href="#">TẤT CẢ SẢN PHẨM</a></h3>
    <div class="py-3">
        <div class="container">
            <div class="row">
                <?php foreach($dataDanhSachSanPham as $row) : ?>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <?php if ( $row['hsp_tentaptin'] ): ?>
                                    <a href="chitiet.php?sp_ma=<?php echo $row['sp_ma'] ?>"><img class="bd-placeholder-img card-img-top" src="/nlcstocotoco/public/uploads/<?= $row['hsp_tentaptin']; ?>"  width="100%" height="200" /></a>
                            <?php else: ?>
                                    <a href="chitiet.php?sp_ma=<?php echo $row['sp_ma'] ?>"><img class="bd-placeholder-img card-img-top" src="/nlcstocotoco/public/img/no_image.jpg" width="100%" height="200" /> </a>
                            <?php endif ?>

                            <div class="card-body">
                                <a href="#"><h5 class="card-title"><?php echo $row['sp_ten'] ?></h5></a>
                                <p class="card-price"><?php echo $row['sp_gia'] ?></p>
                                <div class="text-center">
                                    <a href="chitiet.php?sp_ma=<?php echo $row['sp_ma'] ?>" class="btnToco">XEM CHI TIẾT</a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
</body>
</html>