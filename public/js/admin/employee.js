var Employee = function() {

    var handleAddEmploye = function() {
        var form = $('#addEmpForm');
        var rules = {
            firstName: {required: true},
            lastName: {required: true},
            jobtitle: {required: true},
            responsibility: {required: true},
            p_away_msg: {required: true},
            call_back_msg: {required: true},
            telephone: {required: true, number: true},
            mobile: {required: true, number: true},
            anyotherinformation: {required: true},
            email: {required: true, email: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
        $('.holiday').on('changeDate', function(ev) {
            $('.datepicker-dropdown').hide();
        });
//        $('.holiday').datepicker({
//            autoclose: true
//        }).on('changeDate', function(ev) {
//            (ev.viewMode == 'days') ? $(this).datepicker('hide') : '';
//        });
//        $('.holiday').datepicker({
//            format: "dd/mm/yyyy",
//            autoclose: true
//        });
        $('.holiday').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            closeOnDateSelect: true
        }).on('change', function() {
            $('.datepicker-dropdown').hide();
        });
    }
    var handleEditEmploye = function() {
        var form = $('#editEmpForm');
        var rules = {
            firstName: {required: true},
            lastName: {required: true},
            jobtitle: {required: true},
            responsibility: {required: true},
            p_away_msg: {required: true},
            call_back_msg: {required: true},
            telephone: {required: true, number: true},
            mobile: {required: true, number: true},
            anyotherinformation: {required: true},
            email: {required: true, email: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    }
    var handleDelete = function() {
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
                url: baseurl + "admin/employee-ajaxAction",
                data: {'action': 'deleteEmployee', 'data': {'id': id}},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }


    return {
        list_init: function() {
            handleAddEmploye();
            handleEditEmploye();
            handleDelete();
        }
    }
}();