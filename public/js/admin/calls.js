var Calls = function() {

    var handleAddInvoice = function() {
           
    }


    var handleList = function() {
     
        $('body').on('change', '.filter', function() {
            var consult_id = [];
            var payment_method = $('#payment_method').val();
            var month = $('#month').val();
            var year = $('#year').val();

            var querystring = (payment_method == '' && typeof payment_method === 'undefined') ? 'payment_method=' : 'payment_method=' + payment_method;
            querystring += (payment_method == '' && typeof payment_method === 'undefined') ? '&month=' : '&month=' + month;
            querystring += (year == '' && typeof year === 'undefined') ? '&year=' : '&year=' + year;
            location.href = baseurl + 'admin/calls?' + querystring;
        });

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