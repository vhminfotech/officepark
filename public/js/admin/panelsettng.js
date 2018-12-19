var Panelsettng = function() {
    var list=function(){
        $('body').on('click','.deletePanel',function(){
            var id = $(this).attr('data-id');
            var token = $('#_token').val();
            setTimeout(function(){
                $('.yes-sure:visible').attr('data-id',id);
                $('.yes-sure:visible').attr('data-token',token);    
            },500);
            
        })
        
        $('body').on('click','.yes-sure',function(){
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            var data = { id : id ,_token :token};
            var url = baseurl + 'admin/panel-ajaxAction';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
    };
    var addpanel=function(){
        var form = $('#addServiceForm');
        var rules = {
            website_name: {required: true},
            sidebar_menu_color: {required: true},
            hovercolor: {required: true},
            color: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });    
    };

    var editpanel=function(){
        var form = $('#editPanelForm');
        var rules = {
            website_name: {required: true},
            sidebar_menu_color: {required: true},
            hovercolor: {required: true},
            color: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    return{
        Init: function() {
            list();
        },
        Add:function(){
            addpanel();
        },
        Edit:function(){
            editpanel();
        },
    };
}();