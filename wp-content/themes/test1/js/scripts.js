$(function () {
    var $mainContent = $('body'),
        $catLinks = $('.book-filter');

        $catLinks.on('click', function (e) {
            e.preventDefault();
            var $el = $(this);
            var value = $el.attr('href');
            $mainContent.animate({opacity: "0.5"});
            $mainContent.load(value + "#left-side", function () {
                $mainContent.animate({opacity:"1"});
            })
        });
});