var  IncomingCall= function() {

    var handleList = function() {
        
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
            
            var data = {id: id, token: $('#_token').val()};
            
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin/calls-ajaxAction",
                data: {'action': 'customerpopupdetail', 'data': data},
                success: function(details) {
                   var det=JSON.parse(details);
                   $('#customer_number').text(det['company_details'][0].customer_number);
                   $('#system_number').text(det['company_details'][0].system_genrate_no);
                   $('#name').text(det['company_details'][0].name);
                   $('#email').text(det['company_details'][0].email);
                   $('#caller').text(det['company_details'][0].caller);
                   $('#company_name').text(det['company_details'][0].company_name);
                   $('#start_time_1').text(det['bussiness_hours'][0].day_start_time);
                   $('#end_time_1').text(det['bussiness_hours'][0].day_end_time);
                   
                   $('#start_time_2').text(det['bussiness_hours'][2].day_start_time);
                   $('#end_time_2').text(det['bussiness_hours'][2].day_end_time);
                   
                   $('#start_time_3').text(det['bussiness_hours'][3].day_start_time);
                   $('#end_time_3').text(det['bussiness_hours'][3].day_end_time);
                   
                   $('#start_time_4').text(det['bussiness_hours'][4].day_start_time);
                   $('#end_time_4').text(det['bussiness_hours'][4].day_end_time);
                   
                   $('#start_time_5').text(det['bussiness_hours'][5].day_start_time);
                   $('#end_time_5').text(det['bussiness_hours'][5].day_end_time);
                   
                   $('#start_time_6').text(det['bussiness_hours'][6].day_start_time);
                   $('#end_time_6').text(det['bussiness_hours'][6].day_end_time);
                   
                   $('#start_time_0').text(det['bussiness_hours'][0].day_start_time);
                   $('#end_time_0').text(det['bussiness_hours'][0].day_end_time);
                   
                   $('#start_time_lunch').text(det['customer_info'][0].lunch_start_time);
                   $('#end_time_lunch').text(det['customer_info'][0].lunch_end_time);
                   
                   
                   if(det['customer_info'][0].holiday_global_from == null){
                       var start="No Holidays";
                   }else{
                       start=det['customer_info'][0].holiday_global_from;
                   }
                   
                   if(det['customer_info'][0].holiday_global_to == null)
                   {
                       var end="No Holidays"
                   }else{
                       end=det['customer_info'][0].holiday_global_to;
                   }
                   
                   $('#holiday_start').text(start);
                   $('#holiday_end').text(end);
                   
                   $('#welcome_note').text(det['orderinfo'].note);
                   $('#reroute_confirm').text(det['orderinfo'].reroute);
                   $('#company_info').text(det['orderinfo'].company_info);
                   var markup_div='';
                   for(var employee=0;employee<det['employeinfo'].length;employee++)
                   {
                    var path='uploads/employee/' +det["employeinfo"][employee].employee_image;

                    var markup='<div class="row" >'+
                                     '<div class="col-3 ">'+
                                         '<div class="c-avatar  u-inline-block">'+
                                             '<img class="c-avatar__img" src="'+ baseurl + path +'" alt="Avatar">'+
                                         '</div>'+

                                     '</div>'+
                                     '<div class="col-9">'+
                                          '<ul>'+
                                             '<li class="c-plan__feature">'+
                                             //C:\xampp\htdocs\officepark\public\uploads\employee
                                                 '<strong><span style="font-size:16px;">'+ det['employeinfo'][employee].first_name+' '+ det['employeinfo'][employee].last_name + '</span>'+
                                                 '<br> Job title :</strong> '+ det['employeinfo'][employee].job_title + 
                                                 '<br> Company Schmidt - Hello My name is max mustermann.'+
                                             '</li>'+
                                          '</ul>'+
                                     '</div>'+
                          '</div>';
                        markup_div=markup_div+markup;
                   }
                   
                   $("#accounting").append(markup_div);
                    
                   
                   
                   // handleAjaxResponse(data);
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
        var columnWidth = {"width": "20%", "targets": 5};
        var arrList = {
            'tableID': '#ManageIncomingCall',
            'ajaxURL': baseurl + "agent/incomingcalls-ajaxAction",
            'ajaxAction': 'getdatatableIncomingCall',
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
        
        list_init: function() {
            handleList();
        }
    }
}();