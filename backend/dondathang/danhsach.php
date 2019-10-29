<?php
    require_once __DIR__ .'/../../dbconnect.php';

    $sql = <<<EOT
    SELECT 
        ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_hoten, kh.kh_sdt
        , SUM(spddh.sp_ddh_soluong * spddh.sp_ddh_dongia) AS TongThanhTien
    FROM `dondathang` ddh
    JOIN `chitiet_sp_ddh` spddh ON ddh.ddh_ma = spddh.ddh_ma
    JOIN `khachhang` kh ON ddh.kh_taikhoan = kh.kh_taikhoan
    GROUP BY ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_hoten, kh.kh_sdt
EOT;

    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'ddh_ma' => $row['ddh_ma'],
            'ddh_ngaylap' => date('d/m/Y H:i:s', strtotime($row['ddh_ngaylap'])),
            'ddh_noigiao' => $row['ddh_noigiao'],
            'ddh_trangthai' => $row['ddh_trangthai'],
            'kh_hoten' => $row['kh_hoten'],
            'kh_sdt' => $row['kh_sdt'],
            'TongThanhTien' => number_format($row['TongThanhTien'], 2, ".", ",") . ' vnđ',
        );
    }
    /* print_r($data);
    die;*/
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã Đơn đặt hàng</th>
            <th>Khách hàng</th>
            <th>Ngày lập</th>
            <th>Nơi giao</th>
            <th>Tổng thành tiền</th>
            <th>Trạng thái xử lý</th>
            <th>Hành động</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row) : ?>
        
        <tr>
            <td> <?php echo $row['ddh_ma']; ?></td>
            <td> <?php echo $row['kh_hoten']; ?></td>
            <td> <?php echo $row['ddh_ngaylap']; ?></td>
            <td> <?php echo $row['ddh_noigiao']; ?></td>
            <td> <?php echo $row['TongThanhTien']; ?></td>
            <td>
                <?php if ($row['ddh_trangthai'] == 0) {?>
                    <h5><span class="badge badge-secondary">Chưa xử lý</span></h5>
                <?php } else {?>
                    <h5><span class="badge badge-info">Đã xử lý</span></h5>
                <?php }  ?>
            </td>
            <td>
                <?php if ($row['ddh_trangthai'] == 0) {?>
                    <a href="?page=dondathang_xuly&ddh_ma=<?php echo $row['ddh_ma']; ?>" >
                        <!-- <span data-feather="edit"></span> Duyệt --><button class="btn btn-primary" name="btnCapNhat">Duyệt</button>
                    </a> 
                             
                <?php }  ?>
            </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<br>

