$(document).ready(function () {
    $("#themsp").validate({
        rules: {
            sp_ten: {
                required: true,
                minlength: 3,
                maxlength: 200
            },
            sp_gia: {
                required: true,
                minlength: 5,
                maxlength: 6,
                digits : true
            },
         
          
        },
        messages: {
            sp_ten: {
                required: "Vui lòng nhập Tên Sản phẩm",
                minlength: "Tên Sản phẩm phải từ 3 ký tự",
                maxlength: "Tên Sản phẩm không được vượt quá 200 ký tự"
            },
            sp_gia: {
                required: "Vui lòng nhập Giá Sản Phẩm",
                minlength: "Giá Sản Phẩm phải từ 5 con số",
                maxlength: "Giá Sản Phẩm không được vượt quá 6 con số",
                digits: "Vui lòng nhập số"
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