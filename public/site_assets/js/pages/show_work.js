$(document).ready(function () {
    $(".share-area .items li").each(function ($index, $item) {
        var $color = $($item).attr("data-color");
        $($item).find("a").css("background", $color);
    });
    var $workImages = $('.images-area .items');
    var dir = $("body").attr("data-dir") === 'rtl';
    setTimeout(function () {
        $workImages.owlCarousel({
            autoplay: true,
            loop: true,
            autoWidth: true,
            rtl: dir,
            center: true,
            autoplaySpeed: 1000,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            dots: true,
            responsiveClass: true,
            responsive: {0: {items: 1, autoWidth: false}, 600: {items: 2}, 1000: {items: 3}}
        });
    }, 500);
});
