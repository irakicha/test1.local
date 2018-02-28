$(function() {

    /*container with content*/

    var mainContent = $('#left-side'),
        allTax = [],
        allTitles = [];

    /*send ajax by click on reference*/

    $('.book-filter').on('change', function (){
        // e.preventDefault();

        var el = $(this),

            elLink = el.attr('id'),
            elTitle = el.next().text();

        if (this.checked) {
            allTax.push(elLink);
            allTitles.push(elTitle);
        } else {
            var idx = $.inArray(elLink, allTax);
            if( idx > -1 ){
                allTax.splice(idx, 1);
            }

            var idxx = $.inArray(elTitle, allTitles);
            if( idx > -1 ){
                allTitles.splice(idxx, 1);
            }
            if (allTax.length  == 0){
                window.location.href = "/books/"
            }
        }

            document.title = elTitle;

            history.pushState({page_title:elTitle}, elTitle, elLink);

            ajaxCat(elLink, allTitles, allTax);


    });


    /*ajax*/

    function ajaxCat(elLink, allTitles, allTax) {

        mainContent.animate({opacity:.5}, 300);

        $.post(
            customAjax.ajaxurl,
            {
                action: 'getCat',
                link: elLink,
                title:allTitles,
                allTax:allTax
            },
            function (response) {
                mainContent
                    .html(response)
                    .animate({opacity:1}, 300);
            });
    }

});
