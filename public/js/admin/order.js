var Order = function() {

    var testalert = function() {

        $('body').on('click', '.editCustomer', function() {
            $('.data1').show();
            $('.html1').hide();
        });

        $('body').on('click', '.canceltn', function() {
            var canclId = $(this).data('id');
            $('.data' + canclId).hide();
            $('.html' + canclId).show();
        });

        $('body').on('click', '.edit2', function() {
            $('.data2').show();
            $('.html2').hide();
        });
        $('body').on('click', '.edit3', function() {
            $('.data3').show();
            $('.html3').hide();
        });
        $('body').on('click', '.edit4', function() {
            $('.data4').show();
            $('.html4').hide();
        });


        $("#companyInfo").validate({
            rules: {
                company_name: {required: true},
                company_type: {required: true},
                company_info: {required: true},
            },
            messages: {},
            errorPlacement: function(error, element) {
            },
            submitHandler: function(form) {
                var company_name = $('.company_name').val();
                var token = $('._token').val();
                var data = {
                    company_name: $('.company_name').val(),
                    company_type: $('.company_type').val(),
                    company_info: $('.company_info').val(),
                    orderId: $('.orderId').val(),
                    _token: token};
                var url = baseurl + 'admin/edit-company-info';
                ajaxcall(url, data, function(output) {
                    handleAjaxResponse(output);
                });
            }
        });

        $("#paymentInfo").validate({
            rules: {
                account_name: {required: true},
                account_iban: {required: true},
                account_bic: {required: true},
                sepa: {required: true},
            },
            messages: {},
            errorPlacement: function(error, element) {
            },
            submitHandler: function(form) {
                var company_name = $('.company_name').val();
                var token = $('._token').val();
                var data = {
                    account_name: $('.account_name').val(),
                    account_iban: $('.account_iban').val(),
                    account_bic: $('.account_bic').val(),
                    sepa: $('.sepa').val(),
                    orderId: $('.orderId').val(),
                    _token: token};
                var url = baseurl + 'admin/edit-payment-info';
                ajaxcall(url, data, function(output) {
                    handleAjaxResponse(output);
                });
            }
        });

        $("#secInfo").validate({
            rules: {
                phone_to_reroute: {required: true},
                welcome_note: {required: true},
                unreach_note: {required: true},
                forward_message: {required: true},
                reroute_confirm: {required: true},
                info_type: {required: true},
                center_to_customer_route: {required: true},
            },
            messages: {},
            errorPlacement: function(error, element) {
            },
            submitHandler: function(form) {
                var company_name = $('.company_name').val();
                var token = $('._token').val();
                var data = {
                    phone_to_reroute: $('.phone_to_reroute').val(),
                    welcome_note: $('.welcome_note').val(),
                    unreach_note: $('.unreach_note ').val(),
                    forward_message: $('.forward_message option:selected').val(),
                    center_to_customer_route: $('.center_to_customer_route').val(),
                    info_type: $('.info_type').val(),
                    reroute_confirm: $('.reroute_confirm').val(),
                    orderId: $('.orderId').val(),
                    _token: token};
                   
                var url = baseurl + 'admin/edit-sec-info';
                ajaxcall(url, data, function(output) {
                    handleAjaxResponse(output);
                });
            }
        });
        
        var form = $('#orderStatus');
        var rules = {
            phone_to_reroute: {required: true},
            welcome_note: {required: true},
            unreach_note: {required: true},
            forward_message: {required: true},
            reroute_confirm: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
        
        $("#customerInfo").validate({
            rules: {
                customer_name: {required: true},
                date_of_birth: {required: true},
                gender: {required: true},
                email: {required: true, email: true},
                address: {required: true},
                postal_code: {required: true},
                phone: {required: true},
            },
            messages: {},
            errorPlacement: function(error, element) {
            },
            submitHandler: function(form) {
                var token = $('._token').val();
                var data = {
                    date_of_birth: $('.date_of_birth').val(),
                    customer_name: $('.customer_name').val(),
                    gender: $('.gender').val(),
                    email: $('.email').val(),
                    address: $('.address').val(),
                    postal_code: $('.postal_code').val(),
                    phone: $('.phone').val(),
                    orderId: $('.orderId').val(),
                    _token: token};
                var url = baseurl + 'admin/edit-customer-info';
                ajaxcall(url, data, function(output) {
                    handleAjaxResponse(output);
                });
            }
        });

        $('body').on('click', '.confirm', function() {
            var orderId = $(this).data('id');
            var token = $('#_token').val();
            var data = { orderId : orderId ,_token :token};
            var url = baseurl + 'admin/create-user';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
        
        $('.delete').click(function() {
            var dataid = $(this).attr('data-id');
            var dataurl = $(this).attr('data-url');
            $('.yes-sure').attr('data-id', dataid);
            $('.yes-sure').attr('data-url', dataurl);
        });
        
        $('.yes-sure').click(function() {
            var id = $(this).attr('data-id');            
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
//                url: baseurl + "admin/delete-customer",
                url: baseurl + "admin/customer-ajaxAction",
                data: {'action': 'deleteorder', 'data': {'id': id }},
                success: function(data) {
                    handleAjaxResponse(data);
//                    var data = JSON.parse(data);
                }
            });
        });
    };

    return{
        Init: function() {
            testalert();
        },
    };
}();