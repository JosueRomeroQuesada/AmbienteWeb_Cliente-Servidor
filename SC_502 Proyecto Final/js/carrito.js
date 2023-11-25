
$(document).ready(function () {
    $('.cantidad-input').on('input', function () {
        var cantidad = parseInt($(this).val());
        var precioUnitario = parseFloat($(this).closest('tr').find('.precio-unitario').text().replace('$', ''));
        var nuevoTotal = cantidad * precioUnitario;
        $(this).closest('tr').find('.total-producto').text('$' + nuevoTotal.toFixed(2));
        var nuevoTotalCarrito = 0;
        $('.total-producto').each(function () {
            nuevoTotalCarrito += parseFloat($(this).text().replace('$', ''));
        });
        $('.cart-total strong').text('$' + nuevoTotalCarrito.toFixed(2));
    });
});
