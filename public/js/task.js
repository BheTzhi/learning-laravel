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
    $(document).on('click', '.edit', function () {
        const id = $(this).data('id')

        var url = '/task/' + id
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('#eid').val(response.id)
                $('#etitle').val(response.title)
                $('#edescription').val(response.description)
                $('#estatus').val(response.status)
                $('#epriority').val(response.priority)
                $('#edue_date').val(response.due_date)
                $('#ecategory').val(response.category)
            },
            error: function (xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        })

    })
})


