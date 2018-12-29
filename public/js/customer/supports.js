var Supports = function() {

    var handleSupport = function() {

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

    return {
       
        list_init: function() {
            handleSupport();
        },
        chatadd:function(){
          addchat();  
        },
    }
}();