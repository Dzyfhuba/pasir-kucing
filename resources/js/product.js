$("section#product .item").each(function() {
    let data = $(this).data('image');
    let wrapper = $(this).find('.wrapper');

    // set background image to wrapper and size cover
    wrapper.css('background-image', 'url(' + data + ')');
    wrapper.css('background-size', 'cover');
});