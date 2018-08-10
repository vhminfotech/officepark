var System_user = function() {

    var add_user = function() {

        var form = $('#addSystemUser');
        var rules = {
            firstName: {required: true},
            lastName: {required: true},
            email: {email: true , required: true },
            inoplaName: {required: true},
            password: {required: true},
            exNumber: {required: true},
            langauge: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var edit_user = function() {

        var form = $('#editSystemUser');
        var rules = {
            firstName: {required: true},
            lastName: {required: true},
            email: {email: true , required: true },
            inoplaName: {required: true},
            exNumber: {required: true},
            langauge: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };

    return{
        addInit: function() {
            add_user();
        },
        editInit: function(){
            edit_user();
        }        
    };
}();