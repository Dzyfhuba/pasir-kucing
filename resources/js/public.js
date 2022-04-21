// if #public loaded
if (document.getElementById('public')) {
    require('./portfolio');
    require('./counter');
    $(".card[id^='client']").each(function(e) {
        let background = $(this).data('background');
        $(this).css('background-image', 'url(' + background + ')');
        $(this).css('background-size', 'cover');
        $(this).css('background-position', 'center');
    });
    $('.card[data-href]').each(function(e) {
        $(this).on('click', function(c) {
            // get closest parent .container
            let parent = $(this).closest('.container');
            // get id of parent
            let id = parent.attr('id');
            let href = $(this).data('href');
            window.location.href = `${id}/${href}`;
        })
    });
    $("form input[type='range']").each(function(e) {
        $(this).on('change', function(c) {
            let a = $('#minprice').val();
            let b = $('#maxprice').val();

            if (a > b) {
                [a, b] = [b, a];
            }

            let label = $(this).prev().find('span');
            let value = $(this).val();
            label.text(value);

            $('#minprice').val(a);
            $('#maxprice').val(b);
        });
    });
}
