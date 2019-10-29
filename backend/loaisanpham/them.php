
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Thêm mới Loại Sản Phẩm</h1>

    <form id="themlsp" name="themlsp" method="post" action="">
        Loại sản phẩm:       <input type="text" id="lsp_ten" name="lsp_ten" class="form-control"><br><br>
                            <input type="submit" name="them" id="them" class="btn btn-outline-secondary" value="Thêm Loại sản phẩm" />
    </form>
    
    <?php
        require_once __DIR__ .'/../../dbconnect.php';

        //Khi bấm nút Thêm
        if(isset($_POST['them'])) {
            $lsp_ten = $_POST['lsp_ten'];

            $sqlInsert = "INSERT INTO `loaisanpham`(lsp_ten) VALUES (N'$lsp_ten');";
            $resultInsert = mysqli_query($conn, $sqlInsert);
            header('location:/nlcstocotoco/backend/index.php?page=loaisanpham_danhsach');
        }
    ?>
    
</body>
</html>
