var Supports = function() {

    var handleSupport = function() {

        $('body').on('click', '.btnPopup', function() {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "customer/support-ajaxAction",
                data: {'action': 'getPopupData', 'data': {'id': 2 }},
                success: function(data) {
                    $('#myModal2').modal('show');
//                    var data = JSON.parse(data);
                }
            });
        });
        
        
    }

    return {
       
        list_init: function() {
            handleSupport();
        }
    }
}();