var Plan = function(){
    var planlist=function(){
        
        var form = $('#addplan');
        var rules = {
            startdate: {required: true},
            enddate: {required: true},
            message: {required: true},
            status: {required: true},
            number: {required: true},
            information: {required: true},
            note: {required: true},
            transfercall:{required: true}
        };
         handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
        
        
        $('body').on('click','.delete',function(){
            
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            
            setTimeout(function(){
                $('.yes-sure:visible').attr('data-id',id);
                $('.yes-sure:visible').attr('data-token',token);    
            },500);
            
        })
        
        $('body').on('click','.yes-sure',function(){
            
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            var data = { id : id ,_token :token};
            var url = baseurl + 'customer/plan-delete';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
        
    };
    
    var editplan=function(){
        
        var form = $('#editplan');
        var rules = {
            date: {required: true},
            startdate: {required: true},
            enddate: {required: true},
            message: {required: true},
            status: {required: true},
            number: {required: true},
            information: {required: true},
            note: {required: true},
        };
         handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    return {
      init:function(){
        planlist();  
      },
      edit:function(){
          editplan();
      },
    };
}();