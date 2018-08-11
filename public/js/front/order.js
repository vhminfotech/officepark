var Order = function() {

    $("body").on("change", ".accept", function(){
        if ($(this).val() == 'sepa') {
            $("#sepa").show();
        }else {
            $("#sepa").hide();
        }
    });
        
    var addDetails = function() {
        
//         $('input:radio[name="accept"]').change(function() {
//            if ($(this).val() == 'sepa') {
//                $("#sepa").show();
//            }else {
//                $("#sepa").hide();
//            }
//        });
        
        $("#addOrderForm").validate({
            rules: {
                package: {required: true}
            },
            messages: {
//                package: "msg1",
//                package: "msg2",
            },
             errorPlacement: function(error, element) {
            }
        });
        
        dateFormate('.dateField');
        //checkDateRange('.dateField', 'today', '.dateField', 'Valid Date Must be Greater from Today');
        
//        $("#addOrderForm").validate({
//            rules: {
//                phone_to_reroute: {
//                    required: true
//                },
//                first_name: {
//                    required: true, 
//                    allowAlphaNumeric : true
//                },
//                last_name: {
//                    required: true, 
//                    allowAlphaNumeric : true
//                },
//                email: {
//                    required: true,
//                    email:true
//                },
//                contact: {
//                    required: true,
//                    number:true
//                },
//                dob: {
//                    required: true
//                },
//                address: {
//                    required: true
//                }
//            },
//            messages: {
////                bank_name: "Please enter Bank Name",
////                account_name: "Please enter Account Name",
////                account_no: "Please enter Account No."
//            },
//             errorPlacement: function(error, element) {
//            }
//        });
    };

    return{
        initAddInfo: function() {
            addDetails();
        }
    };
}();