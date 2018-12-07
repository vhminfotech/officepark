var Addressbook = function(){
    
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
            var url = baseurl + 'customer/address-book-delete-customer';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
        
         $('body').on('change', '.filter', function() {
            var customer_id = $('#customer_id').val();
            var querystring = (customer_id == '' && typeof customer_id === 'undefined') ? 'customer_id=' : 'customer_id=' + customer_id;
            location.href = baseurl + 'customer/address-book-list-customer?' + querystring;
        });
    }
    
    var handleAddressbookAdd = function(){
        var form = $('#addAddressbook');
        var rules = {
            gender: {required: true},

            firstname: {required: true},
            surname: {required: true},
            company: {required: true},
            position: {required: true},
            telephone_number: {required: true , number: true},
            mobile_number: {required: true , number: true},
            telephone: {required: true , number: true},
            email: {required: true , email : true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    }
    
    var handleEditAddressbook = function(){
        var form = $('#editAddressbook');
        var rules = {
            firstname: {required: true},
            surname: {required: true},
            company: {required: true},
            position: {required: true},
            telephone_number: {required: true , number: true},
            email: {required: true , email : true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    }
    
    return {
        init : function(){
            handleDelete();
        },
        add_init : function(){
            handleAddressbookAdd();
        },
        edit_init : function(){
            handleEditAddressbook();
        }        
    }
}();