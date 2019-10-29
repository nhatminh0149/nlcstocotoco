<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

/* --- 
   --- 2. Truy vấn dữ liệu Sản phẩm theo khóa chính
   --- 
*/
// Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$ddh_ma = $_GET['ddh_ma'];
$sqlSelect = <<<EOT
SELECT 
    ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_ngaygiao, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_hoten, kh.kh_sdt
    , SUM(spddh.sp_ddh_soluong * spddh.sp_ddh_dongia) AS TongThanhTien
    FROM `dondathang` ddh
    JOIN `chitiet_sp_ddh` spddh ON ddh.ddh_ma = spddh.ddh_ma
    JOIN `khachhang` kh ON ddh.kh_taikhoan = kh.kh_taikhoan
    WHERE ddh.ddh_ma=$ddh_ma
    GROUP BY ddh.ddh_ma, ddh.ddh_ngaylap, ddh.ddh_ngaygiao, ddh.ddh_noigiao, ddh.ddh_trangthai, kh.kh_hoten, kh.kh_sdt
EOT;

// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
$resultSelect = mysqli_query($conn, $sqlSelect);
$dondathangRow;
while($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC))
{
    $dondathangRow = array(
        'ddh_ma' => $row['ddh_ma'],
        'ddh_ngaylap' => date('d/m/Y H:i:s', strtotime($row['ddh_ngaylap'])),
        'ddh_ngaygiao' => empty($row['ddh_ngaygiao']) ? '' : date('d/m/Y H:i:s', strtotime($row['ddh_ngaygiao'])),
        'ddh_noigiao' => $row['ddh_noigiao'],
        'ddh_trangthai' => $row['ddh_trangthai'],
        'kh_hoten' => $row['kh_hoten'],
        'kh_sdt' => $row['kh_sdt'],
        'TongThanhTien' => number_format($row['TongThanhTien'], 2, ".", ",") . ' vnđ',
    );
}
/* --- End Truy vấn dữ liệu Sản phẩm theo khóa chính --- */

// 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
if(isset($_POST['btnCapNhat'])) 
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    // $ddh_ngaygiao = $_POST['ddh_ngaygiao'];
    // $ddh_noigiao = $_POST['ddh_noigiao'];
    $ddh_trangthai = 1; //1: đã xử lý

    // Câu lệnh
    $sql = "UPDATE `dondathang` SET ddh_trangthai=$ddh_trangthai WHERE ddh_ma=$ddh_ma;";
    
    // Thực thi
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:danhsach.php');
}
