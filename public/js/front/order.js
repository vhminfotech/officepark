var Order = function () {
    var addDetails = function () {
        $("body").on("change", ".accept", function () {
            if ($(this).val() == 'sepa') {
                $("#sepa").show();
                $('.accountInfo').show();
            } else {
                $("#sepa").hide();
                $('.accountInfo').hide();
            }
        });
        dateFormate('.dateField');

        $("#addOrderForm").validate({
            rules: {
                package: {required: true},
                phone_to_reroute: {required: true},
                welcome_note: {required: true},
                reroute_confirm: {required: true},
                center_to_customer_route: {required: true}
            },
            showErrors: function (errorMap, errorList) {
                if (typeof errorList[0] != "undefined") {
                    var position = $(errorList[0].element).offset().top - 70;
                    $('html, body').animate({
                        scrollTop: position
                    }, 300);
                }
                this.defaultShowErrors(); // keep error messages next to each input element   
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.c-input, .form-control').addClass('has-error'); // set error class to the control group
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.c-input, .form-control').addClass('has-error'); // set error class to the control group
            },
                    unhighlight: function (element) { // revert the change done by hightlight
                        $(element)
                                .closest('.c-input, .form-control').removeClass('has-error'); // set error class to the control group
                    },
            success: function (label) {
                label
                        .closest('.c-input, .form-control').removeClass('has-error'); // set success class to the control group
            },
            errorPlacement: function (error, element) {
                return true;
            },
            submitHandler: function (form) {
                return true;
//                $("#addOrderForm").submit();
            }
        });
    };


    return{
        initAddInfo: function () {
            addDetails();
        }
    };
}();