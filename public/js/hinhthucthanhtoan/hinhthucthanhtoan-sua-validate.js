$(document).ready(function () {
    $("#suahttt").validate({
        rules: {
            httt_ten: {
                required: true,
                minlength: 3,
                maxlength: 50
            },

          
        },
        messages: {
            httt_ten: {
                required: "Vui lòng nhập tên Hình thức thanh toán",
                minlength: "Tên Hình thức thanh toán phải từ 3 ký tự",
                maxlength: "Tên Hình thức thanh toán được vượt quá 50 ký tự"
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