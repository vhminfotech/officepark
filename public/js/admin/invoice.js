var Invoice = function () {

    var handleAddInvoice = function () {
        alert();
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

    return {
        add_init: function () {
            handleAddInvoice();
        }
    }
}();