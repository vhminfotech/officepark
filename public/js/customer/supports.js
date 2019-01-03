var Supports = function() {

    var handleSupport = function() {
         $('.closechat').on('click','',function(){
            var dataid = $(this).attr('data-id');
            var datatoken = $(this).attr('data-token');
            
            $('.yes-sure-close-chat').attr('data-id', dataid);
            $('.yes-sure-close-chat').attr('data-token', datatoken);
        });
        
        $('.yes-sure-close-chat').click(function() {
             
           
            var id = $(this).attr('data-id');
            var datatoken = $(this).attr('data-token');
            
            $.ajax({
                type: "POST",
                url: baseurl + "customer/customer-closechat",
                data: {'id':id,'_token':datatoken},
                success: function(data) {
                    handleAjaxResponse(data);
//                    var data = JSON.parse(data);
                }
            });
        });
        
        $('body').on('click', '.btnPopup', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer/support-ajaxAction",
                data: {'action': 'getPopupData', 'data': {'id': id }},
                success: function(data) {
                    $('.putHtml').html(data);
                    $('#myModal2').modal('show');
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
    };
    
      var addchat=function(){
          
        var form = $('#addSupportschat');
        var rules = {
            chatmsg : {required: true},
           
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        }); 
      };
      
      
      var chat=function(){
          $('body').on('click', '.btnPopup', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer/support-ajaxAction",
                data: {'action': 'getPopupData', 'data': {'id': id }},
                success: function(data) {
                    $('.putHtml').html(data);
                    $('#myModal2').modal('show');
                }
            });
        });
        
          $('.closechat').on('click','',function(){
            var dataid = $(this).attr('data-id');
            var datatoken = $(this).attr('data-token');
            
            $('.yes-sure-close-chat').attr('data-id', dataid);
            $('.yes-sure-close-chat').attr('data-token', datatoken);
        });
        
        $('.yes-sure-close-chat').click(function() {
             
           
            var id = $(this).attr('data-id');
            var datatoken = $(this).attr('data-token');
            
            $.ajax({
                type: "POST",
                url: baseurl + "customer/customer-callsupport-closechat",
                data: {'id':id,'_token':datatoken},
                success: function(data) {
                    handleAjaxResponse(data);
//                    var data = JSON.parse(data);
                }
            });
        });
      };

    return {
       
        list_init: function() {
            handleSupport();
        },
        chatadd:function(){
          addchat();  
        },
        chat_init:function(){
            chat();
        }
    }
}();