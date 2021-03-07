function numberFormat(input) {
    return Intl.NumberFormat("en-US").format(input);
}

$(function () {
    $("footer .social-networks li").each(function ($index, $item) {
        var $color = $($item).attr("data-color");
        $($item).find("a").css("color", $color);
    });
    $("footer .menu li a[href='#top']").on("click", function (e) {
        e.preventDefault();
        $("body,html").stop().animate({scrollTop: 0}, 1000, 'swing');
    });
    var selector = $(".material-input input,.material-input textarea");
    selector.each(function ($index, $item) {
        var $value = $($item).val();
        if ($value != '') {
            $($item).attr("data-has-value", 1);
        } else {
            $($item).attr("data-has-value", 0);
        }
    });
    selector.on("keyup", function () {
        if ($(this).val() == '') {
            $(this).attr("data-has-value", 0);
        } else {
            $(this).attr("data-has-value", 1);
        }
    });
});

function loading($selector, show) {
    if (show === true) {
        $($selector).css("opacity", "1")
    } else {
        $($selector).css("opacity", "0")
    }
}


function reCAPTCHAValidation() {
    var response = grecaptcha.getResponse();
    var reCAPTCHA_error = '';
    var reCAPTCHA_status = '';

    if (response.length == 0) {
        reCAPTCHA_error = 'لطفا ریکپچا را تکمیل کنید';
        toastr['info'](reCAPTCHA_error, 'پیام');
        reCAPTCHA_status = '0';
    } else {
        reCAPTCHA_status = '1';
    }

    if (reCAPTCHA_status == '0') {
        return false;
    }

    if (reCAPTCHA_status == '1') {
        return true;
    }
}

function changeStyleType(id) {

    id.keyup(function () {
        var id_value = id.val().length;

        if (id_value != 0) {
            id.css('direction','ltr');
        } else {
            id.css('direction','rtl');
        }
    });

}

function removeSpaces(string) {
    return string.trimStart();
}


function separateNum(value, input) {
    /* seprate number input 3 number */
    var nStr = value + '';
    nStr = nStr.replace(/\,/g, "");
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    if (input !== undefined) {

        input.value = x1 + x2;
    } else {
        return x1 + x2;
    }
}
