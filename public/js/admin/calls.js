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