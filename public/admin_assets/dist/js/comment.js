$(document).ready(function () {

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

});
