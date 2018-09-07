var Service = function () {

    var handleGenral = function () {
        $('body').on('click', '.add_new_row', function () {
            var html = '<tr class="c-table__row"><td><input type="text" class="qty c-input" name="fddirst[]"/></td><td><input type="text" class="qty c-input" name="second[]"/></td><td><input type="text" class="c-input" name="third[]"/></td><td><div class="c-choice c-choice--checkbox"><input class="c-choice__input" id="checkboxs" name="checkboxes" type="checkbox"><label class="c-choice__label" for="checkboxs">Invoice</label></td><td colspan="1"><input type="hidden" name="total[] "class="Rowtotal"><span class="total"></span><a href="javascript:;" class="removetData"><i class="fa fa-close"></i></a></td></tr>';
            $('.dataAppend').append(html);
            $('.c-select').select2();
            var finalTotal = 0;
            $(".total").each(function () {
                var value = $(this).val();
                if (value != '') {
                    finalTotal += parseInt(value);
                }
            });
            $(".finalTotal").text(finalTotal);

        });

        $("body").on("blur", ".qty", function () {
            var qty = $(this).val();
            var price = $(this).closest('tr').find('.price').val();
            if (qty != '' && price != '') {
                var total = parseInt(qty) * parseInt(price);
                $(this).closest('tr').find('.Rowtotal').val(total);
                $(this).closest('tr').find('.total').text(total + '€');
            }
        });

        $("body").on("blur", ".price", function () {
            var price = $(this).val();
            var qty = $(this).closest('tr').find('.qty').val();
            if (qty != '' && price != '') {
                var total = parseInt(qty) * parseInt(price);
                $(this).closest('tr').find('.Rowtotal').val(total);
                $(this).closest('tr').find('.total').text(total + '€');
            }
        });



        $('body').on('click', '.removetData', function () {
            $(this).closest('tr').remove();

        });
    }
    return {
        list_init: function () {
            handleGenral();
        }
    }
}();



    