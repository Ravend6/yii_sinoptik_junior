(function() {
    'use strict';

    $('.language').on('click', function () {
        var lang = $(this).attr('id');

        $.post('/site/language', {lang: lang}, function (data) {
            location.reload();
        });
    });
}());
