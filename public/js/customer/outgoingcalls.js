var Outgoingcalls = function() {

    var handleAddInvoice = function() {
        var form = $('#addoutgoingcalls');
        var rules = {
            company: {required: true},
            firstname: {required: true},
            lastname: {required: true},
            email: {required: true},
            telephone1: {required: true},
            date: {required: true},
            note: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    }

    return {
        init: function() {
            handleAddInvoice();
        },
       
    }
}();