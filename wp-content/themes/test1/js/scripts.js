$(function () {

    /*container with content*/

    var mainContent = $('#left-side'),
        allTax = [],
        allTitles = [];

    /*send ajax by click on reference*/

    $('.book-filter').on('change', function () {

        var el = $(this),

            elTerm = el.attr('id'),
            elTitle = el.next().text(),
            elTaxonomy = el.next().attr('data-taxonomy'),
            toArray = elTaxonomy+'|'+elTerm,

            elMaxYear = $('input[name="max_year"]').val(),
            elMinYear = $('input[name="min_year"]').val();



        if (this.checked) {
            allTax.push(toArray);
            allTitles.push(elTitle);
        } else {

            var idx = $.inArray(toArray, allTax);

            if (idx > -1) {
                allTax.splice(idx, 1);
            }

            // if (allTax.length == 0) {
            //     window.location.href = "/books/"
            // }

            var idxx = $.inArray(elTitle, allTitles);
            if (idx > -1) {
                allTitles.splice(idxx, 1);
            }


        }

        document.title = elTitle;

        ajaxCat(elTerm, allTitles, allTax, elMaxYear, elMinYear);


    });


    /*ajax*/

    function ajaxCat(elTerm, allTitles, allTax, elMaxYear, elMinYear) {

        mainContent.animate({opacity: .5}, 300);

        $.post(
            customAjax.ajaxurl,
            {
                action: 'getCat',
                link: elTerm,
                title: allTitles,
                allTax: allTax,
                maxYear: elMaxYear,
                minYear: elMinYear

            },
            function (response) {
                mainContent
                    .html(response)
                    .animate({opacity: 1}, 300);
            });
    }

});
