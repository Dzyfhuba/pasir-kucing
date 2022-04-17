// get .list except #all
// let list = $('#portfolio .list').not('#all');

$('#portfolio .nav .nav-link').on('click', function(e) {
    let target = $(this).data('target');

    let list = $('#portfolio .list').not('#' + target);
    list.hide();
    $('#' + target).show();

    // remove active class
    $('#portfolio .nav .nav-link').removeClass('active');
    // add active class
    $(this).addClass('active');
});
