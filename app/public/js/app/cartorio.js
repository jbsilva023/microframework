$(function ($) {
    $('div#update-cartorio').on('shown.bs.modal', function (event) {
        let id = $(event.relatedTarget).data('idcarorio');
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
});