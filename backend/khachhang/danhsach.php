<?php
    require_once __DIR__ .'/../../dbconnect.php';

    $sql= <<<EOT
    SELECT *
    FROM khachhang;
EOT;
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'kh_taikhoan' => $row['kh_taikhoan'],
            'kh_mk' => $row['kh_mk'],
            'kh_hoten' => $row['kh_hoten'],
            'kh_sdt' => $row['kh_sdt'],
            'kh_diachi' => $row['kh_diachi'],
            'kh_email' => $row['kh_email'],
        );
    }
    //  print_r($data);
    // die;
?>
<h4 style="background: rgba(16,29,44,.70); color: rgb(252, 222, 152); margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">DANH SÁCH KHÁCH HÀNG</h4>
<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th>Tài khoản của KH</th>
            <th>Họ tên</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Chức năng</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $row['kh_taikhoan'] ?></td>
            <td><?= $row['kh_hoten'] ?></td>
            <td><?= $row['kh_sdt'] ?></td>
            <td><?= $row['kh_diachi'] ?></td>
            <td><?= $row['kh_email'] ?></td>
            <td>
                <button class="btn btn-outline-secondary btn-delete" data-kh-taikhoan="<?= $row['kh_taikhoan'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/nlcstocotoco/backend/index.php?page=khachhang_them" class="btn btn-outline-secondary"> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Thêm Khách Hàng </a> 