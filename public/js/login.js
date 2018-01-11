//Javascript

jQuery(document).ready(function ($) {
    $('#login-form-container').hide(1000);
    $('#login-mobile-form-container').hide();
    $('#suscribe-mobile-form-container').hide();

    $('.connection').on('click', function () {
        $('#login-form-container').show(1000);
    });

    $('.connection-mobile').on('click', function () {
        $('#login-mobile-form-container').slideDown(1000);
        // $('.inscription-mobile').slideUp();
    });

    $('.inscription-mobile').on('click', function () {
        $('#suscribe-mobile-form-container').slideDown(1000);
    })

    $('#close.close-form').on('click', function () {
        $('#login-form-container').hide(1000);
    });


    function animateForm(target, element) {
        $(target).on('focus', function () {
            $(element).animate({"margin-left": "85%"});
        })

        $(target).on('focusout', function () {
            $(element).animate({"margin-left" : "5px"});
        })
    }

    animateForm("input[type='password']", ".fa-lock");
    animateForm("input#email", "#envelope-login");
})

