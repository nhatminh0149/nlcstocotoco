$(document).ready(function() {
    
    $('.btn-delete').click(function(e){
        var hsp_ma = $(this).data('hsp-ma');
        //debugger;
  
        Swal.fire({
            title: 'Bạn có muốn xóa hình sản phẩm có tài khoản là: ' + hsp_ma,
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
              window.location.href="/nlcstocotoco/backend/hinhsanpham/xoa.php?hsp_ma=" + hsp_ma;
            }
          });
    });
  });