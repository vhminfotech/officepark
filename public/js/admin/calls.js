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

        $('body').on('click', '.addTemplate', function() {
            $('#modal8').modal('hide');
            $('#templateModel').modal('show');
            templateList();
        });
        $('body').on('change', '#template', function() {
            var template = $('#template option:selected').text();
            $('#caller_note').val(template);

        });
        $('body').on('click', '#template', function() {
            hadaleTemplate();
            templateList();
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
                    var data = JSON.parse(data);
                    $('#gender').val(data['gender']);
                    $('#first_last_name').val(data['first_and_last_name']);
                    $('#caller_email').val(data['caller_email']);
                    $('#telephone_number').val(data['telephone_number']);
                    $('#caller_note').val(data['caller_note']);
                    if (data['caller_note'] == "" || data['caller_note'] == null) {
                        $('#caller_note').val('They were unfortunately not reacheble. Mrs X will get back to you soon.');
                    } else {
                        $('#caller_note').val(data['caller_note']);
                    }
                }
            });
        });

        $('body').on('click', '.deleteTemplate', function() {
            $('#templateModel').modal('hide');
            $('#deleteModel').modal('show');
            var id = $(this).data('id');
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin/calls-ajaxAction",
                data: {'action': 'deleteTemplate', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });

        $('body').on('click', '.customerpopupdetail', function() {
            var id = $(this).attr('data-id');
            
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin/calls-ajaxAction",
                data: {'action': 'customerpopupdetail', 'data': data},
                success: function(data) {
//                    handleAjaxResponse(data);
                }
            });
        });
        
        function templateList() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin/calls-ajaxAction",
                data: {'action': 'getTemplateList', 'data': {'id': id}},
                success: function(data) {
                    $('.templateList').html(data);
                }
            });
        }
        setTimeout(function() {
            hadaleTemplate();

        }, 500);
        function hadaleTemplate() {
            var template = $('#template').val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin/calls-ajaxAction",
                data: {'action': 'gettemplate', 'data': {'template': template}},
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    $('#template').find('option').remove();
                    if (obj.length == 0) {
                        $('#template').append($('<option>', {value: '', text: 'No Record Found'}));
                    }
                    $.each(obj, function(i, item) {
                        $('#template').append($('<option>', {
                            value: item['id'],
                            text: item['message']
                        }));
                    });
                    $('#template').trigger('change');
                    templateList();
                }
            });
        }
        var form = $('#addTemlate');
        var rules = {
            message: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
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
       
        var arrList = {
            'tableID': '#ManageEmployerList',
            'ajaxURL': baseurl + "admin/calls-ajaxAction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [0],
            'noSortingApply': [0],
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