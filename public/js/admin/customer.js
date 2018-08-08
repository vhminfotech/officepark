var Customer = function() {

    var add_customer = function() {

        var form = $('#addUser');
        var rules = {
            first_name: {required: true},
            email: {required: true, email: true},
            password: {required: true},
            cpassword: {required: true, equalTo: "#password"}
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });

    };
    
    var edit_customer = function() {

        var form = $('#editUser');
        var rules = {
            first_name: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });

    };

    return{
        listInit: function() {
            list();
        },
        addInit: function() {
            add_customer();
        },
        editInit: function() {
            edit_customer();
        },
    };
}();