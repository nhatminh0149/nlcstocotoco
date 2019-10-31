<?php
    require_once __DIR__ .'/../../dbconnect.php';

    $sql= <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_mota, lsp.lsp_ten
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma=lsp.lsp_ma;
EOT;
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_mota' => $row['sp_mota'],
            'lsp_ten' => $row['lsp_ten'],
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
    <title>Document</title>
</head>
<body>
    <h1><a href="#">TẤT CẢ SẢN PHẨM</a></h1>
    <div class="row">
        <?php
            $sql= <<<EOT
            SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_mota, lsp.lsp_ten
            FROM sanpham sp
            JOIN loaisanpham lsp ON sp.lsp_ma=lsp.lsp_ma;
EOT;
            $result=mysqli_query($conn,$sql);
        
            $data=[];
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
            }
        ?>
        
        <div class="col-md-3 col-sm-6 col-12">
            <div class="thumbnail img-center">
                <img src="" alt="">
            </div>
        </div>
    </div>
</body>
</html>