$(function ($) {
    $('div#update-cartorio').on('shown.bs.modal', function (event) {
        let id = $(event.relatedTarget).data('idcartorio');
        let nome = $(event.relatedTarget).data('nome');

        $(this).find('.modal-header h5.modal-title').html('Atualizar (' + nome + ')');

        if (id) {
            $.ajax({
                type: "POST",
                url: "/cartorio/detalhe",
                data: {'id': id},
                beforeSend: function () {
                    $('div#update-cartorio').find('.preload').fadeIn('slow');
                },
                success: function (response) {
                    $('div#update-cartorio').find('div.modal-content .form').html(response);
                },
                error: function () {

                },
                complete: function () {
                    $('div#update-cartorio').find('.preload').fadeOut('slow');
                },
            });
        }
    });

    $('div#update-cartorio').on('hidden.bs.modal', function (event) {
        $(this).find('.modal-header h5.modal-title').html('');
        $(this).find('div.modal-content .form').html('');
    });

    $('select[name=tipo_documento]').on('change', function () {
        let form = $(this).closest('form');

        switch ($(this).val()) {
            case '1':
                form.find('input[name=documento]').attr('disabled', false).val('');
                form.find('input[name=documento]').mask('000.000.000-00', {reverse: true});
                break;
            case '2':
                form.find('input[name=documento]').attr('disabled', false).val('');
                form.find('input[name=documento]').mask('00.000.000/0000-00', {reverse: true});
                break;
            default:
                form.find('input[name=documento]').attr('disabled', true).val('');
                break;
        }
    });

    $('form[name=cartorio]').on('submit', function (event) {
        event.preventDefault();

        var form = $(this);

        $.ajax({
            type: "POST",
            url: "/cartorio/inserir",
            data: form.serialize(),
            beforeSend: function () {
                $('div#update-cartorio').find('.preload').fadeIn('slow');
            },
            success: function (response) {
                Swal.fire(response.title, response.msg, response.type).then(function () {
                    if (response.reload) {
                        window.location.href = '/';
                    }
                });
            },
            error: function () {

            },
            complete: function () {
                $('.preload').fadeOut('slow');
            }
        });
    });

    $('div#update-cartorio').on('click', 'button.save', function (event) {
        var form = $('form[name=cartorio]');

        $.ajax({
            type: "POST",
            url: "/cartorio/update",
            data: form.serialize(),
            beforeSend: function () {
                $('div#update-cartorio').find('.preload').fadeIn('slow');
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
    });

    $('.delete-cartorio').on('click', function (event) {
        event.preventDefault();

        let id = $(this).data('idcartorio');

        Swal.fire({
            title: 'Você tem certeza?',
            text: "Você deseja excluir o registro?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Não',
            confirmButtonText: 'Sim',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/cartorio/delete",
                    data: {'id': id},
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
    });
});