var Service = function () {



    var handleGenral = function () {
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID


        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();


            $(wrapper).append('<div class="row">\n\
<div class="col-md-3"><input class="c-input" name="packagename" id="packagename" placeholder="" type="text">\n\
</div><div class="col-md-3"><input class="c-input" name="packagename1" id="packagename1" placeholder="" type="text">\n\
</div><div class="col-md-3"><input class="c-input" name="packagename2" id="packagename2" placeholder="" type="text"></div>\n\
<div class="c-choice c-choice--checkbox"><input class="c-choice__input" id="checkboxs5" name="checkboxes" type="checkbox"><label class="c-choice__label" for="checkboxs5">Invoice</label><a href="#" class="remove_field">Remove</a></div><br><br>');

        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();

        });



    };


    return {
        list_init: function () {
            handleGenral();
        }
    }
}();



    