var Calls = function() {

    var handleAddInvoice = function() {

    }


    var handleList = function() {

        $('body').on('change', '.filter', function() {
            var consult_id = [];
            var select_agent = $('#selectAgent').val();
            var month = $('#month').val();
            var year = $('#year').val();
            var year = $('#year').val();
            var search_string = $('#searchString').val();

            var querystring = (select_agent == '' && typeof select_agent === 'undefined') ? 'select_agent=' : 'select_agent=' + select_agent;
            querystring += (select_agent == '' && typeof select_agent === 'undefined') ? '&month=' : '&month=' + month;
            querystring += (year == '' && typeof year === 'undefined') ? '&year=' : '&year=' + year;
            querystring += (search_string == '' && typeof search_string === 'undefined') ? '&search_string=' : '&search_string=' + search_string;
            location.href = baseurl + 'admin/calls?' + querystring;
        });
        $('body').on('click', '.sentEmailBtn', function() {
            $('.editId').val($(this).attr('data-id'));
            $('.first_last_name').text($(this).attr('data-name'));
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
//                url: baseurl + "admin/delete-customer",
                url: baseurl + "admin/calls-ajaxAction",
                data: {'action': 'getSentEmailData', 'data': {'id': id}},
                success: function(data) {
//                    handleAjaxResponse(data);
                    var data = JSON.parse(data);
                    console.log(data);
                    $('#gender').val(data['gender']);
                    $('#first_last_name').val(data['first_and_last_name']);
                    $('#caller_email').val(data['caller_email']);
                    $('#telephone_number').val(data['telephone_number']);
                    $('#caller_note').val(data['caller_note']);
                }
            });
        });

        var form = $('#send_email');
        var rules = {
            gender: {required: true},
            first_last_name: {required: true},
            telephone_number: {required: true},
            caller_note: {required: true},
            caller_email: {required: true, email: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
        var dataArr = {};
        var columnWidth = {};
        var columnWidth = {};
        var arrList = {
            'tableID': '#ManageEmployerList',
            'ajaxURL': baseurl + "admin/calls-ajaxAction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [],
            'noSortingApply': [],
            'defaultSortColumn': 0,
            'defaultSortOrder': 'desc',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
    }


    return {
        add_init: function() {
            handleAddInvoice();
            handleGenral();
        },
        list_init: function() {
            handleList();
        }
    }
}();