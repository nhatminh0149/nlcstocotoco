<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
.img {
    width: 90px;
    height: 90px;
}
</style>

</head>
<body>
<?php
    require_once __DIR__ .'/../../dbconnect.php';

    $sql=<<<EOT
    SELECT hsp.hsp_ma, hsp.hsp_tentaptin, sp.sp_ten, sp.sp_gia
    FROM hinhsanpham hsp
    JOIN  sanpham sp  ON sp.sp_ma=hsp.sp_ma;
EOT;
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'hsp_ma' => $row['hsp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'hsp_tentaptin' => $row['hsp_tentaptin'],
        );
    }
    /* print_r($data);
    die;*/
?>
<h4 style="background: rgba(16,29,44,.70); color: rgb(252, 222, 152); margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">DANH SÁCH HÌNH SẢN PHẨM</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã hình</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td> <?php echo $row['hsp_ma']; ?></td>
            <td> <?php echo $row['sp_ten']; ?></td>
            <td> <?php echo $row['sp_gia']; ?></td>
            <td style="text-align: center;"><img src="/nlcstocotoco/public/uploads/<?= $row['hsp_tentaptin']; ?>" class="img" /></td>
           

            <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
            <td>
                <a href="/nlcstocotoco/backend/index.php?page=hinhsanpham_sua&hsp_ma=<?php echo $row['hsp_ma']; ?>" class="btn btn-outline-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a>
                <button class="btn btn-outline-secondary btn-delete" data-hsp-ma="<?= $row['hsp_ma'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<br>
<a href="/nlcstocotoco/backend/index.php?page=hinhsanpham_them" class="btn btn-outline-secondary"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Hình Sản Phẩm </a> 

</body>
</html>


