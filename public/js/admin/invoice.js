var Invoice = function() {

    var handleAddInvoice = function() {

        var form = $('#invoiceForm');
        var rules = {
            start_date: {required: true},
            end_date: {required: true},
            telefone_service: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });

        $('body').on('change', '.selectpackege', function() {
            var packegeId = $(this).val();
            var token = $('#_token').val();
            var data = {packegeId: packegeId, _token: token};
            var url = baseurl + 'admin/invoice-packege-detail';
            ajaxcall(url, data, function(output) {
                $('.dataAppend').html(output);
                var finalTotal = 0;

                $(".Rowtotal").each(function() {
                    var value = $(this).val();

                    if (value != '') {
                        finalTotal += parseFloat(value);
                    }
                });
                $(".finalTotal").text(finalTotal);
            });
        });
        
        $('.selectpackege').trigger('change');
    }

    var handleGenral = function() {
        $('body').on('click', '.add_new_row', function() {

            var option = '<option value="">Select Bezeichnung</option>';

            var j = 0;

            var html = '<tr class="c-table__row"><td><input type="text" class="c-input" name="bezeichnung[]"></td><td><input type="text" class="qty c-input" name="menge[]"/></td><td><input type="text" class="price c-input" name="price[]"/></td><td colspan="2"><input type="hidden" name="total[]" class="Rowtotal"><span class="total"></span><a href="javascript:;" class="removetData"><i class="fa fa-close"></i></a></td></tr>';
            $('.dataAppend').append(html);

            putTotal();

        });
        function putTotal() {
            var finalTotal = 0;
            $(".Rowtotal").each(function() {
                var value = $(this).val();
                if (value != '') {
                    finalTotal += parseFloat(value);
                }
            });
            $(".finalTotal").text(finalTotal);
        }
        $("body").on("blur", ".qty", function() {
            var qty = $(this).val();
            var price = $(this).closest('tr').find('.price').val();
            if (qty != '' && price != '') {
                var total = parseFloat(qty) * parseFloat(price);
                $(this).closest('tr').find('.Rowtotal').val(total);
                $(this).closest('tr').find('.total').text(total + ' €');
            }
            putTotal();
        });
        $("body").on("click", ".deleteInvoice", function() {
            var dataId = $(this).data('id');
            $('.yes-sure').attr('data-id', dataId);
        });
        $("body").on("click", ".yes-sure", function() {
            var dataId = $(this).data('id');
            $('.remove' + dataId).remove();
            $('#deleteModel').modal('hide');
            showToster('success', 'Invoice Delete successfully.')
        });

        $("body").on("blur", ".price", function() {
            var price = $(this).val();
            var qty = $(this).closest('tr').find('.qty').val();

            if (qty != '' && price != '') {
                var total = parseFloat(qty) * parseFloat(price);
                $(this).closest('tr').find('.Rowtotal').val(total);
                $(this).closest('tr').find('.total').text(total + ' €');
            }
            putTotal();
        });



        $('body').on('click', '.removetData', function() {
            $(this).closest('tr').remove();

        });
    }

    var handleList = function() {
        $('body').on('click', '.createBill', function() {
            var value = $('.selectCustomer option:selected').val();
            if (value == '') {
                showToster('error', 'Please select customer');
            } else {
                window.location.href = baseurl + 'admin/add-invoice/' + value;
            }
        });

        $('body').on('click', '.invoicechk', function() {
            var str = '';
            $(".invoicechk:checked").each(function() {
                var value = $(this).val();
                str += value+',';
               
            });
            $("#checkInvNo").val(str);
        });
        
        $('body').on('change', '.filter', function() {
            var consult_id = [];
            var payment_method = $('#payment_method').val();
            var month = $('#month').val();
            var year = $('#year').val();

            var querystring = (payment_method == '' && typeof payment_method === 'undefined') ? 'payment_method=' : 'payment_method=' + payment_method;
            querystring += (payment_method == '' && typeof payment_method === 'undefined') ? '&month=' : '&month=' + month;
            querystring += (year == '' && typeof year === 'undefined') ? '&year=' : '&year=' + year;

            location.href = baseurl + 'admin/invoice-list?' + querystring;
        });

        $('body').on('click', '.deleteInvoice', function() {
            $('#deleteModel').modal('show');
            var id = $(this).data('id');
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            var url = baseurl + 'admin/delete-invoice';
            ajaxcall(url, data, function(output) {
                handleAjaxResponse(output);
            });
        });
        $('body').on('change', '.changeStatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).data('status');
            var data = {id: id,status: status, _token: $('#_token').val()};
            var url = baseurl + 'admin/change-status';
            ajaxcall(url, data, function(output) {
                handleAjaxResponse(output);
            });
        });

        $('body').on('click', '.sendInvoice', function() {

            var orderId = $(this).data('id');
            var token = $('#_token').val();
            var data = {orderId: orderId, _token: token};
            var url = baseurl + 'admin/invoice-pdf';
            ajaxcall(url, data, function(output) {
                handleAjaxResponse(output);
            });
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