<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ .'/../../dbconnect.php';

        //Lấy dl từ lsp
        $sql= <<<EOT
        SELECT * FROM loaisanpham;
EOT;
        $resultLsp=mysqli_query($conn,$sql);
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

    <h1>Thêm mới Sản Phẩm</h1> 
    <form id="themsp" name="themsp" method="post" action="">
        Tên sản phẩm: <input type="text" id="sp_ten" name="sp_ten" class="form-control"><br><br>
        Giá sản phẩm: <input type="text" id="sp_gia" name="sp_gia" class="form-control"><br><br>
        Mô tả sản phẩm: <input type="text" id="sp_mota" name="sp_mota" class="form-control"><br><br>
        Loại sản phẩm: 
        <select name="lsp_ma" id="lsp_ma" class="form-control">
            <?php foreach($datalsp as $lsp): ?>
                <option value="<?= $lsp['lsp_ma']?>"> <?= $lsp['lsp_ten']?>  </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" id="tsp" name="tsp" class="btn btn-outline-secondary" value="Thêm sản phẩm">
    </form>

<?php  
    if(isset($_POST['tsp'])){
        //print_r('fgfdgd'); die;
        $sp_ten=$_POST['sp_ten'];
        $sp_gia=$_POST['sp_gia'];
        $sp_mota=$_POST['sp_mota'];
        $lsp_ma=$_POST['lsp_ma'];

        $sqlInsert = "INSERT INTO sanpham(sp_ten, sp_gia, sp_mota, lsp_ma) VALUES (N'$sp_ten', $sp_gia, N'$sp_mota', $lsp_ma);";
        $resultInsert = mysqli_query($conn, $sqlInsert);
        header('location:/nlcstocotoco/backend/index.php?page=sanpham_danhsach');
    }
?>
</body>
</html>
