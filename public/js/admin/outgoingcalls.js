var Outgoingcalls = function() {

    var handleAddInvoice = function() {
        var form = $('#addoutgoingcalls');
        var rules = {
            company: {required: true},
            firstname: {required: true},
            lastname: {required: true},
            email: {required: true},
            telephone1: {required: true},
            date: {required: true},
            note: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });

        $('.complete-call').click(function() {
            var id = $(this).attr('data-id');
           $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
//                url: baseurl + "admin/delete-customer",
                url: baseurl + "admin/outgoingcalls-ajaxAction",
                data: {'action': 'completeOutgoingcalls', 'data': {'id': id }},
                success: function(data) {
                    handleAjaxResponse(data);
//                    var data = JSON.parse(data);
                }
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
                url: baseurl + "admin/outgoingcalls-ajaxAction",
                data: {'action': 'deleteOutgoingcalls', 'data': {'id': id }},
                success: function(data) {
                    handleAjaxResponse(data);
//                    var data = JSON.parse(data);
                }
            });
        });
    }

    return {
        init: function() {
            handleAddInvoice();
        },
       
    }
}();