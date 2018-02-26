$(function() {

    /*container with content*/

    var mainContent = $('#left-side');

    /*send ajax by click on reference*/

    $('.book-filter').on('click', function (e){
        e.preventDefault();

        var el = $(this),
            elLink = el.attr('href'),
            elTitle = el.text();

            document.title = elTitle;

            history.pushState({page_title:elTitle}, elTitle, elLink);

            ajaxCat(elLink);


    });



    /*watch for click the forward/back buttons*/

    window.addEventListener('popstate', function (event){

        document.title = event.state.page_title;

        ajaxCat(location.href);

    }, false);


    /*ajax*/

    function ajaxCat(elLink) {

        mainContent.animate({opacity:.5}, 300);

        $.post(
            customAjax.ajaxurl,
            {
                action: 'getCat',
                link: elLink
            },
            function (response) {
                mainContent
                    .html(response)
                    .animate({opacity:1}, 300);
            });
    }

});
