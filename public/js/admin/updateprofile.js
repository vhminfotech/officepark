var Updateprofile = function () {

    var handleEditUser = function () {
        var form = $('#editUser');
        var rules = {
            name: {required: true},
            inopla_username: {required: true},
            email: {required: true},
            extension_number: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    };
    var handleDivision = function () {
        $(".isDiv").val("userdetaildiv");

        $('.c-tabs__link').click(function () {
            var status = $(this).attr('data-id');
            if (status == '1') {
                $(".userdetaildiv").show();
                $(".changepassworddiv").hide();
                $(".isDiv").val("userdetaildiv");
            } else {
                $(".userdetaildiv").hide();
                $(".changepassworddiv").show();
                $(".isDiv").val("changepassworddiv");

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