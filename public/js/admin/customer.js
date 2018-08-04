var Customer = function() {

    var add_customer = function() {
//        $("#addUser").validate({
//            rules: {
//                first_name: {required: true},
//                email: {required: true,email:true},
//                password: {required: true},
//                cpassword: {required: true,equalTo: "#password"}
//            },
//            messages: {
//                //agency_name: "Please enter Agency Name",
//            },
//            errorPlacement: function(error, element) {
//            }
//        });

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


    return{
        listInit: function() {
            list();
        },
        addInit: function() {
            add_customer();
        },
    };
}();