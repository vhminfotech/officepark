var Dashboard = function() {

  var handleAdd = function() {
        var form = $('#addStatus');
        var rules = {
            welcome_note: {required: true},
            status: {required: true},
            call_transfer: {required: true},
            
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