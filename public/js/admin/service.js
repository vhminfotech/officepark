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
        
        if(typeof totalCount === 'undefined'){
            var count = 1;
        }else{
            var count = totalCount;
        }
        
        $('body').on('click', '.add_new_row', function () {
            var html = '<tr class="c-table__row"><td class="c-table__cell"><input type="text" class="c-input" name="title[]"/></td><td class="c-table__cell"><input type="text" class="qty c-input" name="qty[]"/></td><td class="c-table__cell"><input type="text" class="price c-input" name="price[]"/></td><td class="c-table__cell"><div class="c-choice c-choice--checkbox"><input class="c-choice__input" id="invoice'+count+'" name="in_invoice['+count+']" type="checkbox"><label class="c-choice__label" for="invoice'+count+'">Invoice</label></td><td colspan="1"><span class="total"></span><a href="javascript:;" class="removetData"><i class="fa fa-close"></i></a></td></tr>';
            $('.dataAppend').append(html);
            count++;
        });

        $("body").on("blur", ".qty", function () {
            var qty = $(this).val();
            var price = $(this).closest('tr').find('.price').val();
            if (qty != '' && price != '') {
                var total = parseInt(qty) * parseInt(price);
                $(this).closest('tr').find('.total').text(total + '€');
            }
        });

        $("body").on("blur", ".price", function () {
            var price = $(this).val();
            var qty = $(this).closest('tr').find('.qty').val();
            if (qty != '' && price != '') {
                var total = parseInt(qty) * parseInt(price);
                $(this).closest('tr').find('.total').text(total + ' €');
            }
        });


        
        $('body').on('click', '.removetData', function () {
            $(this).closest('tr').remove();

        });
        
        var form3 = $('#editServiceForm');
        var rules3 = {
            packagename: {required: true},
            websites: {required: true},
            category: {required: true}
         };
         
        handleFormValidate(form3, rules3, function(form3) {
            handleAjaxFormSubmit(form3);
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
    
    var handleDelete = function(){
        $('body').on('click','.delete',function(){
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            setTimeout(function(){
                $('.yes-sure:visible').attr('data-id',id);
                $('.yes-sure:visible').attr('data-token',token);    
            },500);
            
        })
        
        $('body').on('click','.yes-sure',function(){
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            var data = { id : id ,_token :token};
            var url = baseurl + 'admin/service-delete';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
    }
    
    return {
        list_init: function () {
            handleList();
            handleDelete();
        },
        add_init: function () {
            handleAdd();
        },
    }
}();



    