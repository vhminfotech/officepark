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
            location.href = baseurl + 'customer/customer-calls?' + querystring;
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
        
        $('body').on('change', '#bigtemplate', function() {
            var template = $('#bigtemplate option:selected').text();
            $('#bigcaller_note').val(template);

        });
        
        $('body').on('click', '#bigtemplate', function() {
            hadaleTemplate();
            templateList();
        });
        
        $('body').on('click', '#template', function() {
            hadaleTemplate();
            templateList();
        });

        $('body').on('click', '.bigpopup', function() {
            $('.bigeditId').val($(this).attr('data-id'));
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
//                url: baseurl + "customer/delete-customer",
                url: baseurl + "customer/customer-calls-ajaxAction",
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
                url: baseurl + "customer/customer-calls-ajaxAction",
                data: {'action': 'deleteTemplate', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });

        $('body').on('click', '.customerpopupdetail', function() {
            var id = $(this).attr('data-id');
            
            var markup_div='';
            var markup_div_advisor='';
            var markup_div_tech='';
            var maarkup_div_option='';
            var data = {id: id, token: $('#_token').val()};
            $('.bigeditId').val(id);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer/customer-calls-ajaxAction",
                data: {'action': 'customerpopupdetail', 'data': data},
                success: function(details) {
                   var det=JSON.parse(details);
                   $('#customer_number').text(det['company_details'][0].customer_number);
                   $('#system_number').text(det['company_details'][0].system_genrate_no);
                   $('#name').text(det['company_details'][0].name);
                   $('#email').text(det['company_details'][0].email);
                   $('.agentEmail').val(det['company_details'][0].email);
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
                   $('#dates').text(det['customer_info'][0].created_at);
                   
                   
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
                   var markup='';
                   var markuptech='';
                   var markupadvisor='';
                   var markupoption='';
                   for(var employee=0;employee<det['employeinfo'].length;employee++)
                   {
                    var path='uploads/employee/' +det["employeinfo"][employee].employee_image;

                    markup='<div class="row remove_div" >'+
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
                   
                   for(var employeinfoTechnical=0;employeinfoTechnical<det['employeinfoTechnical'].length;employeinfoTechnical++)
                   {
                    var path='uploads/employee/' +det["employeinfoTechnical"][employeinfoTechnical].employee_image;

                     markuptech='<div class="row remove_div" >'+
                                     '<div class="col-3 ">'+
                                         '<div class="c-avatar  u-inline-block">'+
                                             '<img class="c-avatar__img" src="'+ baseurl + path +'" alt="Avatar">'+
                                         '</div>'+

                                     '</div>'+
                                     '<div class="col-9">'+
                                          '<ul>'+
                                             '<li class="c-plan__feature">'+
                                             //C:\xampp\htdocs\officepark\public\uploads\employee
                                                 '<strong><span style="font-size:16px;">'+ det['employeinfoTechnical'][employeinfoTechnical].first_name+' '+ det['employeinfoTechnical'][employeinfoTechnical].last_name + '</span>'+
                                                 '<br> Job title :</strong> '+ det['employeinfoTechnical'][employeinfoTechnical].job_title + 
                                                 '<br> Company Schmidt - Hello My name is max mustermann.'+
                                             '</li>'+
                                          '</ul>'+
                                     '</div>'+
                          '</div>';
                        markup_div_tech=markup_div_tech+markuptech;
                   }
                   
                   $("#services").append(markup_div_tech);
//                    
                   for(var employeinfoadvisor = 0; employeinfoadvisor < det['employeinfoadvisor'].length;employeinfoadvisor++)
                   {
                    var path='uploads/employee/' +det["employeinfoadvisor"][employeinfoadvisor].employee_image;

                     markupadvisor='<div class="row" >'+
                                     '<div class="col-3 ">'+
                                         '<div class="c-avatar  u-inline-block">'+
                                             '<img class="c-avatar__img" src="'+ baseurl + path +'" alt="Avatar">'+
                                         '</div>'+

                                     '</div>'+
                                     '<div class="col-9">'+
                                          '<ul>'+
                                             '<li class="c-plan__feature">'+
                                             //C:\xampp\htdocs\officepark\public\uploads\employee
                                                 '<strong><span style="font-size:16px;">'+ det['employeinfoadvisor'][employeinfoadvisor].first_name+' '+ det['employeinfoadvisor'][employeinfoadvisor].last_name + '</span>'+
                                                 '<br> Job title :</strong> '+ det['employeinfoadvisor'][employeinfoadvisor].job_title + 
                                                 '<br> Company Schmidt - Hello My name is max mustermann.'+
                                             '</li>'+
                                          '</ul>'+
                                     '</div>'+
                          '</div>';
                        markup_div_advisor=markup_div_advisor+markupadvisor;
                   }
                   
                   $("#advisor").append(markup_div_advisor);
                   
                   
                   
                   for(var option = 0; option < det['employeinffo'].length;option++)
                   {
                       markupoption='<option value="'+det["employeinffo"][option]["id"]+'">'+det["employeinffo"][option]["first_name"]+'  '+det["employeinffo"][option]["last_name"]+'</option>';
                       
                       maarkup_div_option=maarkup_div_option+markupoption;
                   
                    }
                    $("#appendoption").append(maarkup_div_option);
                   
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
                url: baseurl + "customer/customer-calls-ajaxAction",
                data: {'action': 'getTemplateList', 'data': {'id': id}},
                success: function(data) {
                    $('.templateList').html(data);
                }
            });
        }
        setTimeout(function() {
            hadaleTemplate();
            hadalebigTemplate();

        }, 500);
        function hadaleTemplate() {
            var template = $('#template').val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer/customer-calls-ajaxAction",
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
        
        function hadalebigTemplate() {
            var template = $('#bigtemplate').val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer/customer-calls-ajaxAction",
                data: {'action': 'gettemplate', 'data': {'template': template}},
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    $('#bigtemplate').find('option').remove();
                    if (obj.length == 0) {
                        $('#bigtemplate').append($('<option>', {value: '', text: 'No Record Found'}));
                    }
                    $.each(obj, function(i, item) {
                        $('#bigtemplate').append($('<option>', {
                            value: item['id'],
                            text: item['message']
                        }));
                    });
                    $('#bigtemplate').trigger('change');
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
        
        var form = $('#send_email_big');
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
            'tableID': '#ManageEmployerList',
            'ajaxURL': baseurl + "customer/customer-calls-ajaxAction",
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