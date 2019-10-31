$(window).on('load', function () {
    $('.preload').fadeOut('slow');

    $('form[name=importar-registros]').on('submit', function (e) {
        e.preventDefault();

        var data = new FormData($(this)[0]);

        if ($(this).find('input[name=arquivo]:file').val()) {
            $.ajax({
                type: "POST",
                url: "/arquivo/importar",
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function () {
                    $('.preload').fadeIn('slow');
                },
                success: function (response) {
                    Swal.fire(response.title, response.msg, response.type).then(function () {
                        if (response.reload) {
                            window.location.reload();
                        }
                    });
                },
                error: function () {

                },
                complete: function () {
                    $('.preload').fadeOut('slow');
                }
            });
        }
    });

    $('.delete-cartorio').on('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "Você deseja excluir o registro!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
});