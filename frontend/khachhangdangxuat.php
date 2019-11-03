<?php
    session_start();
    session_destroy();
    echo '<script>
        alert("Bạn đã đăng xuất khỏi tài khoản của mình!!!");
        window.location= "index.php" ;
    </script>';
?>