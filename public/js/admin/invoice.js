var Invoice = function () {

    var handleAddInvoice = function () {
        
        var form = $('#addInvoice');
        var rules = {
            invoice_no: {required: true},
            customer: {required: true},
            date_from: {required: true},
            date_to: {required: true},

        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    }
    
    var handleGenral = function (){
        $('body').on('click','.add_new_row',function(){
            var html = '<tr class="c-table__row"><td><select><option>Option Address 1</option><option>Option Address 2</option><option>Option Address 3</option><option>Option Address 4</option></select></td><td><input type="text" name="menge" value="2"/></td><td><input type="text" name="price" value="1,00"/>€</td><td colspan="2">2,00€ &nbsp;&nbsp;<a href="javascript:;" class="removetData">remove</a></td></tr>';
            $('.dataAppend').append(html);
        });
        $('body').on('click','.removetData',function(){
            $(this).closest('tr').remove();
        });
    }

    return {
        add_init: function () {
            handleAddInvoice();
            handleGenral();
        }
    }
}();