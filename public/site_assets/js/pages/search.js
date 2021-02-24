$(document).ready(function () {

    var form = $("#frmSearch");

    form.on("submit", function (e) {
        e.preventDefault();

        var $input = $(this).find("[name='keyword']").val().toString().trim();

        if ($input == '') {
            return false;
        }

        document.location = $("base").attr("href") + "posts/search?keyword=" + encodeURI($input);
    });

    $("#btnSearch").on("click", function () {

        var $input = form.find("[name='keyword']").val().toString().trim();

        if ($input == '') {
            return false;
        }

        form.submit();
    });

});
