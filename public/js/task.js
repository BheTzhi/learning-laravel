$(document).ready(function () {
    $(document).on('click', '.adds', function () {
        var form = $('.card-form')
        if (form.is(':visible')) {
            form.fadeOut()
            $(this).find('i').removeClass('fa-minus').addClass('fa-plus')
            $('.card-tabel').fadeIn()
        } else {
            form.fadeIn()
            $(this).find('i').removeClass('fa-plus').addClass('fa-minus')
            $('.card-tabel').fadeOut()
        }
    })
})
