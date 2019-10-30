<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
require_once __DIR__ .'/../../dbconnect.php';

/* --- 
   --- 2. Truy vấn dữ liệu Sản phẩm theo khóa chính
   --- 
*/
// Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$ddh_ma = $_GET['ddh_ma'];
$sqlSelect = <<<EOT
SELECT 
    ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_taikhoan, kh.kh_sdt
    , SUM(spddh.sp_ddh_soluong * spddh.sp_ddh_dongia) AS TongThanhTien
    FROM `dondathang` ddh
    JOIN `chitiet_sp_ddh` spddh ON ddh.ddh_ma = spddh.ddh_ma
    JOIN `khachhang` kh ON ddh.kh_taikhoan = kh.kh_taikhoan
    WHERE ddh.ddh_ma= $ddh_ma
    GROUP BY ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_taikhoan, kh.kh_sdt
EOT;

// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
$resultSelect = mysqli_query($conn, $sqlSelect);
$dondathangRow;
while($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC))
{
    $dondathangRow = array(
        'ddh_ma' => $row['ddh_ma'],
        'ddh_ngaylap' => date('d/m/Y H:i:s', strtotime($row['ddh_ngaylap'])),
        'ddh_noigiao' => $row['ddh_noigiao'],
        'ddh_trangthai' => $row['ddh_trangthai'],
        'kh_taikhoan' => $row['kh_taikhoan'],
        'kh_sdt' => $row['kh_sdt'],
        'TongThanhTien' => number_format($row['TongThanhTien'], 2, ".", ",") . ' vnđ',
    );
}
?>
<h2>Xem lại thông tin hóa đơn</h2>
<form id="frmdondathang" name="frmdondathang" method="post" action="" >
        Mã hóa đơn:                 <input type="text" id="ddh_ma" name="ddh_ma" readonly value="<?= $dondathangRow['ddh_ma']?>" class="form-control"/><br><br>
        Tài khoản của khách hàng:  <input type="text" id="kh_taikhoan" name="kh_taikhoan" readonly value="<?= $dondathangRow['kh_taikhoan']?>" class="form-control"/><br><br>
        Ngày lập:                   <input type="text" id="ddh_ngaylap" name="ddh_ngaylap" readonly value="<?= $dondathangRow['ddh_ngaylap']?>" class="form-control"/><br><br> 
        Tổng thành tiền:            <input type="text" id="TongThanhTien" name="TongThanhTien" readonly value="<?= $dondathangRow['TongThanhTien']?>" class="form-control"/><br><br>

        <div class="form-group">
            <label for="ddh_noigiao">Nơi giao hàng</label>
            <input type="text" id="ddh_noigiao" name="ddh_noigiao" readonly value="<?= $dondathangRow['ddh_noigiao']?>" class="form-control"/><br><br>
        </div>

       <button class="btn btn-outline-secondary" name="btnCapNhat">Duyệt đơn hàng</button>
</form>

<?php
// 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
if(isset($_POST['btnCapNhat'])) 
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    // $ddh_ngaygiao = $_POST['ddh_ngaygiao'];
    $ddh_noigiao = $_POST['ddh_noigiao'];
    $ddh_trangthai = 1; //1: đã xử lý

    // Câu lệnh
    $sql = "UPDATE `dondathang` SET ddh_noigiao='$ddh_noigiao', ddh_trangthai = $ddh_trangthai WHERE ddh_ma=$ddh_ma;";
   
    // Thực thi
    $result= mysqli_query($conn, $sql);
    // print_r($result);
    // die;

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:/nlcstocotoco/backend/index.php?page=dondathang_danhsach');
}
