$(document).ready(function () {
    $("#themkh").validate({
        rules: {
            kh_taikhoan: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            kh_mk: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            kh_hoten: {
                required: true,
                minlength: 3,
                maxlength: 200
            },
            kh_sdt: {
                required: true,
                minlength: 10,
                maxlength: 15,
                digits: true
            },
            kh_diachi: {
                required: true,
                minlength: 9,
                maxlength: 500
            },
            kh_email: {
                required: true,
                email : true
            },

        },
        messages: {
            kh_taikhoan: {
                required: "Vui lòng nhập Tài khoản của KH",
                minlength: "Tên Tài khoản phải từ 3 ký tự",
                maxlength: "Tên Tài khoản không được vượt quá 100 ký tự"
            },
            kh_mk: {
                required: "Vui lòng nhập Mật khẩu của KH",
                minlength: "Mật khẩu phải từ 3 kí tự",
                maxlength: "Mật khẩu không được vượt quá 20 kí tự"
            },
            kh_hoten: {
                required: "Vui lòng nhập Họ tên của KH",
                minlength: "Họ tên phải từ 3 kí tự",
                maxlength: "Họ tên không được vượt quá 200 kí tự"
            },
            kh_sdt: {
                required: "Vui lòng nhập Số điện thoại của KH",
                minlength: "Số điện thoại phải từ 10 kí tự",
                maxlength: "Số điện thoại không được vượt quá 15 kí tự",
                digits: "Vui lòng nhập số"
            },
            kh_diachi: {
                required: "Vui lòng nhập Địa chỉ của KH",
                minlength: "Địa chỉ phải từ 9 kí tự",
                maxlength: "Địa chỉ không được vượt quá 500 kí tự"
            },
            kh_email: {
                required: "Vui lòng nhập Email của KH",
                minlength: "Email phải từ 5 kí tự"
            },
            kh_email: "Vui lòng nhập đúng định dạng Email",
            agree: "Vui lòng đồng ý các điều khoản"
            
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