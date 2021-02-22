$(document).ready(function () {

    $("#frmContact").validate({

        rules: {

            user_name: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },

            user_email: {
                required: true,
                checkEmail: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },

            user_mobile: {
                required: true,
                checkMobile: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },

            know: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },

            text: {
                required: true,
                minlength: 10,
                normalizer: function (value) {
                    return $.trim(value);
                },
            }

        },

        messages: {

            user_name: {
                required: "لطفا نام خود را وارد کنید"
            },

            user_email: {
                required: "لطفا ایمیل خود را وارد کنید",
                checkEmail: "لطفا ایمیل خود را صحیح وارد کنید"
            },

            user_mobile: {
                required: "لطفا تلفن همراه خود را وارد کنید",
                checkMobile: "لطفا تلفن همراه خود را صحیح وارد کنید"
            },

            know: {
                required: "لطفا طریقه آشنایی خود با من را وارد کنید"
            },

            text: {
                required: "لطفا پیام خود را وارد کنید",
                minlength: "لطفا حداقل 10 کاراکتر وارد کنید"
            }

        }, submitHandler: function (form, e) {
            if (reCAPTCHAValidation() == true) {
                e.preventDefault();

                var user_name_error = $('#user_name-error');
                var user_email_error = $('#user_email-error');
                var user_mobile_error = $('#user_mobile-error');
                var know_error = $('#know-error');
                var text_error = $('#text-error');
                var recaptcha_error = $('#recaptcha-error');

                var user_name = $('#user_name').val();
                var user_email = $('#user_email').val();
                var user_mobile = $('#user_mobile').val();
                var know = $('#know').val();
                var text = $('#text').val();
                var recaptcha_token = $("#g-recaptcha-response").val();

                loading(".loading", true);

                $.ajax({
                    url: window.location.origin + '/contact/store',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        user_name: user_name,
                        user_email: user_email,
                        user_mobile: user_mobile,
                        know: know,
                        text: text,
                        recaptcha_token: recaptcha_token
                    },
                    dataType: 'json',
                    success: function (result) {
                        loading(".loading", false);
                        if (result.status != undefined) {
                            if (result.status == 'success') {
                                swal({
                                    title: 'پیام', text: 'تماس شما با موفقیت ثبت شد<br>' +
                                        'به زودی توسط مدیر سایت برسی و پاسخ داده می شود', type: 'success'
                                }, function () {
                                    setTimeout(function () {
                                        document.location.reload();
                                    }, 1000);
                                });
                            }
                        } else {
                            grecaptcha.reset();
                            swal({title: 'خطا', text: result.message, type: 'error'});
                        }
                    }, error: function (response) {
                        grecaptcha.reset();
                        loading(".loading", false);
                        if (response.status === '429') {
                            swal({
                                title: 'هشدار', text: 'تعداد دفعات درخواست زیاد بوده است' +
                                    ' لطفا بعدا امتحان کنید', type: 'warning'
                            });
                        } else {
                            swal({title: 'خطا', text: 'خطایی رخ داده است', type: 'error'});
                        }
                        user_name_error.css('display', 'block');
                        user_name_error.text(response.responseJSON.errors.user_name);
                        user_email_error.css('display', 'block');
                        user_email_error.text(response.responseJSON.errors.user_email);
                        user_mobile_error.css('display', 'block');
                        user_mobile_error.text(response.responseJSON.errors.user_mobile);
                        know_error.css('display', 'block');
                        know_error.text(response.responseJSON.errors.know);
                        text_error.css('display', 'block');
                        text_error.text(response.responseJSON.errors.text);
                        recaptcha_error.css('display', 'block');
                        recaptcha_error.text(response.responseJSON.errors.recaptcha_token);
                    }
                });

            }
        }

    });

});
