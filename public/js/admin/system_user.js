var System_user = function() {

    var add_user = function() {

        var form = $('#addSystemUser');
        var rules = {
            firstName: {required: true},
            lastName: {required: true},
            email: {email: true , required: true },
            inoplaName: {required: true},
            password: {required: true},
            exNumber: {required: true},
            langauge: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var edit_user = function() {

        var form = $('#editSystemUser');
        var rules = {
            firstName: {required: true},
            lastName: {required: true},
            email: {email: true , required: true },
            inoplaName: {required: true},
            exNumber: {required: true},
            langauge: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var delete_user = function(){
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
            var url = baseurl + 'admin/system-user-delete';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
    }

    return{
        listInit : function(){
            delete_user();
        },
        addInit: function() {
            add_user();
        },
        editInit: function(){
            edit_user();
        }        
    };
}();