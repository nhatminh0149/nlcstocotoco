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
<h3 style="background: rgba(16,29,44,.70); color: rgb(252, 222, 152); margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">Danh sách Sản phẩm</h3>
<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Mô tả sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Chức năng</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $row['sp_ma'] ?></td>
            <td><?= $row['sp_ten'] ?></td>
            <td><?= $row['sp_gia'] ?></td>
            <td><?= $row['sp_mota'] ?></td>
            <td><?= $row['lsp_ten'] ?></td>
            <td><a href="/nlcstocotoco/backend/index.php?page=sanpham_sua&sp_ma=<?php echo $row['sp_ma']; ?>" class="btn btn-outline-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a>
                <button class="btn btn-outline-secondary btn-delete" data-sp-ma="<?= $row['sp_ma'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/nlcstocotoco/backend/index.php?page=sanpham_them" class="btn btn-outline-secondary"> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Thêm Sản Phẩm </a> 