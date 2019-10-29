$(document).ready(function () {
    $("#themkm").validate({
        rules: {
            km_ten: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
         
          
        },
        messages: {
            km_ten: {
                required: "Vui lòng nhập tên Khuyến mãi",
                minlength: "Tên Khuyến mãi phải từ 3 ký tự",
                maxlength: "Tên Khuyến mãi không được vượt quá 50 ký tự"
            },
           
            
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Thêm class `invalid-feedback` cho field đang có lỗi
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
            // Thêm icon "Kiểm tra không Hợp lệ"
            if (!element.next("span")[0]) {
                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                    .insertAfter(element);
            }
        },
        success: function (label, element) {
            // Thêm icon "Kiểm tra Hợp lệ"
            if (!$(element).next("span")[0]) {
                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                    .insertAfter($(element));
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});