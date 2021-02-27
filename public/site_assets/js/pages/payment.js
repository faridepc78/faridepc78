$(function () {


    $("#frmPayment").validate({

        rules: {

            user_name: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },

            user_mobile: {
                required: true,
                checkMobile: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },

            user_email: {
                required: true,
                checkEmail: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },

            title: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },

            price: {
                required: true,
                number: true,
                maxlength: 11,
                normalizer: function (value) {
                    return $.trim(value);
                },
            }

        },

        messages: {

            user_name: {
                required: "لطفا نام و نام خانوادگی خود را وارد کنید"
            },

            user_mobile: {
                required: "لطفا تلفن همراه خود را وارد کنید",
                checkMobile: "لطفا تلفن همراه خود را صحیح وارد کنید"
            },

            user_email: {
                required: "لطفا ایمیل خود را وارد کنید",
                checkEmail: "لطفا ایمیل خود را صحیح وارد کنید"
            },

            title: {
                required: "لطفا عنوان پرداخت خود را وارد کنید"
            },

            price: {
                required: "لطفا مبلغ پرداخت را وارد کنید",
                number: "لطفا مبلغ پرداخت را صحیح وارد کنید",
                maxlength: "حداکثر رقم مبلغ پرداختی 9 رقم است"
            }

        }, submitHandler: function (form) {
            if (reCAPTCHAValidation() == true) {
                form.submit();
            }
        }

    });
});
