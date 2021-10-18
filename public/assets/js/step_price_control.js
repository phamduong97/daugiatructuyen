function plus_money(max_step, price_step) {

    var step = $('#max-step-number').val();
    var curr_price = $('#bid-price-number').val();
    var curent_price_number = $('#curent-price-number').val();
    var max_price = parseInt(curent_price_number) + parseInt(price_step) * parseInt(max_step);
    var offer_price = parseInt(curr_price) + parseInt(price_step) * parseInt(step);
    console.log(offer_price + ' - ' + max_price);

    if (parseInt(offer_price) > parseInt(max_price)) {

        toastr.warning("Giá bạn đưa ra đã vượt quá " + max_step + " lần bước giá so với giá hiện tại !", 'Lỗi định giá');

    } else {

        $('#bid-price-number').val(offer_price);
        format_money_vnd('show-format-money', offer_price);
    }

}

function minus_money(max_step, price_step) {
    var curr_price = $('#bid-price-number').val();
    var step = $('#max-step-number').val();
    $('#bid-price-number').val(parseInt(curr_price - price_step * step));
    format_money_vnd('show-format-money', parseInt(curr_price - price_step * step));
}

$('.istep').click(function() {

    $('.istep').each(function(index, item) {
        $(this).removeClass('active-step');
    });

    $(this).addClass('active-step');
    $('#max-step-number').val($(this).attr("val"));

});