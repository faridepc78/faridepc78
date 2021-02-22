$(function () {
    var $customerComments = $('.customers-comments .items');
    var dir = $("body").attr("data-dir") === 'rtl';
    $customerComments.owlCarousel({
        autoplay: true,
        loop: true,
        rtl: dir,
        dots: false,
        responsiveClass: true,
        responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 3}}
    });
    $(".customers-comments .buttons .b-btn").on("click", function () {
        var $type = $(this).attr("data-type");
        if ($type === 'next') {
            $customerComments.trigger('prev.owl.carousel', [700]);
        } else {
            $customerComments.trigger('next.owl.carousel', [700]);
        }
    });
});
