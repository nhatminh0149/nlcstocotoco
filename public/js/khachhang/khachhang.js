$(document).ready(function() {
    
    $('.btn-delete').click(function(e){
        var kh_taikhoan = $(this).data('kh-taikhoan');
        //debugger;
  
        Swal.fire({
            title: 'Bạn có muốn xóa khách hàng có tài khoản là: ' + kh_taikhoan,
            text: "Bạn không thể hoàn tác lại điều này!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              );
  
              // Điều hướng 
              window.location.href="/nlcstocotoco/backend/khachhang/xoa.php?kh_taikhoan=" + kh_taikhoan;
            }
          });
    });
  });