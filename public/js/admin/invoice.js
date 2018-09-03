var Invoice = function () {

    var handleAddInvoice = function () {
       
        var form = $('#invoiceForm');
        var rules = {
            start_date: {required: true},
            end_date: {required: true},
            telefone_service: {required: true},
            
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    }
    
    var handleGenral = function (){
        $('body').on('click','.add_new_row',function(){
            
            var option = '<option value="">Select Bezeichnung</option>';
            var dynamicName = JSON.parse(bezeichnung);
            var j=0;
            
            $.each(dynamicName, function(index, value) {
                option += '<option value=' + index + '>' + value + '</option>';
            });
              
            var html = '<tr class="c-table__row"><td><select name="bezeichnung[]">'+option+'</select></td><td><input type="text" class="qty" name="menge[]"/></td><td><input type="text" class="price" name="price[]"/>€</td><td colspan="2"><input type="hidden" name="total[] "class="Rowtotal"><span class="total">€</span><a href="javascript:;" class="removetData">remove</a></td></tr>';
            $('.dataAppend').append(html);
            
            var finalTotal = 0;
            $(".total").each(function(){
                var value = $(this).val();
                if(value != ''){
                    finalTotal += parseInt(value);
                }
            });
            $(".finalTotal").text(finalTotal);
           
        });
        
        $("body").on("blur", ".qty" , function(){
            var qty = $(this).val();
            var price = $(this).closest('tr').find('.price').val();
            if(qty !='' && price !=''){
                var total = parseInt(qty) * parseInt(price);
                $(this).closest('tr').find('.Rowtotal').val(total);
                $(this).closest('tr').find('.total').text(total + '€');
            }
        });
        
        $("body").on("blur" , ".price" , function(){
            var price = $(this).val();
            var qty = $(this).closest('tr').find('.qty').val();
            if(qty !='' && price !=''){
                var total = parseInt(qty) * parseInt(price);
                $(this).closest('tr').find('.Rowtotal').val(total);
                $(this).closest('tr').find('.total').text(total + '€');
            }
        });
        
       
        
        $('body').on('click','.removetData',function(){
            $(this).closest('tr').remove();
            
        });
    }
    
    var handleList = function(){
        $('body').on('click','.createBill',function(){
            var value = $('.selectCustomer option:selected').val();
            if(value == ''){
                showToster('error','Please select customer');
            }else{
               window.location.href = baseurl + 'admin/add-invoice/'+ value; 
            }
        });
    }

    return {
        add_init: function () {
            handleAddInvoice();
            handleGenral();
        },
        list_init : function(){
            handleList();
        }        
    }
}();