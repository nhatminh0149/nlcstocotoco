<?php
    require_once __DIR__ .'/../../dbconnect.php';

    $sql= "select * from `loaisanpham`;";
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
            'lsp_mota' => $row['lsp_mota'],
        );
    }
    /* print_r($data);
    die;*/
?>
<h4 style="background: rgba(16,29,44,.70); color: rgb(252, 222, 152); margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">DANH SÁCH LOẠI SẢN PHẨM</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td> <?php echo $row['lsp_ma']; ?></td>
            <td> <?php echo $row['lsp_ten']; ?></td>
            <td> <?php echo $row['lsp_mota']; ?></td>

            <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
            <td>
                <a href="/nlcstocotoco/backend/index.php?page=loaisanpham_sua&lsp_ma=<?php echo $row['lsp_ma']; ?>" class="btn btn-outline-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a>
                <button class="btn btn-outline-secondary btn-delete" data-lsp-ma="<?= $row['lsp_ma'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                </button>
                
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<a href="/nlcstocotoco/backend/index.php?page=loaisanpham_them" class="btn btn-outline-secondary"> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Thêm Loại Sản Phẩm </a> 
