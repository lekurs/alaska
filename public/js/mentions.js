jQuery(document).ready(function ($) {
    $('span#check-legal').on('click', function () {
            $('#legal-mention').remove();

            $.ajax({
                'url' : '/ajax/mention',
                'type' : 'post',
            });
        })
})