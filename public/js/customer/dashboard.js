var Dashboard = function() {

  var handleAdd = function() {
        var form = $('#addStatus');
        var rules = {
            number: {required: true},
            message: {required: true},
            status: {required: true},
            information: {required: true},
            note: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    }

    return{
        Init: function() {
        	handleAdd();
        },
    };
}();