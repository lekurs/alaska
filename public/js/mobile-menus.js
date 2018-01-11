jQuery(document).ready(function ($) {

    $('.menu-mobile').hide();

    $('.mobile').on('click', function () {
        $('.menu-mobile').show(1000).css('display', 'flex');
    })

    $('.close-menu-mobile').on('click', function () {
        $('.menu-mobile').hide(1000);
    })

    $('form#login-form').on('submit', function () {
        $('.menu-mobile').hide();
    })
})