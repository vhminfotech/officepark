var Employee = function () {

    var handleAddEmploye = function () {
        var form = $('#addEmpForm');
        var rules = {
            firstName: {required: true},
            lastName: {required: true},
            jobtitle: {required: true},
            responsibility: {required: true},
            p_away_msg: {required: true},
            call_back_msg: {required: true},
            telephone: {required: true},
            mobile: {required: true},
            anyotherinformation: {required: true},
            email: {required: true},
            
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    }
    

    return {
        list_init : function(){
            handleAddEmploye();
        }        
    }
}();