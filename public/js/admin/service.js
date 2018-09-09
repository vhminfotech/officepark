var Service = function () {

    var handleAdd = function () {
        
        var form = $('#addService');
        var rules = {
            category: {required: true}
         };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
        
        var form2 = $('#addServiceForm');
        var rules2 = {
            packagename: {required: true}
         };
        handleFormValidate(form2, rules2, function(form2) {
            handleAjaxFormSubmit(form2);
        });
        var count = 1;
        $('body').on('click', '.add_new_row', function () {
            var html = '<tr class="c-table__row"><td class="c-table__cell"><input type="text" class="qty c-input" name="title['+count+']"/></td><td class="c-table__cell"><input type="text" class="qty c-input" name="qty['+count+']"/></td><td class="c-table__cell"><input type="text" class="c-input" name="price['+count+']"/></td><td class="c-table__cell"><div class="c-choice c-choice--checkbox"><input class="c-choice__input" id="invoice'+count+'" value="yes" name="in_invoice['+count+']" type="checkbox"><label class="c-choice__label" for="invoice'+count+'">Invoice</label></td><td colspan="1"><span class="total"></span><a href="javascript:;" class="removetData"><i class="fa fa-close"></i></a></td></tr>';
            $('.dataAppend').append(html);
            count++;
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
    
    var handleList = function(){
        

        $('body').on('click','.createpackage',function(){
            var value = $('.websiteList option:selected').val();
            if(value == ''){
                showToster('error','Please select customer');
            }else{
               window.location.href = baseurl + 'admin/service-add/'+ value; 
            }
        });
        
    }
    return {
        list_init: function () {
            handleList();
        },
        add_init: function () {
            handleAdd();
        },
    }
}();



    