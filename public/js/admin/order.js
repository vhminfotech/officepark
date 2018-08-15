var Order = function() {

    var testalert = function() {
        console.log("CALL");
//        $('.html1').show();
        $('body').on('click', '.editCustomer', function() {
            $('.data1').show();
            $('.html1').hide();
        });

        $('body').on('click', '.canceltn', function() {
            var canclId = $(this).data('id');
            $('.data' + canclId).hide();
            $('.html' + canclId).show();
        });

        $('body').on('click', '.edit2', function() {
            $('.data2').show();
            $('.html2').hide();
        });
        $('body').on('click', '.edit3', function() {
            $('.data3').show();
            $('.html3').hide();
        });
        $('body').on('click', '.edit4', function() {
            $('.data4').show();
            $('.html4').hide();
        });

        $('body').on('click', '.submit1', function() {

        });
    };

    return{
        Init: function() {
            testalert();
        },
    };
}();