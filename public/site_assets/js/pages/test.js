$(document).ready(function () {
    $(".share-dialog li").each(function ($index, $item) {
        var $color = $($item).attr("data-color");
        $($item).css("background", $color);
    });
    $(".share-button").on("click", function () {
        $(".share-dialog").toggleClass("active");
    });
    $("#frmSendComment").on("submit", function (e) {
        e.preventDefault();
        var data = getSerializeData("Comment", "SendComment", "#frmSendComment");
        loading(".loading", true);
        $.ajax({
            url: AJAX_URL, type: 'POST', data: data, dataType: 'json', success: function (result) {
                loading(".loading", false);
                if (result.RefreshCaptcha !== undefined) {
                    reloadRecaptcha();
                }
                if (result.status) {
                    swal({title: alertSuccessful, text: result.text, type: "success"}, function () {
                        setTimeout(function () {
                            document.location.reload();
                        }, 1000);
                    });
                } else {
                    swal({title: alertUnsuccessful, text: result.text, type: "error"});
                }
            }, error: function (a, b, c) {
                loading(".loading", false);
            }
        });
    });
    $(".reply").on("click", function () {
        var $id = $(this).attr("data-id");
        var $name = $(this).attr("data-name");
        $("#frmSendComment").find("[name='commentId']").val($id);
        $(".answer-to-comment").fadeIn();
        var $articleUrl = $(".send-comment").attr("data-article-url");
        $(".answer-to-comment").find(".who-area").find(".name").find(".value").html($name);
        $(".answer-to-comment").find(".who-area").find(".comment-id").find("a").html("#" + $id).attr("href", $articleUrl + "#comment" + $id);
        $("body,html").stop().animate({scrollTop: $("#sendComment").offset().top}, 500, 'swing');
    });





    $(".d-likes .d-content").on("click", function () {
        var $parent = $(this).parent();
        var $id = $parent.attr("data-id");
        var $count = Number($parent.attr("data-like-count"));
        $parent.addClass("active");
        $parent.find(".value").html(String($count + 1));
        setTimeout(function () {
            $parent.removeClass("active");
        }, 500);
        var data = getSerializeData("Blog", "Like");
        data.TextId = $id;
        $.ajax({
            url: AJAX_URL, type: 'POST', data: data, dataType: 'json', success: function (result) {
                if (result.status) {
                    if (result.RepeatLike !== undefined) {
                        $parent.find(".value").html(String($count));
                    } else {
                        $parent.attr("data-like-count", $count + 1);
                    }
                } else {
                    swal({title: alertUnsuccessful, text: result.text, type: "error"});
                }
            }
        });
    });








    $(".d-comments .d-content").on("click", function () {
        if ($(".comments-area").html() !== undefined) {
            $("body,html").stop().animate({scrollTop: $(".comments-area").offset().top - 100}, 1000, 'swing');
        }
    });
    $(".answer-to-comment .remove").on("click", function () {
        $("#frmSendComment").find("[name='comment_id']").val(0);
        $(".answer-to-comment").fadeOut();
    });
});
