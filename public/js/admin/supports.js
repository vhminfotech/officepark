var Supports = function() {

    var handleSupport = function() {

        $('body').on('click', '.btnPopup', function() {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin/support-ajaxAction",
                data: {'action': 'getPopupData', 'data': {'id': 2 }},
                success: function(data) {
                    $('#myModal2').modal('show');
//                    var data = JSON.parse(data);
                }
            });
        });
        var form = $('#addSupports');
        var rules = {
            support_message: {required: true},
            note: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    }

    return {
       
        list_init: function() {
            handleSupport();
        }
    }
}();