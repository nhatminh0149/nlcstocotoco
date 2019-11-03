<?php
     require_once __DIR__ . '/../dbconnect.php'; 
    if(isset($_SESSION['cart'])){
        // echo "<pre />";
        // var_dump($_SESSION['cart']);
    }
?>

<?php if(isset($_SESSION['cart'])): ?>
<h3>Giỏ hàng của bạn</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã sp</th>
            <th>Tên sp</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php $tong = 0;?>
        <?php foreach($_SESSION['cart'] as $key => $val) :?>
        <tr>
            <td><?php echo $key ?></td>
            <td><?php echo $val['sp_ten'] ?></td>
            <td><?php echo $val['qty'] ?></td>
            <td><?php echo number_format($val['sp_gia'],2,",",".") ?></td>
            <td><?php echo number_format($val['sp_gia'] * $val['qty'],2,",",".")?></td>
        </tr>
        <?php $tong += $val['sp_gia'] * $val['qty']; ?>
        <?php endforeach; ?> 
        <tr> 
            <td>Tổng tiền:</td>           
            <td><?php echo number_format($tong,2,",",".") ?></td>  
        </tr>
           
    </tbody>
   

<?php else : ?>
    <p>Ko ton tai gio hang</p>
<?php endif ; ?>
</table>
<a href="sanpham.php">Quay về trang sản phẩm</a>