var Updateprofile = function () {

    var handleEditUser = function () {
        var form = $('#editUser');
        var rules = {
            name: {required: true},
            inopla_username: {required: true},
            email: {required: true},
            extension_number: {required: true},
            type: {required: true},

        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    };
    var handleDivision = function () {
        $('.c-tabs__link').click(function () {
            if ($('.c-tabs__link').hasClass("userdetail")) {

                $('.changepassworddiv').hide();
                $('.userdetaildiv').show();
            } else {
                $('.changepassworddiv').show();
                $('.userdetaildiv').hide();

            }
        });
    };


    return{

        edit_init: function () {
            handleEditUser();
            handleDivision();
        }
    };
}();