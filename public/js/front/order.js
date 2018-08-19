var Order = function() {
    
    $("body").on("change", ".accept", function(){
        if ($(this).val() == 'sepa') {
            $("#sepa").show();
            $('.accountInfo').show();
        }else {
            $("#sepa").hide();
            $('.accountInfo').hide();
        }
    });
    dateFormate('.dateField');
    
    var addDetails = function() {
        
        $("#addOrderForm").validate({
            rules: {
                package: {required: true},
                phone_to_reroute: {required: true},
                welcome_note: {required: true},
                reroute_confirm: {required: true},
                center_to_customer_route: {required: true},
            },
            messages: {
                
            },
             errorPlacement: function(error, element) {
            }
        });
        
        //checkDateRange('.dateField', 'today', '.dateField', 'Valid Date Must be Greater from Today');
        
//        $("#addOrderForm").validate({
//            rules: {
//                phone_to_reroute: { required: true },
//                first_name: { required: true, allowAlphaNumeric : true },
//                email: { required: true, email:true },
//                contact: { required: true, number:true }
//            },
//            messages: {
//                //bank_name: "Please enter Bank Name",
//                //account_name: "Please enter Account Name",
//                //account_no: "Please enter Account No."
//            },
//             errorPlacement: function(error, element) {
//            }
//        });
    };
    
    var addInfo = function() {
        
        var formId = "#addOrderForm";
        var rules = { 
            package: {required: true},
            phone_to_reroute: {required: true},
            welcome_note: {required: true},
            reroute_confirm: {required: true},
            center_to_customer_route: {required: true}
        };
        handleFormValidate($(formId), rules, function (form) {
//            ajaxcall($(form).attr('action'), $(form).serialize(), function (output) {
//                handleAjaxResponse(output);
//                output = JSON.parse(output);
//
//                if (output.status === 'success') {
//                    //window.location.href = output.redirectLink;
//                }
//            });
        });
    };
    
    return{
        initAddInfo: function() {
            addInfo();
        }
    };
}();