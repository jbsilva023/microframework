$(window).on('load', function () {
    $('.preload').fadeOut('slow');
});

$(function ($) {
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('9999-9999Z', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.cpf_cnpj').mask(CPFCNPJMask, spOptions);
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('.money2').mask("#.##0,00", {reverse: true});

    /* Evento que controle o submenu lateral, será exibido no momento do click
     * no dropdown-item dropdown-toggle
     */
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });

    $('a.export-excel').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: "/arquivos/exportar/excel",
            cache: false,
            beforeSend: function () {
                $('.preload').fadeIn('slow');
            },
            success: function (response) {
                Swal.fire(response.title, response.msg, response.type).then(function () {
                    download(response);
                });
            },
            error: function () {

            },
            complete: function () {
                $('.preload').fadeOut('slow');
            }
        });
    });
});

var CPFCNPJMask = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '000.000.000-00' : '00.000.000/0000-00';
    },
    spOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(CPFCNPJMask.apply({}, arguments), options);
        }
    };

function download(response) {
    let a = document.createElement("a");
    a.href = response.file;
    a.download = response.name;
    document.body.appendChild(a);
    a.click();
    a.remove();
}