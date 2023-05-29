

(function ($) {
    //your stuff
    console.log('load');

    $('#charFilter').on('change', function () { 
    
        var char = $(this).val().toLowerCase();

        $('#wordsTable tr:gt(0)').hide();

        if ('all' == char) {
            $('#wordsTable tr:gt(0)').show();

        }

        $('#wordsTable td').filter(function () {
            return $(this).text().toLowerCase().indexOf(char) == 0;
        }).parent().show();

    });
})(jQuery);