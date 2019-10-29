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
        require_once __DIR__ . '/../../dbconnect.php';

        $kh_taikhoan = $_GET['kh_taikhoan'];

        $sqlDelete = "DELETE FROM khachhang WHERE kh_taikhoan = N'$kh_taikhoan';";
        $resultSelect = mysqli_query($conn, $sqlDelete);

        header('location:/nlcstocotoco/backend/index.php?page=khachhang_danhsach');
    
    ?>
</body>
</html>