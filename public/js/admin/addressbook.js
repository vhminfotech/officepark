var Addressbook = function(){
    
    var handleListing = function(){
        
    }
    
    var handleAddressbookAdd = function(){
        var form = $('#addAddressbook');
        var rules = {
            firstName: {required: true},
            surname: {required: true},
            company: {email: true, required: true},
            position: {required: true},
            telephone_number: {required: true},
            email: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    }
    
    var handleEditAddressbook = function(){
        
    }
    
    return {
        init : function(){
            handleListing();
        },
        add_init : function(){
            handleAddressbookAdd();
        },
        edit_init : function(){
            handleEditAddressbook();
        }        
    }
}();