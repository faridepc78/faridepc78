$(document).ready(function () {

    $(".share-dialog li").each(function ($index, $item) {
        var $color = $($item).attr("data-color");
        $($item).css("background", $color);
    });
    $(".share-button").on("click", function () {
        $(".share-dialog").toggleClass("active");
    });

    $(".reply").on("click", function () {
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        $("#frmSendComment").find("[name='post_comment_id']").val(id);
        $(".answer-to-comment").fadeIn();
        var articleUrl = $(".send-comment").attr("data-article-url");
        $(".answer-to-comment").find(".who-area").find(".name").find(".value").html(name);
        $(".answer-to-comment").find(".who-area").find(".comment-id").find("a").html("#" + id).attr("href", articleUrl + "#comment" + id);
        $("body,html").stop().animate({scrollTop: $("#sendComment").offset().top}, 500, 'swing');
    });


    $(".d-comments .d-content").on("click", function () {
        if ($(".comments-area").html() !== undefined) {
            $("body,html").stop().animate({scrollTop: $(".comments-area").offset().top - 100}, 1000, 'swing');
        }
    });
    $(".answer-to-comment .remove").on("click", function () {
        $("#frmSendComment").find("[name='post_comment_id']").val('0');
        $(".answer-to-comment").fadeOut();
    });

    $('#frmSendComment').validate({

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

            text: {
                required: "لطفا پیام خود را وارد کنید",
                minlength: "لطفا حداقل 10 کاراکتر وارد کنید"
            }

        }, submitHandler: function (form, e) {
            if (reCAPTCHAValidation() == true) {
                e.preventDefault();

                var user_name_error = $('#user_name-error');
                var user_email_error = $('#user_email-error');
                var text_error = $('#text-error');
                var recaptcha_error = $('#recaptcha-error');

                var post_comment_id = $('#post_comment_id').val();
                var post_id = $('#post_id').val();
                var user_name = $('#user_name').val();
                var user_email = $('#user_email').val();
                var text = $('#text').val();
                var recaptcha_token = $("#g-recaptcha-response").val();

                if (post_comment_id == '0') {
                    var url = window.location.origin + '/post/storeComment/' + post_id;
                } else {
                    var url = window.location.origin + '/post/replyComment/' + post_id;
                }

                loading(".loading", true);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        post_comment_id: post_comment_id,
                        post_id: post_id,
                        user_name: user_name,
                        user_email: user_email,
                        text: text,
                        recaptcha_token: recaptcha_token
                    },
                    dataType: 'json',
                    success: function (result) {
                        loading(".loading", false);
                        if (result.status != undefined) {
                            if (result.status == 'success') {
                                swal({
                                    title: 'پیام', text: 'نظر شما با موفقیت ثبت شد<br>' +
                                        'بعدا که توسط مدیر سایت تایید شد می توانید نظر خود را ببینید', type: 'success'
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
                        text_error.css('display', 'block');
                        text_error.text(response.responseJSON.errors.text);
                        recaptcha_error.css('display', 'block');
                        recaptcha_error.text(response.responseJSON.errors.recaptcha_token);
                    }
                });

            }
        }
    });


    /*START LIKE && DISLIKE AJAX*/

    $(".d-likes .d-content").on("click", function () {
        var parent = $(this).parent();
        var id = parent.attr("data-id");
        var count = Number(parent.attr("data-like-count"));
        var color = parent.find('#like_icon');
        var url = parent.attr("data-link");
        var base_url = window.location.origin;
        var like_url = base_url + '/post/like/' + id;
        var dislike_url = base_url + '/post/dislike/' + id;

        $.ajax({
            url: url,
            type: 'POST',
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function (result) {
                if (result.status !== undefined) {
                    if (result.status == 'like') {
                        swal({title: 'پیام', text: 'پست لایک شد', type: 'success'});
                        parent.attr("data-link", dislike_url);
                        color.css('color', 'red');
                        parent.attr("data-like-count", count + 1);
                        parent.find(".value").html(String(count + 1));
                    }
                    if (result.status == 'dislike') {
                        swal({title: 'پیام', text: 'پست دیسلایک شد', type: "error"});
                        parent.attr("data-link", like_url);
                        color.css('color', '#9E9E9E');
                        parent.attr("data-like-count", count - 1);
                        parent.find(".value").html(String(count - 1));
                    }
                } else {
                    grecaptcha.reset();
                    swal({title: 'خطا', text: result.message, type: 'error'});
                }
            }, error: function (response) {
                grecaptcha.reset();
                if (response.status === '429') {
                    swal({
                        title: 'هشدار', text: 'تعداد دفعات درخواست زیاد بوده است' +
                            ' لطفا بعدا امتحان کنید', type: 'warning'
                    });
                } else {
                    swal({title: 'خطا', text: 'خطایی رخ داده است', type: 'error'});
                }
            }
        });
    });

    /*END LIKE && DISLIKE AJAX*/
});
