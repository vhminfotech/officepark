var Updateprofile = function () {



    var handleEditUser = function(){
        var form = $('#editUser');
        var rules = {
            name: {required: true},
            inopla_username: {required: true},
            email: {required: true},
            extension_number: {required: true},
            type: {required: true},
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };


    return{

        edit_init: function () {
            handleEditUser();
        }
    };
}();