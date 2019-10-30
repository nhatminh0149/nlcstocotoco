<?php
    require_once __DIR__ .'/../../dbconnect.php';

    $sql = <<<EOT
    SELECT ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_taikhoan, kh.kh_sdt,
        sum(spddh.sp_ddh_soluong * spddh.sp_ddh_dongia) AS TongThanhTien
   FROM dondathang ddh 
   JOIN khachhang kh ON kh.kh_taikhoan=ddh.kh_taikhoan
   JOIN chitiet_sp_ddh spddh ON spddh.ddh_ma = ddh.ddh_ma
   GROUP BY ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_taikhoan, kh.kh_sdt
EOT;

    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'ddh_ma' => $row['ddh_ma'],
            'ddh_ngaylap' => date('d/m/Y H:i:s', strtotime($row['ddh_ngaylap'])),
            'ddh_noigiao' => $row['ddh_noigiao'],
            'ddh_trangthai' => $row['ddh_trangthai'],
            'kh_taikhoan' => $row['kh_taikhoan'],
            'kh_sdt' => $row['kh_sdt'],
            'TongThanhTien' => number_format($row['TongThanhTien'], 2, ".", ",") . ' vnđ',
        );
    }
    /* print_r($data);
    die;*/
?>
<h4 style="background: rgba(16,29,44,.70); color: rgb(252, 222, 152); margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">DANH SÁCH ĐƠN ĐẶT HÀNG</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Tài khoản KH</th>
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
            <td> <?php echo $row['kh_taikhoan']; ?></td>
            <td> <?php echo $row['ddh_ngaylap']; ?></td>
            <td> <?php echo $row['ddh_noigiao']; ?></td>
            <td> <?php echo $row['TongThanhTien']; ?></td>
            <td>
                <!-- ddh_trangthai:  nếu = 1: đã xử lý, 0: ngược lại -->
                <a href="" class="badge <?php echo $row['ddh_trangthai'] ? 'badge badge-info' : 'badge badge-danger' ?> "> <?php echo ($row['ddh_trangthai']) ? "Đã xử lý" : "Chưa xử lý" ?></a>
            </td>
            <td>
                <?php if ( $row['ddh_trangthai'] == 0): ?>
                    <a href="/nlcstocotoco/backend/index.php?page=dondathang_xuly&ddh_ma=<?php echo $row['ddh_ma'] ?>" class="btn btn-warning btn-sm">Duyệt</a>
                <?php endif ?>
            </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<br>

