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

        $hsp_ma = $_GET['hsp_ma'];

        $sqlDelete = "DELETE FROM hinhsanpham WHERE hsp_ma = $hsp_ma;";
        $resultSelect = mysqli_query($conn, $sqlDelete);

        header('location:/nlcstocotoco/backend/index.php?page=hinhsanpham_danhsach');
    
    ?>
</body>
</html>