<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cập nhật Sản phẩm</h1>
    <?php ob_start(); ?>
    <?php
        require_once __DIR__ .'/../../dbconnect.php';

        //Lấy dữ liệu cần chỉnh sửa
        $sp_ma=$_GET['sp_ma'];

        $sqlSelect="SELECT * FROM sanpham WHERE sp_ma= $sp_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $sanphamRow = [];
        while ($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC)) {
            $sanphamRow = array(
                'sp_ma' => $row['sp_ma'],
                'sp_ten' => $row['sp_ten'],
                'sp_gia' => $row['sp_gia'],
                'sp_mota' => $row['sp_mota'],
                'lsp_ma' => $row['lsp_ma'],
            );
        }


        //Lấy dl từ lsp
        $sqlLsp= <<<EOT
        SELECT * FROM loaisanpham;
EOT;
        $resultLsp=mysqli_query($conn,$sqlLsp);
        $datalsp=[];
        while($row=mysqli_fetch_array($resultLsp, MYSQLI_ASSOC)){
            $datalsp[]=array(
                'lsp_ma' => $row['lsp_ma'],
                'lsp_ten' => $row['lsp_ten'],
            );
        }
        /*print_r($data);
        die;*/
    ?>

    <form id="suasp" name="suasp" method="post" action="">
        Sản phẩm:   <input type="text" id="sp_ma" name="sp_ma" readonly value="<?= $sanphamRow['sp_ma']?>" class="form-control"/><br><br>
        Tên sản phẩm: <input type="text" id="sp_ten" name="sp_ten" value="<?= $sanphamRow ['sp_ten']?>" class="form-control" ><br><br>
        Giá sản phẩm: <input type="text" id="sp_gia" name="sp_gia" value="<?= $sanphamRow ['sp_gia']?>" class="form-control" ><br><br>
        Mô tả sản phẩm: <input type="text" id="sp_mota" name="sp_mota" value="<?= $sanphamRow ['sp_mota']?>" class="form-control" ><br><br>
        Loại sản phẩm: 
        <select name="lsp_ma" id="lsp_ma" class="form-control">
            <?php foreach($datalsp as $lsp) : ?>
                <?php if($lsp['lsp_ma'] == $sanphamRow['lsp_ma']) { ?>
                    <option value="<?= $lsp['lsp_ma'] ?>" selected> <?= $lsp['lsp_ten'] ?></option>
                <?php } else { ?>
                    <option value="<?= $lsp['lsp_ma'] ?>"><?= $lsp['lsp_ten'] ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" id="ssp" name="ssp" value="Sửa sản phẩm" class="btn btn-outline-secondary"> 
    </form>

<?php
    if(isset($_POST['ssp'])){
        //print_r('fgfdgd'); die;
        $sp_ten=$_POST['sp_ten'];
        $sp_gia=$_POST['sp_gia'];
        $sp_mota=$_POST['sp_mota'];
        $lsp_ma=$_POST['lsp_ma'];

        $sqlUpdate =<<<EOT
        UPDATE sanpham
        SET
            sp_ten= N'$sp_ten',
            sp_gia= $sp_gia,
            sp_mota= N'$sp_mota',
            lsp_ma= $lsp_ma
        WHERE sp_ma=$sp_ma;
EOT;

    $resultUpdate = mysqli_query($conn, $sqlUpdate);
    header('location:/nlcstocotoco/backend/index.php?page=sanpham_danhsach');
    ob_enf_fluch();
    }
?>
</body>
</html>